<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang_masuk extends CI_Controller {

    public function index()
    {
        $data['content'] = 'barang_masuk/index';
        $this->load->view('layout',$data);
    }

    function tambah()
    {
        $data['content'] = 'barang_masuk/tambah';
        $this->load->view('layout', $data);
    }

}