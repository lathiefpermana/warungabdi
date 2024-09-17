<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cash_flow extends CI_Controller {

    public function session_data()
    {
        $lisensi = $this->input->cookie('lisensi-warung-abdi');
        $status_login = $this->session->userdata('status_login');
        if(empty($status_login)){
            redirect(base_url('autentikasi/login'));
        }
    }

    public function  index()
    {
        $data = $this->session_data();
        $data['content'] = 'cash_flow/index';
        $this->load->view('layout',$data);
    }

}