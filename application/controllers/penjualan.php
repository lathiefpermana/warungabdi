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

    public function index()
    {
        $data = $this->session_data();
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
        $data['item'] = $this->model_main->data_result('view_penjualan',array('penjualan'=>$id_penjualan),'delete_by IS NULL')->result();
        $data['content'] = 'penjualan/tambah_item';
        $this->load->view('layout',$data);

        
    }

    function simpan()
    {
        $penjualan = $this->input->post('penjualan');
        $produk = $this->input->post('produk');
        $jumlah = $this->input->post('jumlah');    

        $cek = $this->model_main->data_result('view_daftar_harga',array('nama'=>$produk),'delete_by IS NULL');
        if($cek->num_rows() > 0)
        {
            $list = $cek->row();            

            $array = array(
                'penjualan'=> $penjualan,
                'produk' => $list->id_produk,
                'daftar_harga'=>$list->id,
                'jumlah' => $jumlah,
                'jumlah_jual' => $list->jumlah_jual,
                'harga' => $list->harga_jual,
                'total' => $jumlah * $list->harga_jual,
                'created_by' => $this->session->userdata('id_akun'),
                'created_at' => date('Y-m-d H:i:s')
            );
            
            $this->model_main->insert_data('penjualan_item',$array);
            $this->session->set_flashdata('success','Data disimpan!');
            redirect(base_url('penjualan/tambah_item/'.$penjualan));
        }
    }
}