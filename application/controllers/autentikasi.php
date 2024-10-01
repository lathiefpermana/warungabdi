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
                $lisensi = $this->input->cookie('lisensi-warung-abdi');
                $akun = $this->model_main->data_result('view_akun_lisensi',array('lisensi'=>$lisensi),null);
                if($akun->num_rows() > 0)
                {

                    $akuns  = $akun->row();
                    $tanggal_kadaluarsa = $akuns->tanggal_kadaluarsa;
                    if(date('Y-m-d') > $tanggal_kadaluarsa){
                        $this->model_main->update_data($akuns->id_lisensi, 'akun_lisensi', array('status_aktif'=>'non aktif'));
                    }
                    $data['akun'] = $akun->row_array();
                    $this->session->set_flashdata('error','Silahkan login kembali');
                    $this->load->view('autentikasi/login_lisensi',$data);
                }else{
                    delete_cookie('lisensi-warung-abdi');
                    delete_cookie('user');
                    $this->session->set_flashdata('error','Akun tidak ditemukan');
                    redirect((base_url('authentikasi')));
                }
            }
        }else{
            $status = $this->session->userdata('status_login');
            if(!empty($status)){
                redirect(base_url('dasbor'));
            }else{
                $this->load->view('autentikasi/login');
            }
        }        
    }

    function daftar()
    {
        $this->load->view('autentikasi/daftar');
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
            $lisensi_text_valid = str_replace(array("\r","\n"),"",$lisensi_text);
        
            $cek_lisensi = $this->model_main->data_result('view_akun_lisensi',array('lisensi'=>$lisensi_text_valid),null);
            if($cek_lisensi->num_rows() > 0){
                $akun_lisensi = $cek_lisensi->row();
                $id = $akun_lisensi->id;
                $cek_akun = $this->model_main->data_result('view_akun_lisensi',array('id'=>$id,'akun'=>$akun,'sandi'=>sha1($sandi)),null);
                if($cek_akun->num_rows() > 0){
                    $akun = $cek_akun->row();

                    if(date('Y-m-d') > $akun->tanggal_kadaluarsa){
                        $this->model_main->update_data($akun->id_lisensi, 'akun_lisensi', array('status_aktif'=>'non aktif'));
                    }

                    $array_sess = array(
                        'warung' => $akun->warung,
                        'id_akun'=> $akun->id,
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
                        'expire'=> time() + (10 * 365 * 24 * 60 * 60),
                        'path'=> '/'
                    );
                    $this->input->set_cookie($array_cookie);
                    
                    redirect(base_url('dasbor'));

                }else{
                    $this->session->set_flashdata('error','Lisensi benar, namun akun dan sandi tidak sesuai.');
                    redirect(base_url());
                }
            }else{
                $this->session->set_flashdata('error','lisensi tidak benar');
                redirect(base_url());    
            }
            

        }else{
            $this->session->set_flashdata('error','lisensi tidak benar');
            redirect(base_url());
        }

    }

    function login_lisensi(){
        $akun = $this->input->post('akun');
        $sandi = $this->input->post('sandi');
        $lisensi = $this->input->post('lisensi');

        $cek = $this->model_main->data_result('view_akun_lisensi',array('akun'=>$akun,'sandi'=>sha1($sandi), 'lisensi'=>$lisensi),null);
        if($cek->num_rows() > 0){
            $akun = $cek->row();

            if(date('Y-m-d') > $akun->tanggal_kadaluarsa){
                $this->model_main->update_data($akun->id_lisensi, 'akun_lisensi', array('status_aktif'=>'non aktif'));
            }

            $array_sess = array(
                'warung' => $akun->warung,
                'id_akun'=> $akun->id,
                'akun_level'=> $akun->akun_level,
                'akun'=> $akun->akun,
                'lisensi'=>  $akun->lisensi,
                'tanggal_aktif'=> $akun->tanggal_aktif,
                'tanggal_kadaluarsa' => $akun->tanggal_kadaluarsa,
                'status_aktif'=> $akun->status_aktif,
                'status_login'=>'login'
            );
            $this->session->set_userdata($array_sess);
            redirect(base_url('dasbor'));
        }else{
            $lisensi = $this->input->cookie('lisensi-warung-abdi');
            $akun = $this->model_main->data_result('view_akun_lisensi',array('lisensi'=>$lisensi),null);
            if($akun->num_rows() > 0){
                $akuns  = $akun->row();
                $tanggal_kadaluarsa = $akuns->tanggal_kadaluarsa;
                if(date('Y-m-d') > $tanggal_kadaluarsa){
                    $this->model_main->update_data($akuns->id_lisensi, 'akun_lisensi', array('status_aktif'=>'non aktif'));
                }
                
                $data['akun'] = $akun->row_array();
                $this->session->set_flashdata('error','Sandi salah!');
                $this->load->view('autentikasi/login_lisensi',$data);
            }else{
                delete_cookie('lisensi-warung-abdi');
                delete_cookie('user');
                $this->session->set_flashdata('error','Akun tidak ditemukan!');
                redirect(base_url('autentikasi'));
            }
        }

    }

    function delete_cookie(){
        delete_cookie('lisensi-warung-abdi');
        delete_cookie('user');
        redirect(base_url('autentikasi'));
    }

    function logout()
    {   
        $this->session->sess_destroy();
        redirect(base_url());
    }

    function lupa_sandi()
    {
        $this->load->view('autentikasi/lupa_sandi');
    }

    function permintaan_sandi()
    {
        $akun = $this->input->post('akun');
        $cek = $this->model_main->data_result('akun',array('akun'=>$akun),null);
        if($cek->num_rows() > 0){
            $data_akun = $cek->row();
            $status = $data_akun->status_aktif;
            $tanggal_kadaluarsa = $data_akun->tanggal_kadaluarsa;
            if($status != 'aktif'){
                redirect(base_url('autentikasi/pembelian_lisensi'));
            }else{
                if($tanggal_kadaluarsa < date('Y-m-d')){
                    echo "akun sudah tidak aktif";
                    echo "update akun jadi non aktif";
                }else{
                    echo "kirim permintaan sandi";
                }
            }
        }else{
            echo "tidak ada";
        }
    }

    function pembelian_lisensi()
    {
        $this->load->view('pembelian_lisensi');
    }

}