<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function index()
    {
        $data['content'] = 'dashboard/halaman_utama';
        $this->load->view('layout',$data);
    }
}