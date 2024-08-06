<?php
defined('BASEPATH') or exit('No direct script access allowed');

class produk extends CI_Controller {

    public function index()
    {
        $data['content'] = 'produk/index';
        $this->load->view('layout',$data);
    }
}