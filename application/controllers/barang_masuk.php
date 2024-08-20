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
                $arr_result[] = $row->kategori_produk.' '.$row->nama;
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

}