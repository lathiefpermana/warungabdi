<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang_masuk extends CI_Controller {

    public function index()
    {
        $barang_masuk = $this->model_main->data_result('view_barang_masuk',null,'delete_by IS NULL');
        $data['barang_masuk'] = $barang_masuk->result();
        $data['content'] = 'barang_masuk/index';
        $this->load->view('layout',$data);
    }

    function get_autocomplete()
    {
        if(isset($_GET['term'])){
            $result = $this->model_main->produk_autocomplete($_GET['term']);
            if(count($result) > 0){
                foreach($result as $row)
                $arr_result[] = $row->detail_produk;
                echo json_encode($arr_result);
            }
        }
    }

    function tambah()
    {
        $pemasok = $this->model_main->data_result('view_pemasok',null,'delete_by IS NULL');
        $data['pemasok'] = $pemasok->result();
        $data['content'] = 'barang_masuk/tambah';
        $this->load->view('layout', $data);
    }

    function simpan()
    {
        $tanggal = $this->input->post('tanggal');
        $pemasok = $this->input->post('pemasok');
        $nomor_faktur = $this->input->post('nomor_faktur');
        $array = array(
            'tanggal' => $tanggal,
            'pemasok' => $pemasok,
            'nomor_faktur' => $nomor_faktur,
            'created_by' => $this->session->userdata('id_akun'),
            'created_at' => date('Y-m-d H:i:s')
        );        
        $this->model_main->insert_data('barang_masuk',$array);
        $last = $this->model_main->last_data('barang_masuk')->row();
        $id = $last->id;

        redirect(base_url('barang_masuk/tambah_item/'.$id));
    }

    function tambah_item()
    {
        $id = $this->uri->segment(3);
        $barang_masuk = $this->model_main->data_result('view_barang_masuk',array('id'=>$id),'delete_by IS NULL');
        $data['barang_masuk'] = $barang_masuk->row_array();
        $satuan = $this->model_main->data_result('satuan',null,'delete_by IS NULL');
        $data['satuan'] = $satuan->result();
        $daftar_produk = $this->model_main->data_result('view_barang_masuk_item',array('barang_masuk'=>$id),'delete_by IS NULL');
        $data['daftar_produk'] = $daftar_produk->result();
        $data['content'] = 'barang_masuk/tambah_item';
        $this->load->view('layout',$data);
    }

    function simpan_item()
    {
        $barang_masuk = $this->input->post('barang_masuk');
        $detail_produk = $this->input->post('detail_produk');
        $search = $this->model_main->data_result('view_produk',array('detail_produk'=>$detail_produk),'delete_by IS NULL')->row();
        $produk = $search->id;
        $jumlah = $this->input->post('jumlah');
        $satuan = $this->input->post('satuan');
        $modal = $this->input->post('modal');
        $jumlah_stok = $this->input->post('jumlah_stok');
        $satuan_stok = $this->input->post('satuan_stok');
        $kadaluarsa = $this->input->post('kadaluarsa');
        if(empty($kadaluarsa)){ $kadaluarsa = null;}
        $array = array(
            'barang_masuk'=>$barang_masuk,
            'produk'=>$produk,
            'jumlah'=>$jumlah,
            'satuan'=>$satuan,
            'modal'=>$modal,
            'jumlah_stok'=>$jumlah_stok,
            'satuan_stok'=>$satuan_stok,
            'status_stok'=> 'belum',
            'kadaluarsa'=>$kadaluarsa,
            'created_by'=> $this->session->userdata('id_akun'),
            'created_at'=> date('Y-m-d H:i:s')
        );
        $this->model_main->insert_data('barang_masuk_item',$array);
        $this->session->set_flashdata('success','Data disimpan!');
        redirect((base_url('barang_masuk/tambah_item/'.$barang_masuk)));        
    }

    function hapus_item()
    {
        $id = $this->uri->segment(3);
        $barang_masuk = $this->uri->segment(4);
        $item = $this->model_main->data_result('barang_masuk_item',array('id'=>$id,'status_stok'=>'sudah'),'delete_by IS NULL');
        if($item->num_rows() > 0){
            //potong stok
            $items = $item->row();
            $produk = $items->produk;
            $stok = $this->model_main->data_result('stok',array('produk'=>$produk),null)->row();
            $jumlah_new = $stok->jumlah - $items->jumlah_stok;
            $array = array(
                'jumlah' => $jumlah_new
            );
            $this->model_main->update_data($stok->id,'stok',$array);
            $status_stok = 'hapus stok';
        }else{
            $status_stok = 'tidak hapus stok';
        }
        $array1 = array(
            'delete_by'=> $this->session->userdata('id_akun'),
            'delete_at'=> date('Y-m-d H:i:s'),
            'status_stok' => $status_stok
        );
        $this->model_main->update_data($id,'barang_masuk_item',$array1);
        $this->session->set_flashdata('success','Data dihapus!');
        redirect((base_url('barang_masuk/tambah_item/'.$barang_masuk)));
    }

    function simpan_stok()
    {
        $id = $this->uri->segment(3); //barang masuk
        $item = $this->model_main->data_result('barang_masuk_item',array('barang_masuk'=>$id,'status_stok'=>'belum'),'delete_by IS NULL');
        if($item->num_rows() > 0)
        {        
            foreach($item->result() as $key):
                $id_barang_masuk_item = $key->id; //id barang masuk item
                $produk = $key->produk;
                $jumlah_stok = $key->jumlah_stok;
                $satuan = $key->satuan_stok;

                $check_stok = $this->model_main->data_result('stok',array('produk'=>$produk),null);
                if($check_stok->num_rows() > 0){
                    $stok = $check_stok->row();
                    $id_stok = $stok->id;
                    $jumlah = $stok->jumlah +  $jumlah_stok;

                    $array = array(
                        'jumlah'=> $jumlah
                    );
                    $this->model_main->update_data($id_stok,'stok',$array);
                }else{
                    $array1 = array(
                        'produk' => $produk,
                        'jumlah' => $jumlah_stok,
                        'satuan' => $satuan
                    );
                    $this->model_main->insert_data('stok',$array1);
                }
                $array2 = array(
                    'status_stok' => 'sudah'
                );
                $this->model_main->update_data($id_barang_masuk_item,'barang_masuk_item',$array2);
            endforeach;
            $this->session->set_flashdata('success','Data stok disimpan!');
            redirect(base_url('barang_masuk'));
        }else{
            $this->session->set_flashdata('info','Selesai! Tidak ada stok diperbarui!');
            redirect(base_url('barang_masuk'));
        }   
    }

    function sunting()
    {
        $id = $this->uri->segment(3);
        $barang_masuk = $this->model_main->data_result('barang_masuk',array('id'=>$id),null);
        $barang_masuk_item = $this->model_main->data_result('barang_masuk_item',array('barang_masuk'=>$id),'delete_by IS NULL');
        $pemasok = $this->model_main->data_result('pemasok',null,'delete_by IS NULL');
        $data['barang_masuk'] = $barang_masuk->row_array();
        $data['daftar_produk'] = $barang_masuk_item->result();
        $data['pemasok'] = $pemasok->result();
        $data['content'] = 'barang_masuk/sunting';
        $this->load->view('layout',$data);
    }

    function pembaruan()
    {
        $id = $this->input->post('id');
        $tanggal = $this->input->post('tanggal');
        $pemasok = $this->input->post('pemasok');
        $nomor_faktur = $this->input->post('nomor_faktur');

        $array = array(
            'tanggal' => $tanggal,
            'pemasok' => $pemasok,
            'nomor_faktur' => $nomor_faktur
        );
        $this->model_main->update_data($id,'barang_masuk',$array);
        $this->session->set_flashdata('success','Data diperbarui!');
        redirect(base_url('barang_masuk/sunting/'.$id));
    }

}