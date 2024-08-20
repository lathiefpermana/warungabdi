<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_main extends CI_Model{
    
    function insert_data($table,$array){
        $this->db->insert($table,$array);
    }

    function update_data($id, $table, $array){
        $this->db->where('id',$id);
        $this->db->update($table, $array);
    }

    function data_result($table, $where, $where_is){
        if(!empty($where)){
            $this->db->where($where);
        }
        if(!empty($where_is)){
            $this->db->where($where_is);
        }
        return $this->db->get($table);
    }

    function produk_autocomplete($nama){
        $this->db->select('produk.nama as nama, kategori_produk.nama as kategori_produk');
        $this->db->join('kategori_produk','kategori_produk.id = produk.kategori_produk');
        $this->db->like('produk.nama', $nama, 'both');
        $this->db->or_like('kategori_produk.nama', $nama, 'both');
        $this->db->where('produk.delete_by IS NULL');
        $this->db->order_by('produk.nama','ASC');
        $this->db->limit(10);
        return $this->db->get('produk')->result();
    }
}