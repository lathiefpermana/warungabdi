<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stok_opname extends CI_Controller {

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
        $bulan = $this->uri->segment(3);
        $tahun = $this->uri->segment(4);
        if(empty($bulan)){ $bln = date('m');}else{ $bln = $bulan;}
        if(empty($tahun)){ $thn = date('Y');}else{ $thn = $tahun;}
        $data['bulan'] = $bln;
        $data['tahun'] = $thn;
        $data['content'] = 'stok_opname/index';
        $data['stok'] = $this->model_main->data_result('view_stok_opname',array('bulan'=>$bln,'tahun'=> $thn),null)->result();
        $this->load->view('layout',$data);
    }

    function tambah()
    {
        $stok = $this->input->post('stok');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');

        if(empty($jumlah)){
            $jumlah = 0;
        }

        $cek = $this->model_main->data_result('stok_opname',array('stok'=>$stok),null);
        if($cek->num_rows() > 0){
            $stok_opname = $cek->row();
            $id = $stok_opname->id;

            $array = array(
                'stok' => $stok,
                'jumlah' => $jumlah,
                'keterangan' => $keterangan,
                'update_by' => $this->session->userdata('id_akun'),
                'update_at' => date('Y-m-d H:i:s')
            );

            $this->model_main->update_data($id,'stok_opname',$array);
        }else{
            $array = array(
                'stok' => $stok,
                'jumlah' => $jumlah,
                'keterangan' => $keterangan,
                'created_by' => $this->session->userdata('id_akun'),
                'created_at' => date('Y-m-d H:i:s')
            );

            $this->model_main->insert_data('stok_opname',$array);
        }
        $this->session->set_flashdata('success','Data disimpan!');
        redirect(base_url('stok_opname'));
    }

}