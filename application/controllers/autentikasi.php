<?php
defined('BASEPATH') or exit('No direct script access allowed');

class autentikasi extends CI_Controller {

    public function index()
    {
        $status = $this->session->userdata('status');
        if(!empty($status)){
            redirect(base_url('dasbor'));
        }
        $this->load->view('autentikasi/login');
    }

    function login()
    {
        $akun = $this->input->post('akun');
        $sandi = $this->input->post('sandi');

        $check = $this->model_main->data_result('akun',array('akun'=>$akun, 'sandi'=>$sandi),null);
        if($check->num_rows() > 0){
            $row = $check->row();
            $array = array(
                'akun'  => $row->akun,
                'status'=> 'login'
            );

            $this->session->set_userdata($array);
            redirect(base_url('dasbor'));
            
        }else{
            $this->session->set_flashdata('error','akun atau sandi salah!');
            redirect(base_url());
        }
    }

    function logout()
    {   
        $this->session->sess_destroy();
        redirect(base_url());
    }

}