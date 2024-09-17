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
        $cash_flow = $this->model_main->data_result('view_cash_flow',null,'delete_by IS NULL');
        $data['cash_flow'] = $cash_flow->result();
        $data['content'] = 'cash_flow/index';
        $this->load->view('layout',$data);
    }

    function tambah()
    {
        $data = $this->session_data();
        $data['tipe'] = $this->model_main->data_result('tipe_cash_flow',null,'delete_by IS NULL')->result();
        $data['content'] = 'cash_flow/tambah';
        $this->load->view('layout',$data);
    }

    function simpan()
    {
        $tanggal = $this->input->post('tanggal');
        $tipe = $this->input->post('tipe');
        $deskripsi = $this->input->post('deskripsi');
        $nominal = $this->input->post('nominal');

        $array = array(
            'tanggal' => $tanggal,
            'jam' => date("H:i:s"),
            'tipe' => $tipe,
            'deskripsi' =>  $deskripsi,
            'nominal' => $nominal,
            'created_by' => $this->session->userdata('id_akun'),
            'created_at' => date('Y-m-d')
        );
        
        $this->model_main->insert_data('cash_flow',$array);
        $this->session->set_flashdata('success','Data disimpan!');
        redirect(base_url('cash_flow'));
    }

    function sunting()
    {
        $data = $this->session_data();
        $id = $this->uri->segment(3);
        $data['tipe'] = $this->model_main->data_result('tipe_cash_flow',null,'delete_by IS NULL')->result();
        $data['cash'] = $this->model_main->data_result('cash_flow',array('id'=>$id),'delete_by IS NULL')->row_array();
        $data['content'] = 'cash_flow/sunting';
        $this->load->view('layout',$data);
    }

    function pembaruan()
    {
        $id = $this->input->post('id');
        $tanggal = $this->input->post('tanggal');
        $jam = date('H:i:s');
        $tipe = $this->input->post('tipe');
        $deskripsi = $this->input->post('deskripsi');
        $nominal = $this->input->post('nominal');

        $array = array(
            'tanggal' => $tanggal,
            'jam' => date("H:i:s"),
            'tipe' => $tipe,
            'deskripsi' =>  $deskripsi,
            'nominal' => $nominal,
            'update_by' => $this->session->userdata('id_akun'),
            'update_at' => date('Y-m-d')
        );

        $this->model_main->update_data($id, 'cash_flow',$array);
        $this->session->set_flashdata('success','Data diperbarui!');
        redirect(base_url('cash_flow'));
    }

    function hapus()
    {
        $id = $this->uri->segment(3);

        $array = array(
            'delete_by' => $this->session->userdata('id_akun'),
            'delete_at' => date('Y-m-d')
        );

        $this->model_main->update_data($id, 'cash_flow',$array);
        $this->session->set_flashdata('success','Data dihapus!');
        redirect(base_url('cash_flow'));
    }

}