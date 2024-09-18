<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stok extends CI_Controller {

    public function session_data()
    {
        $status_login = $this->session->userdata('status_login');
        if(empty($status_login)){
            redirect(base_url('autentikasi'));
        }
    }

    function ajax_list()
    {
        $bulan = $this->uri->segment(3);
        $tahun = $this->uri->segment(4);
        $query  = "SELECT * FROM view_stok";
        $search = array('kategori_produk','produk');
        $where = array('bulan'=>$bulan,'tahun'=>$tahun);
        $isWhere = null;
        header('Content-Type: application/json');
        echo $this->model_datatables->get_tables_query($query,$search,$where,$isWhere);
    }

    public function index()
    {
        $data = $this->session_data();
        $bulan = date('m');
        $tahun = date('Y');
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['content'] = 'stok/index';
        $this->load->view('layout',$data);
    }

    function generate()
    {
        $data = $this->session_data();
        $data['content'] = 'stok/generate';
        $this->load->view('layout',$data);
    }

    function generate_stok()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $produk = $this->model_main->data_result('produk',null,'delete_by IS NULL')->result();
        $jumlah = 0;
        foreach ($produk as $key):
            $check = $this->model_main->data_result('stok',array('produk'=>$key->id,'bulan'=>$bulan,'tahun'=>$tahun),null);
            if($check->num_rows() > 0){
                // no action
            }else{
                // get stok awal
                if($bulan == 1){ $bulan_lalu = 12; $tahun_lalu = $tahun - 1; }else{ $bulan_lalu = $bulan - 1; $tahun_lalu = $tahun; }
                $stok_awal = $this->model_main->data_result('view_stok',array('bulan'=>$bulan_lalu,'tahun'=>$tahun_lalu,'id_produk'=>$key->id),null);
                if($stok_awal->num_rows() > 0){
                    $awal = $stok_awal->row();
                    $stok_awal = $awal->stok_balance;
                }else{
                    $stok_awal = 0;
                }
                //end get stok awal
                $array = array(
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'produk' => $key->id,
                    'satuan' => $key->satuan,
                    'stok_awal' => $stok_awal,
                    'stok_masuk' => 0,
                    'stok_keluar' => 0,
                    'stok_opname' => 0
                );
                $jumlah = $jumlah + 1;
                $this->model_main->insert_data('stok',$array);
            }
        endforeach;
        $this->session->set_flashdata('success','Data : '.$jumlah.' disimpan! ');
        redirect(base_url('stok'));
    }

}