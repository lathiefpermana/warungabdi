<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stok extends CI_Controller {

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
        $stok = $this->model_main->data_result('view_stok',null,null);
        $data['stok'] = $stok->result();
        $data['bulan'] = date('m');
        $data['tahun'] = date('Y');
        $data['content'] = 'stok/index';
        $this->load->view('layout',$data);
    }

}