<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategori_produk extends CI_Controller {

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
        $data['content'] = 'kategori_produk/index';
        $data['kategori_produk'] = $this->model_main->data_result('kategori_produk',null,'delete_by IS NULL')->result();
        $this->load->view('layout',$data);
    }

    function tambah()
    {
        $data = $this->session_data();
        $data['content'] = 'kategori_produk/tambah';
        $this->load->view('layout', $data);
    }

    function simpan()
    {
        $nama = $this->input->post('nama');
        $check = $this->model_main->data_result('kategori_produk',array('nama'=>$nama),null);
        if($check->num_rows() > 0)
        {
            $this->session->set_flashdata('error','data duplicate!');
            redirect(base_url('kategori_produk/tambah'));
        }
        $array = array(
            'nama' => $nama,
            'created_by' => $this->session->userdata('id_akun'),
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->model_main->insert_data('kategori_produk',$array);
        $this->session->set_flashdata('success','data disimpan!');
        redirect(base_url('kategori_produk'));
    }

    function sunting()
    {
        $data = $this->session_data();
        $id = $this->uri->segment(3);
        $kategori_produk = $this->model_main->data_result('kategori_produk',array('id'=>$id),'delete_by IS NULL');
        $data['kategori_produk'] = $kategori_produk->row_array();
        $data['content'] = 'kategori_produk/sunting';
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
        $this->model_main->update_data($id,'kategori_produk', $array);
        $this->session->set_flashdata('success','Data diperbarui!');
        redirect(base_url('kategori_produk'));
    }

    function hapus()
    {
        $id = $this->uri->segment(3);
        $array = array(
            'delete_by' => $this->session->userdata('id_akun'),
            'delete_at' => date('Y-m-d H:i:s')
        );
        $this->model_main->update_data($id,'kategori_produk',$array);
        $this->session->set_flashdata('success','$data dihapus!');
        redirect(base_url('kategori_produk'));
    }

}