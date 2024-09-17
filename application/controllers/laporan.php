<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporan extends CI_Controller {

    public function session_data()
    {
        $lisensi = $this->input->cookie('lisensi-warung-abdi');
        $status_login = $this->session->userdata('status_login');
        if(empty($status_login)){
            redirect(base_url('autentikasi/login'));
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
        $cash_flow = $this->model_main->data_result('view_cash_flow',array('month(tanggal)'=>$bulan, 'year(tanggal)'=>$tahun),'delete_by IS NULL');
        $data['cashflow'] = $cash_flow->result();
        $data['content'] = 'laporan/cash_flow';
        $this->load->view('layout',$data);
    }

}