<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pemasok extends CI_Controller {

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
        $data['content'] = 'pemasok/index';
        $data['pemasok'] = $this->model_main->data_result('view_pemasok',null,'delete_by IS NULL')->result();
        $this->load->view('layout',$data);
    }

    function tambah()
    {
        $data = $this->session_data();
        $data['content'] = 'pemasok/tambah';
        $this->load->view('layout', $data);
    }

    function simpan()
    {
        $nama = $this->input->post('nama');
        $kontak = $this->input->post('kontak');
        $nomor_telepon = $this->input->post('nomor_telepon');
        $alamat = $this->input->post('alamat');
        $check = $this->model_main->data_result('pemasok',array('nama'=>$nama),null);
        if($check->num_rows() > 0)
        {
            $this->session->set_flashdata('error','data duplicate!');
            redirect(base_url('pemasok/tambah'));
        }
        $array = array(
            'nama' => $nama,
            'kontak' => $kontak,
            'nomor_telepon' => $nomor_telepon,
            'alamat' => $alamat,
            'created_by' => $this->session->userdata('id_akun'),
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->model_main->insert_data('pemasok',$array);
        $this->session->set_flashdata('success','data disimpan!');
        redirect(base_url('pemasok'));
    }
    
    function sunting()
    {
        $data = $this->session_data();
        $id = $this->uri->segment(3);
        $pemasok = $this->model_main->data_result('pemasok',array('id'=>$id),'delete_by IS NULL');
        $data['pemasok'] = $pemasok->row_array();
        $data['content'] = 'pemasok/sunting';
        $this->load->view('layout',$data);
    }

    function pembaruan()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $kontak = $this->input->post('kontak');
        $nomor_telepon = $this->input->post('nomor_telepon');
        $alamat = $this->input->post('alamat');
        $array = array(
            'nama' => $nama,
            'kontak' => $kontak,
            'nomor_telepon' => $nomor_telepon,
            'alamat' => $alamat,
            'update_by' => $this->session->userdata('id_akun'),
            'update_at' => date('Y-m-d H:i:s')
        );
        $this->model_main->update_data($id,'pemasok', $array);
        $this->session->set_flashdata('success','Data diperbarui!');
        redirect(base_url('pemasok'));
    }

    function hapus()
    {
        $id = $this->uri->segment(3);
        $array = array(
            'delete_by' => $this->session->userdata('id_akun'),
            'delete_at' => date('Y-m-d H:i:s')
        );
        $this->model_main->update_data($id,'pemasok',$array);
        $this->session->set_flashdata('success','$data dihapus!');
        redirect(base_url('pemasok'));
    }
    

}