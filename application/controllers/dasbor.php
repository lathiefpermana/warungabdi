<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dasbor extends CI_Controller {

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
        $tanggal = date('Y-m-d');
        $bulan = date('m');
        $tahun = date('Y');
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $day = $this->model_main->penjualan_perday($tanggal);
        $month = $this->model_main->penjualan_permonth($bulan,$tahun);
        $data['day'] = $day->row_array();
        $data['month'] = $month->row_array();
        $data['cash_flow'] = $this->model_main->data_result('view_laporan_cash_flow',array('bulan'=>$bulan,'tahun'=>$tahun),null)->row_array();
        $data['content'] = 'dasbor/index';
        $this->load->view('layout',$data);
    }
}