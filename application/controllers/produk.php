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

        $check = $this->model_main->data_result('produk',array('nama'=>$nama),null);
        if($check->num_rows() > 0)
        {
            $this->session->set_flashdata('error','data duplicate!');
            redirect(base_url('produk'));
        }
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

    function ajax_list()
    {
        $query  = "SELECT * FROM view_produk";
        $search = array('kategori_produk','barcode','nama_produk','created_by','created_at');
        $where = null;
        $isWhere = null;
        header('Content-Type: application/json');
        echo $this->model_datatables->get_tables_query($query,$search,$where,$isWhere);
    }

    function sunting()
    {
        $id = $this->uri->segment(3);
        $produk = $this->model_main->data_result('produk',array('id'=>$id),null);
        $kategori = $this->model_main->data_result('kategori_produk',null,null);
        $data['produk'] = $produk->row_array();
        $data['kategori'] = $kategori->result();
        $data['content'] = 'produk/sunting';
        $this->load->view('layout',$data);
    }

    function pembaruan()
    {
        $id = $this->input->post('id');
        $kategori_produk = $this->input->post('kategori_produk');
        $barcode = $this->input->post('barcode');
        $nama = $this->input->post('nama');
        $array = array(
            'kategori_produk' => $kategori_produk,
            'barcode' => $barcode,
            'nama' => $nama,
            'update_by' => $this->session->userdata('id_akun'),
            'update_at' => date('Y-m-d H:i:s')
        );

        $this->model_main->update_data($id,'produk',$array);
        $this->session->set_flashdata('success','Data diperbarui!');
        redirect(base_url('produk'));
    }
}