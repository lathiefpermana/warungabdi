<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penjualan extends CI_Controller {

    public function session_data()
    {
        $lisensi = $this->input->cookie('lisensi-warung-abdi');
        $status_login = $this->session->userdata('status_login');
        if(empty($status_login)){
            redirect(base_url('autentikasi/login'));
        }
    }

    function ajax_list()
    {
        $bulan = $this->uri->segment(3);
        $tahun = $this->uri->segment(4);
        $query  = "SELECT * FROM view_penjualan";
        $search = array('tanggal','jam','bulan','tahun','nomor_penjualan');
        $where = array('bulan'=>$bulan,'tahun'=>$tahun);
        $isWhere = null;
        header('Content-Type: application/json');
        echo $this->model_datatables->get_tables_query($query,$search,$where,$isWhere);
    }

    public function index()
    {
        $data = $this->session_data();
        $bulan = date('m');
        $tahun = date('Y');
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['content'] = 'penjualan/index';
        $this->load->view('layout',$data);
    }

    function tambah()
    {
        $bulan = date('m');
        $tahun = date('Y');
        $cek_penjualan = $this->model_main->last_data_result('penjualan', array('bulan'=>$bulan, 'tahun'=>$tahun), null);
        if($cek_penjualan->num_rows() > 0){
            $penjualan = $cek_penjualan->row();
            $nomor = $penjualan->nomor + 1;
            $romawi = romawi($bulan);
            $nomor_penjualan = $tahun.'/'.$romawi.'/'.str_pad($nomor,4,0,STR_PAD_LEFT);
        }else{
            $nomor = 1;
            $romawi = romawi($bulan);
            $nomor_penjualan = $tahun.'/'.$romawi.'/'.str_pad($nomor,4,0,STR_PAD_LEFT);
        }
        $array = array(
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i:s'),
            'bulan' => $bulan,
            'tahun' => $tahun,
            'nomor' => $nomor,
            'nomor_penjualan' => $nomor_penjualan,
            'created_by' => $this->session->userdata('id_akun'),
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->model_main->insert_data('penjualan',$array);
        $last_id = $this->model_main->last_data('penjualan')->row();
        $id = $last_id->id;

        redirect(base_url('penjualan/tambah_item/'.$id));
    }

    function get_autocomplete()
    {
        if(isset($_GET['term'])){
            $result = $this->model_main->daftar_harga_autocomplete($_GET['term']);
            if(count($result) > 0){
                foreach($result as $row)
                $arr_result[] = $row->nama;
                echo json_encode($arr_result);
            }
        }    
    }

    function tambah_item()
    {
        $data = $this->session_data();
        $id_penjualan = $this->uri->segment(3);
        $data['penjualan'] = $this->model_main->data_result('penjualan',array('id'=>$id_penjualan),'delete_by IS NULL')->row_array();
        $data['item'] = $this->model_main->data_result('view_penjualan_item',array('id_penjualan'=>$id_penjualan),null)->result();
        $data['content'] = 'penjualan/tambah_item';
        $this->load->view('layout',$data);

        
    }

    function simpan()
    {
        $penjualan = $this->input->post('penjualan');
        $produk = $this->input->post('produk');
        $jumlah = $this->input->post('jumlah');

        $cek_item = $this->model_main->data_result('view_penjualan_item',array('produk'=>$produk),null);
        if($cek_item->num_rows() > 0)
        {
            $item = $cek_item->row();
            $newjumlah = $item->jumlah + $jumlah;
            $total = $newjumlah * $item->harga;
            $newjumlah_jual = $newjumlah * $item->jumlah_jual_stok;
            $array = array(
                'jumlah' => $newjumlah,
                'jumlah_jual' => $newjumlah_jual,
                'total' => $total,
                'update_by' => $this->session->userdata('id_akun'),
                'update_at' => date('Y-m-d H:i:s')
            );
            
            $this->model_main->update_data($item->id,'penjualan_item',$array);
        }else{
            $list = $this->model_main->data_result('view_daftar_harga',array('nama'=>$produk),'delete_by IS NULL')->row();
            $array = array(
                'penjualan'=> $penjualan,
                'produk' => $list->id_produk,
                'daftar_harga'=>$list->id,
                'jumlah' => $jumlah,
                'jumlah_jual' => $jumlah * $list->jumlah_jual,
                'harga' => $list->harga_jual,
                'total' => $jumlah * $list->harga_jual,
                'created_by' => $this->session->userdata('id_akun'),
                'created_at' => date('Y-m-d H:i:s')
            );
            
            $this->model_main->insert_data('penjualan_item',$array);            
        }
        
        $this->session->set_flashdata('success','Data disimpan!');
        redirect(base_url('penjualan/tambah_item/'.$penjualan));
        
    }

    function update_item()
    {
        $id = $this->input->post('id');
        $penjualan = $this->input->post('penjualan');
        $jumlah = $this->input->post('jumlah');
        $item = $this->model_main->data_result('view_penjualan_item',array('id'=>$id), null)->row();
        $jumlah_jual_stok = $item->jumlah_jual_stok;
        $harga = $item->harga;

        $array = array(
            'jumlah' => $jumlah,
            'jumlah_jual' => $jumlah * $jumlah_jual_stok,
            'total' => $jumlah * $harga,
            'update_by' => $this->session->userdata('id_akun'),
            'update_at' => date('Y-m-d H:i:s')
        );
        
        $this->model_main->update_data($item->id,'penjualan_item',$array);
        $this->session->set_flashdata('success','Data disimpan!');
        redirect(base_url('penjualan/tambah_item/'.$penjualan));
        
    }

    function update_diskon()
    {
        $id = $this->input->post('id_penjualan');
        $diskon = $this->input->post('diskon');

        $array = array(
            'diskon' => $diskon,
            'update_by' => $this->session->userdata('id_akun'),
            'update_at' => date('Y-m-d H:i:s')
        );
        $this->model_main->update_data($id,'penjualan',$array);
        $this->session->set_flashdata('success','Data diperbaharui!');
        redirect(base_url('penjualan/tambah_item/'.$id));
    }

    function hapus_item()
    {
        $id = $this->uri->segment(3);
        $array = array(
            'delete_by' => $this->session->userdata('id_akun'),
            'delete_at' => date('Y-m-d H:i:s')
        );
        $this->model_main->update_data($id,'penjualan_item',$array);
        $this->session->set_flashdata('success','Data dihapus!');
        redirect(base_url('penjualan/tambah_item/'.$id));
    }

    function hapus()
    {
        $id = $this->uri->segment(3);
        $array = array(
            'delete_by' => $this->session->userdata('id_akun'),
            'delete_at' => date('Y-m-d H:i:s')
        );

        $this->model_main->update_data($id,'penjualan',$array);
        $item = $this->model_main->data_result('penjualan_item',array('penjualan'=>$id),null)->result();
        foreach ($item as $key):
            $this->model_main->update_data($key->id,'penjualan_item',$array);
        endforeach;

        $this->session->set_flashdata('success','Data dihapus!');
        redirect(base_url('penjualan'));
    }

    function ajax_list_data()
    {
        $bulan = $this->uri->segment(3);
        $tahun = $this->uri->segment(4);
        $query  = "SELECT * FROM view_data_penjualan";
        $search = array('bulan','tahun','tanggal','jam','nomor_penjualan','kategori_produk','produk','nama_item','harga','jumlah','total');
        $where = array('bulan'=>$bulan,'tahun'=>$tahun);
        $isWhere = null;
        header('Content-Type: application/json');
        echo $this->model_datatables->get_tables_query($query,$search,$where,$isWhere);
    }

    function data()
    {
        $data = $this->session_data();
        $bulan = date('m');
        $tahun = date('Y');
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['content'] = 'penjualan/data';
        $this->load->view('layout',$data);
    }
}