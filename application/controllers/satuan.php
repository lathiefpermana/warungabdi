<?php
defined('BASEPATH') or exit('No direct script access allowed');

class satuan extends CI_Controller {

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
        $satuan = $this->model_main->data_result('satuan',null,'delete_by IS NULL');
        $data['satuan'] = $satuan->result();
        $data['content'] = 'satuan/index';
        $this->load->view('layout',$data);
    }

    function tambah()
    {
        $data = $this->session_data();
        $data['content'] = 'satuan/tambah';
        $this->load->view('layout',$data);
    }

    function simpan()
    {
        $nama = $this->input->post('nama');
        $check = $this->model_main->data_result('satuan',array('nama'=>$nama),'delete_by IS NULL');
        if($check->num_rows() >  0){
            $this->session->set_flashdata('error','data duplicate!');
            redirect(base_url('satuan'));
        }
        $array = array(
            'nama'=>$nama,
            'created_by' => $this->session->userdata('id_akun'),
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->model_main->insert_data('satuan',$array);
        $this->session->set_flashdata('success','Data disimpan!');
        redirect(base_url('satuan'));
    }

    function sunting()
    {
        $data = $this->session_data();
        $id = $this->uri->segment(3);
        $satuan = $this->model_main->data_result('satuan',array('id'=>$id),'delete_by IS NULL');
        $data['satuan'] = $satuan->row_array();
        $data['content'] = 'satuan/sunting';
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
        $this->model_main->update_data($id,'satuan',$array);
        $this->session->set_flashdata('success','Data diperbarui!');
        redirect(base_url('satuan'));
    }

    function hapus()
    {
        $id = $this->uri->segment(3);
        $array = array(
            'delete_by' => $this->session->userdata('id_akun'),
            'delete_at' => date('Y-m-d H:i:s')
        );
        $this->model_main->update_data($id,'satuan',$array);
        $this->session->set_flashdata('success','$data dihapus!');
        redirect(base_url('satuan'));
    }

}