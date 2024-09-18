<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dasbor extends CI_Controller {

    public function session_data()
    {
        $status_login = $this->session->userdata('status_login');
        if(empty($status_login)){
            redirect(base_url('autentikasi'));
        }
    }

    public function index()
    {
        $data = $this->session_data();
        $data['content'] = 'dasbor/index';
        $this->load->view('layout',$data);
    }
}