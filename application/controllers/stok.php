<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stok extends CI_Controller {

    public function session_data()
    {
        $lisensi = $this->input->cookie('lisensi-warung-abdi');
        $status_login = $this->session->userdata('status_login');
        if(empty($status_login)){
            redirect(base_url('autentikasi/login'));
        }
    }

    function ajax_list()
    {
        // $test = $this->model_main->data_result('view_stok',null,null)->result();
        $query  = "SELECT * FROM view_stok";
        $search = array('kategori_produk','produk');
        $where = null;
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
        $stok = $this->model_main->data_result('view_stok',array('bulan'=>$bulan,'tahun'=>$tahun),null);
        $data['stok'] = $stok->result();
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
                $array = array(
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'produk' => $key->id,
                    'satuan' => $key->satuan,
                    'stok_awal' => 0,
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