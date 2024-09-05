<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stok_awal extends CI_Controller {

    public function session_data()
    {
        $lisensi = $this->input->cookie('lisensi-warung-abdi');
        $status_login = $this->session->userdata('status_login');
        if(empty($status_login)){
            redirect(base_url('autentikasi/login'));
        }
    }

    public function index()
    {
        $data = $this->session_data();
        $data['bulan'] = date('m');
        $data['tahun'] = date('Y');
        $data['content'] = 'stok_awal/index';
        $this->load->view('layout',$data);
    }

    function tambah()
    {
        $data = $this->session_data();
        $bulan = date('m');
        $tahun = date('Y');
        $data['content'] = 'stok_awal/tambah';
        $this->load->view('layout',$data);
    }

    function simpan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        if($bulan == 1){ $bulan_lalu = 12; $tahun_lalu = $tahun - 1;}else{ $bulan_lalu = $bulan_lalu = $bulan - 1; $tahun_lalu = $tahun;}
        $cek_stok = $this->model_main->data_result('view_stok',array('bulan' => $bulan, 'tahun' => $tahun),null);
        
        if($cek_stok->num_rows() <= 0){
            $this->session->set_flashdata('error','Stok belum generate!');
            redirect(base_url('stok_awal/tambah'));
        }

        $cek_stok_lalu = $this->model_main->data_result('view_stok',array('bulan' => $bulan_lalu, 'tahun' => $tahun_lalu),null);
        if($cek_stok_lalu->num_rows() <= 0){
            $this->session->set_flashdata('error','Stok lama tidak ada, mohon generate untuk stok bulan lalu!');
            redirect(base_url('stok_awal/tambah'));
        }

        $stok_lalu = $cek_stok_lalu->result();
        foreach ($stok_lalu as $key):
            $produk = $key->id_produk;
        endforeach;
    }

}