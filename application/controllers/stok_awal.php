<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stok_awal extends CI_Controller {

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
        $data['bulan'] = date('m');
        $data['tahun'] = date('Y');
        $data['content'] = 'stok_awal/index';
        $this->load->view('layout',$data);
    }

    function tambah()
    {
        $data = $this->session_data();
        $bulan = date('m');
        $tahun = date('Y');
        $data['content'] = 'stok_awal/tambah';
        $this->load->view('layout',$data);
    }

}