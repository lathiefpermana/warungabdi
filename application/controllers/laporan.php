<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporan extends CI_Controller {

    public function session_data()
    {
        $status_login = $this->session->userdata('status_login');
        if(empty($status_login)){
            redirect(base_url('autentikasi'));
        }
    }
    
    //Laporan Penjualan

    //Laporan Barang Masuk

    //Laporan cash Flow

    function cash_flow()
    {
        $data = $this->session_data();
        $bulan = date('m');
        $tahun = date('Y');
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $cash_flow = $this->model_main->data_result('view_cash_flow',array('month(tanggal)'=>$bulan, 'year(tanggal)'=>$tahun),'delete_by IS NULL');
        $saldo = $this->model_main->data_result('view_cash_flow',array('month(tanggal)'=>$bulan, 'year(tanggal)'=>$tahun, 'id_tipe'=>1),'delete_by IS NULL');
        $data['cashflow'] = $cash_flow->result();
        $data['saldo'] = $saldo->row_array();
        $data['content'] = 'laporan/cash_flow';
        $this->load->view('layout',$data);
    }

    //laporan keuangan

    function laba_rugi()
    {
        $data = $this->session_data();
        $bulan = date('m');
        $tahun = date('Y');
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['cash_flow'] = $this->model_main->data_result('view_laporan_cash_flow',array('bulan'=>$bulan,'tahun'=>$tahun),null)->row_array();
        $data['penjualan'] = $this->model_main->data_result('view_laporan_penjualan',array('bulan'=>$bulan,'tahun'=>$tahun),null)->row_array();
        $data['pembelian'] = $this->model_main->data_result('view_laporan_pembelian',array('bulan'=>$bulan,'tahun'=>$tahun),null)->row_array();
        $data['content'] = 'laporan/laba_rugi';
        $this->load->view('layout',$data);
    }

}