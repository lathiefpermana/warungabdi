<?php
defined('BASEPATH') or exit('No direct script access allowed');

class produk extends CI_Controller {

    public function index()
    {
        $data['content'] = 'produk/index';
        $this->load->view('layout',$data);
    }

    function tambah()
    {
        $kategori = $this->model_main->data_result('kategori_produk',null,null);
        $data['kategori'] = $kategori->result();
        $data['content'] = 'produk/tambah';
        $this->load->view('layout',$data);
    }

    function simpan()
    {
        $kategori_produk = $this->input->post('kategori_produk');
        $barcode = $this->input->post('barcode');
        $nama = $this->input->post('nama');

        $array = array(
            'kategori_produk' => $kategori_produk,
            'barcode' => $barcode,
            'nama' => strtoupper($nama),
            'created_by' => $this->session->userdata('id_akun'),
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->model_main->insert_data('produk',$array);
        $this->session->set_flashdata('success','data disimpan!');
        redirect(base_url('produk'));
    }
}