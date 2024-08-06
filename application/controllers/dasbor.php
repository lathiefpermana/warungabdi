<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dasbor extends CI_Controller {

    public function index()
    {
        $data['content'] = 'dasbor/index';
        $this->load->view('layout',$data);
    }
}