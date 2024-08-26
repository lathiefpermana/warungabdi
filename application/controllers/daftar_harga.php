<?php
defined('BASEPATH') or exit('No direct script access allowed');

class daftar_harga extends CI_Controller {

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
        $query  = "SELECT * FROM view_daftar_harga";
        $search = array('produk','nama','harga_jual','jumlah_jual','satuan');
        $where = null;
        $isWhere = 'delete_by IS NULL';
        header('Content-Type: application/json');
        echo $this->model_datatables->get_tables_query($query,$search,$where,$isWhere);
    }

    public function index()
    {
        $data = $this->session_data();
        $data['content'] = 'daftar_harga/index';
        $this->load->view('layout',$data);
    }

    function get_autocomplete()
    {
        if(isset($_GET['term'])){
            $result = $this->model_main->stok_autocomplete($_GET['term']);
            if(count($result) > 0){
                foreach($result as $row)
                $arr_result[] = $row->produk;
                echo json_encode($arr_result);
            }
        }
    }

    function getsatuanstok()
    {
        $produk = $this->input->post('produk');
        $search = $this->model_main->data_result('view_stok',array('produk'=>$produk),null);
        if($search->num_rows() > 0){
            $stok = $search->row();
            echo '<label class="form-label" for="validateCustom01">Satuan stok</label>';
            echo '<input type="text" class="form-control" name="satuan_stok" id="validateCustom01" value="'.$stok->satuan.'" readonly>';
            echo '<input type="text" class="form-control" name="id_produk" value="'.$stok->id_produk.'" hidden>';
            echo '<input type="text" class="form-control" name="id_satuan" value="'.$stok->id_satuan.'" hidden>';
        }else{
            echo '<label class="form-label" for="validateCustom01">Satuan stok</label>';
            echo '<input type="text" step="any" class="form-control" id="validateCustom01" placeholder="Not Found" required>';
            echo '<div class="invalid-feedbeck">Not Found</div>';
        }
    }

    function tambah()
    {
        $data = $this->session_data();
        $data['content'] = 'daftar_harga/tambah';
        $this->load->view('layout',$data);
    }

    function simpan()
    {
        $produk = $this->input->post('id_produk');
        $nama = $this->input->post('nama');
        $harga_jual = $this->input->post('harga_jual');
        $jumlah_jual = $this->input->post('jumlah_jual');
        $id_satuan = $this->input->post('id_satuan');

        $check = $this->model_main->data_result('daftar_harga',array('produk'=>$produk,'jumlah_jual'=>$jumlah_jual,'status_aktif'=>'aktif'),'delete_by IS NULL');
        if($check->num_rows() > 0){
            $daftar = $check->row();
            $id = $daftar->id;
            $array2 = array(
                'status_aktif' => 'non aktif',
                'update_by' => $this->session->userdata('id_akun'),
                'update_at' => date('Y-m-d H:i:s')
            );
            $this->model_main->update_data($id,'daftar_harga', $array2);
        }
        
        $array = array(
            'produk'=> $produk,
            'nama' => $nama,
            'harga_jual' => $harga_jual,
            'jumlah_jual' => $jumlah_jual,
            'satuan' => $id_satuan,
            'status_aktif' => 'aktif',
            'created_by' => $this->session->userdata('id_akun'),
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->model_main->insert_data('daftar_harga',$array);
        $this->session->set_flashdata('success','Data disimpan!');
        redirect(base_url('daftar_harga'));
    }

    function sunting()
    {
        $data = $this->session_data();
        $id = $this->uri->segment(3);
        $daftar = $this->model_main->data_result('view_daftar_harga',array('id'=>$id),'delete_by IS NULL');
        $data['daftar'] = $daftar->row_array();
        $data['content'] = 'daftar_harga/sunting';
        $this->load->view('layout',$data);  

    }

    function pembaruan()
    {
        $id = $this->input->post('id');
        $produk = $this->input->post('id_produk');
        $nama = $this->input->post('nama');
        $harga_jual = $this->input->post('harga_jual');
        $jumlah_jual = $this->input->post('jumlah_jual');
        $satuan = $this->input->post('id_satuan');

        $array = array(
            'produk' => $produk,
            'nama' => $nama,
            'harga_jual' => $harga_jual,
            'jumlah_jual' => $jumlah_jual,
            'satuan' => $satuan,
            'update_by' => $this->session->userdata('id_akun'),
            'update_at' => date('Y-m-d H:i:s')
        );

        $this->model_main->update_data($id, 'daftar_harga',$array);
        $this->session->set_flashdata('success','Data diperbarui!');
        redirect(base_url('daftar_harga'));
    }

    function hapus()
    {
        $id = $this->uri->segment(3);
        $array = array(
            'delete_by' => $this->session->userdata('id_akun'),
            'delete_at' => date('Y-m-d H:i:s')
        );

        $this->model_main->update_data($id,'daftar_harga',$array);
        $this->session->set_flashdata('success','Data dihapus!');
        redirect((base_url('daftar_harga')));
    }

}