<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stok_opname extends CI_Controller {

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
        $query  = "SELECT * FROM view_stok";
        $search = array('kategori_produk','produk');
        $where = array('bulan'=>date('m'),'tahun'=>date('Y'));
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
        $data['content'] = 'stok/index';
        $this->load->view('layout',$data);
    }

}