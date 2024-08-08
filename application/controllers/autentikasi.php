<?php
defined('BASEPATH') or exit('No direct script access allowed');

class autentikasi extends CI_Controller {

    public function index()
    {
        $lisensi = $this->input->cookie('lisensi-warung-abdi');

        if(!empty($lisensi)){
            $status = $this->session->userdata('status_login');
            if(!empty($status)){
                redirect(base_url('dasbor'));
            }else{
                $this->load->view('autentikasi/login_lisensi');
            }
        }else{
            $this->load->view('autentikasi/login');
        }

        
    }

    function login(){
        $akun = $this->input->post('akun');
        $sandi = $this->input->post('sandi');

        $config['upload_path'] = './assets/lisensi/';
        $config['allowed_types'] = 'txt';

        $this->load->library('upload', $config);
        if($this->upload->do_upload('lisensi')){
            $data = array('upload_data' => $this->upload->data());
            $file_lisensi = $data['upload_data']['file_name'];
            $lisensi_text = file_get_contents(base_url()."assets/lisensi/".$file_lisensi);
            
        
            $cek_lisensi = $this->model_main->data_result('akun',array('lisensi'=>$lisensi_text),null);
            if($cek_lisensi->num_rows() > 0){
                $akun_lisensi = $cek_lisensi->row();
                $id = $akun_lisensi->id;
                $cek_akun = $this->model_main->data_result('akun',array('id'=>$id,'akun'=>$akun,'sandi'=>sha1($sandi)),null);
                if($cek_akun->num_rows() > 0){
                    $akun = $cek_akun->row();

                    $array_sess = array(
                        'warung' => $akun->warung,
                        'akun_level'=> $akun->akun_level,
                        'akun'=> $akun->akun,
                        'lisensi'=>  $akun->lisensi,
                        'tanggal_aktif'=> $akun->tanggal_aktif,
                        'tanggal_kadaluarsa' => $akun->tanggal_kadaluarsa,
                        'status_aktif'=> $akun->status_aktif,
                        'status_login'=>'login'
                    );
                    $this->session->set_userdata($array_sess);

                    $array_cookie = array(
                        'name'=> 'lisensi-warung-abdi',
                        'value'=> $akun->lisensi,
                        'expire'=> time() + (86400 * 30),
                        'path'=> '/',
                        'secure'=> TRUE
                    );
                    $this->input->set_cookie($array_cookie);
                    redirect(base_url('dasbor'));

                }else{
                    $this->session->set_flashdata('error','Lisensi ok, tapi akun dan sandi tidak sesuai.');
                    redirect(base_url());
                }
            }else{
                $this->session->set_flashdata('error','lisensi tidak valid');
                redirect(base_url());    
            }
            

        }else{
            $this->session->set_flashdata('error','lisensi tidak valid');
            redirect(base_url());
        }

    }

    // function login()
    // {
    //     $akun = $this->input->post('akun');
    //     $sandi = $this->input->post('sandi');
    //     $lisensi = $this->input->post('lisensi');

    //     $config['upload_path'] = './assets/lisensi/';
    //     $config['allowed_types'] = 'txt';
        
    //     $this->load->library('upload', $config);
    //     if($this->upload->do_upload('lisensi'))
    //     {
    //         $data = array('upload_data' => $this->upload->data());
    //         $file_lisensi = $data['upload_data']['file_name'];
    //         $MyFile = file_get_contents(base_url()."assets/lisensi/".$file_lisensi);
    //         $rep_file = str_replace(' ','', $MyFile);

    //         // $cek_lisensi = $this->model_main
        
    //     }
    //     else
    //     {
    //     $error = array('error' => $this->upload->display_errors());
    //     print_r($error);
    //     }
    //     // die();

    //     $check = $this->model_main->data_result('akun',array('akun'=>$akun, 'sandi'=>$sandi),null);
    //     if($check->num_rows() > 0){
    //         $row = $check->row();
    //         $array = array(
    //             'akun'  => $row->akun,
    //             'status'=> 'login'
    //         );
    //         $this->session->set_userdata($array);

    //         // $name   = 'lisensi-warung-abdi';
    //         // $value  = '123456789';
    //         // $expire = time() + (86400 * 30);
    //         // // $expire = time() + 20;
    //         // $path  = '/';
    //         // $secure = TRUE;

    //         // setcookie($name,$value,$expire,$path); 

    //         redirect(base_url('dasbor'));
            
    //     }else{
    //         $this->session->set_flashdata('error','akun atau sandi salah!');
    //         redirect(base_url());
    //     }
    // }

    function logout()
    {   
        $this->session->sess_destroy();
        redirect(base_url());
    }

}