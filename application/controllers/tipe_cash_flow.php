<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tipe_cash_flow extends CI_Controller {

    public function session_data()
    {
        $status_login = $this->session->userdata('status_login');
        if(empty($status_login)){
            redirect(base_url('autentikasi'));
        }
    }

    public function  index()
    {
        $data = $this->session_data();
        $data['tipe_cash_flow'] = $this->model_main->data_result('tipe_cash_flow',null,'delete_by IS NULL')->result();
        $data['content'] = 'tipe_cash_flow/index';
        $this->load->view('layout',$data);
    }

    function tambah()
    {
        $data = $this->session_data();
        $data['content'] = 'tipe_cash_flow/tambah';
        $this->load->view('layout',$data);
    }

    function simpan()
    {
        $nama = $this->input->post('nama');
        $array = array(
            'nama' => $nama,
            'created_by' => $this->session->userdata('id_akun'),
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->model_main->insert_data('tipe_cash_flow',$array);
        $this->session->set_flashdata('success','Data disimpan!');
        redirect(base_url('tipe_cash_flow'));
    }

    function sunting()
    {
        $data = $this->session_data();
        $id = $this->uri->segment(3);
        $tipe = $this->model_main->data_result('tipe_cash_flow',array('id'=>$id),'delete_by IS NULL');
        $data['tipe'] = $tipe->row_array();
        $data['content'] = 'tipe_cash_flow/sunting';
        $this->load->view('layout',$data);
    }

    function pembaruan()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');

        $array = array(
           'nama' => $nama,
            'update_by' => $this->session->userdata('id_akun'),
            'update_at' => date('Y-m-d H:i:s') 
        );

        $this->model_main->update_data($id, 'tipe_cash_flow',$array);
        $this->session->set_flashdata('success','Data diperbarui!');
        redirect(base_url('tipe_cash_flow'));
    }

    function hapus()
    {
        $id = $this->uri->segment(3);
        $array = array(
            'delete_by' => $this->session->userdata('id_akun'),
            'delete_at' => date('Y-m-d H:i:s') 
        );

        $this->model_main->update_data($id, 'tipe_cash_flow',$array);
        $this->session->set_flashdata('success','Data dihapus!');
        redirect(base_url('tipe_cash_flow'));
    }

}