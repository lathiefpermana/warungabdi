<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang_masuk extends CI_Controller {

    public function index()
    {
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
        $data['content'] = 'barang_masuk/tambah';
        $pemasok = $this->model_main->data_result('view_pemasok',null,'delete_by IS NULL');
        $data['pemasok'] = $pemasok->result();
        $this->load->view('layout', $data);
    }

    function simpan()
    {
        $tanggal = $this->input->post('tanggal');
        $pemasok = $this->input->post('pemasok');
        $nomor_faktur = $this->input->post('nomor_faktur');

        $array = array(
            'tanggal' => $tanggal,
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

    function tambah_item()
    {
        $id = $this->uri->segment(3);
        $barang_masuk = $this->model_main->data_result('view_barang_masuk',array('id'=>$id),'delete_by IS NULL');
        $data['barang_masuk'] = $barang_masuk->row_array();
        $satuan = $this->model_main->data_result('satuan',null,'delete_by IS NULL');
        $data['satuan'] = $satuan->result();
        $data['content'] = 'barang_masuk/tambah_item';
        $this->load->view('layout',$data);
    }

}