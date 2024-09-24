<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang_masuk extends CI_Controller {

    public function session_data()
    {
        $status_login = $this->session->userdata('status_login');
        if(empty($status_login)){
            redirect(base_url('autentikasi'));
        }
    }

    function ajax_list()
    {
        $bulan = $this->uri->segment(3);
        $tahun = $this->uri->segment(4);
        $query  = "SELECT * FROM view_barang_masuk";
        $search = array('tanggal','nomor_faktur','pemasok','modal');
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
        $data['content'] = 'barang_masuk/index';
        $this->load->view('layout',$data);
    }

    function get_autocomplete()
    {
        if(isset($_GET['term'])){
            $result = $this->model_main->produk_autocomplete($_GET['term']);
            if(count($result) > 0){
                foreach($result as $row)
                $arr_result[] = $row->detail_produk;
                echo json_encode($arr_result);
            }
        }
    }

    function tambah()
    {
        $data = $this->session_data();
        $pemasok = $this->model_main->data_result('view_pemasok',null,'delete_by IS NULL');
        $data['pemasok'] = $pemasok->result();
        $data['content'] = 'barang_masuk/tambah';
        $this->load->view('layout', $data);
    }

    function simpan()
    {
        $tanggal = $this->input->post('tanggal');
        $pemasok = $this->input->post('pemasok');
        $nomor_faktur = $this->input->post('nomor_faktur');
        $array = array(
            'tanggal' => $tanggal,
            'jam' => date('H:i:s'),
            'bulan' => date('m'),
            'tahun' => date('Y'),
            'pemasok' => $pemasok,
            'nomor_faktur' => $nomor_faktur,
            'created_by' => $this->session->userdata('id_akun'),
            'created_at' => date('Y-m-d H:i:s')
        );        
        $this->model_main->insert_data('barang_masuk',$array);
        $last = $this->model_main->last_data('barang_masuk')->row();
        $id = $last->id;

        redirect(base_url('barang_masuk/tambah_item/'.$id));
    }

    function update()
    {
        $id = $this->input->post('id');
        $tanggal = $this->input->post('tanggal');
        $pemasok = $this->input->post('pemasok');
        $nomor_faktur = $this->input->post('nomor_faktur');

        $array = array(
            'tanggal' => $tanggal,
            'pemasok' => $pemasok,
            'nomor_faktur' => $nomor_faktur,
            'update_by' => $this->session->userdata('id_akun'),
            'update_at' => date('Y-m-d H:i:s')
        );

        $this->model_main->update_data($id,'barang_masuk',$array);
        $this->session->set_flashdata('success','Data disimpan!');
        redirect(base_url('barang_masuk/tambah_item/'.$id));
    }

    function tambah_item()
    {
        $data = $this->session_data();
        $id = $this->uri->segment(3);
        $barang_masuk = $this->model_main->data_result('view_barang_masuk',array('id'=>$id),'delete_by IS NULL');
        $satuan = $this->model_main->data_result('satuan',null,'delete_by IS NULL');
        $daftar_produk = $this->model_main->data_result('view_barang_masuk_item',array('barang_masuk'=>$id),'delete_by IS NULL');
        $pemasok = $this->model_main->data_result('pemasok',null,'delete_by IS NULL');
        $data['barang_masuk'] = $barang_masuk->row_array();
        $data['satuan'] = $satuan->result();
        $data['pemasok'] = $pemasok->result();
        $data['daftar_produk'] = $daftar_produk->result();
        $data['content'] = 'barang_masuk/tambah_item';
        $this->load->view('layout',$data);
    }

    function simpan_item()
    {
        $barang_masuk = $this->input->post('barang_masuk');
        $detail_produk = $this->input->post('detail_produk');
        $search = $this->model_main->data_result('view_produk',array('detail_produk'=>$detail_produk),'delete_by IS NULL')->row();
        $produk = $search->id;
        $jumlah = $this->input->post('jumlah');
        $satuan = $this->input->post('satuan');
        $modal = $this->input->post('modal');
        $jumlah_stok = $this->input->post('jumlah_stok');
        $satuan_stok = $this->input->post('satuan_stok');
        $kadaluarsa = $this->input->post('kadaluarsa');
        if(empty($kadaluarsa)){ $kadaluarsa = null;}

        $cek_stok = $this->model_main->data_result('stok',array( 'bulan'=>date('m'), 'tahun'=>date('Y'),'produk'=>$produk ),null);
        if($cek_stok->num_rows() <= 0){
            $this->session->set_flashdata('error','Stok belum generate!');
            redirect((base_url('barang_masuk/tambah_item/'.$barang_masuk)));
        }
        $array = array(
            'barang_masuk'=>$barang_masuk,
            'produk'=>$produk,
            'jumlah'=>$jumlah,
            'satuan'=>$satuan,
            'modal'=>$modal,
            'jumlah_stok'=>$jumlah_stok,
            'satuan_stok'=>$satuan_stok,
            'kadaluarsa'=>$kadaluarsa,
            'created_by'=> $this->session->userdata('id_akun'),
            'created_at'=> date('Y-m-d H:i:s')
        );
        $this->model_main->insert_data('barang_masuk_item',$array);

        $this->session->set_flashdata('success','Data disimpan!');
        redirect((base_url('barang_masuk/tambah_item/'.$barang_masuk)));
    }

    function update_item()
    {   
        $id_item = $this->input->post('id_item');
        $id_barang_masuk = $this->input->post('id_barang_masuk');
        $jumlah = $this->input->post('jumlah');
        $jumlah_stok = $this->input->post('jumlah_stok');
        $satuan = $this->input->post('satuan');
        $satuan_stok = $this->input->post('satuan_stok');
        $modal = $this->input->post('modal');
        $kadaluarsa = $this->input->post('kadaluarsa');

        $array = array(
            'jumlah' => $jumlah,
            'jumlah_stok' => $jumlah_stok,
            'satuan' => $satuan,
            'satuan_stok' => $satuan_stok,
            'modal' => $modal,
            'kadaluarsa' => $kadaluarsa,
            'update_by' => $this->session->userdata('id_akun'),
            'update_at' => date('Y-m-d H:i:s')
        );
        $this->model_main->update_data($id_item,'barang_masuk_item',$array);
        redirect(base_url('barang_masuk/tambah_item/'.$id_barang_masuk));
    }

    function hapus_item()
    {
        $id = $this->uri->segment(3);
        $barang_masuk = $this->uri->segment(4);
        $array = array(
            'delete_by'=> $this->session->userdata('id_akun'),
            'delete_at'=> date('Y-m-d H:i:s')
        );
        $this->model_main->update_data($id,'barang_masuk_item',$array);
        $this->session->set_flashdata('success','Data dihapus!');
        redirect((base_url('barang_masuk/tambah_item/'.$barang_masuk)));
    }

    function hapus()
    {
        $id = $this->uri->segment(3);
        $item = $this->model_main->data_result('barang_masuk_item',array('barang_masuk'=>$id),'delete_by IS NULL');
        foreach($item->result() as $key):
            $array = array(
                'delete_by' => $this->session->userdata('id_akun'),
                'delete_at' => date('Y-m-d H:i:s')
            );

            $this->model_main->update_data($key->id,'barang_masuk_item',$array);
        endforeach;

        $array = array(
            'delete_by' => $this->session->userdata('id_akun'),
            'delete_at' => date('Y-m-d H:i:s')
        );

        $this->model_main->update_data($id, 'barang_masuk', $array);
        $this->session->set_flashdata('success','Data dihapus!');
        redirect(base_url('barang_masuk'));
    }

    function data()
    {
        $data = $this->session_data();
        $bulan = date('m');
        $tahun = date('Y');
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['content'] = 'barang_masuk/data';
        $this->load->view('layout',$data);
    }

    function ajax_list_data()
    {
        $bulan = $this->uri->segment(3);
        $tahun = $this->uri->segment(4);
        $query  = "SELECT * FROM view_data_barang_masuk";
        $search = array('bulan','tahun','tanggal','nomor_faktur','pemasok','kategori_produk','produk','modal');
        $where = array('bulan'=>$bulan,'tahun'=>$tahun);
        $isWhere = null;
        header('Content-Type: application/json');
        echo $this->model_datatables->get_tables_query($query,$search,$where,$isWhere);
    }

}