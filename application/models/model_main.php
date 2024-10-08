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

    function data_result_limit($table, $where, $where_is, $limit){
        if(!empty($where)){
            $this->db->where($where);
        }
        if(!empty($where_is)){
            $this->db->where($where_is);
        }
        $this->db->limit($limit);
        return $this->db->get($table);
    }

    function last_data($table){
        $this->db->order_by(('id DESC'));
        $this->db->limit(1);
        return $this->db->get($table);
    }

    function last_data_result($table, $where, $where_is){
        if(!empty($where)){
            $this->db->where($where);
        }
        if(!empty($where_is)){
            $this->db->where($where_is);
        }
        $this->db->order_by(('id DESC'));
        $this->db->limit(1);
        return $this->db->get($table);
    }

    function produk_autocomplete($nama){
        $this->db->like('produk',$nama,'both');
        $this->db->limit(10);
        return $this->db->get('view_produk')->result();
    }

    function daftar_harga_autocomplete($nama){
        $this->db->like('nama',$nama,'both');
        $this->db->limit(10);
        return $this->db->get('view_daftar_harga')->result();
    }

    function penjualan_perday($tanggal){
        $this->db->select('sum(total) as penjualan_day');
        $this->db->join('penjualan','penjualan.id = penjualan_item.penjualan');
        $this->db->where('tanggal',$tanggal);
        return $this->db->get('penjualan_item');
    }
    
    function penjualan_permonth($bulan,$tahun){
        $this->db->select('sum(total) as penjualan_month');
        $this->db->join('penjualan','penjualan.id = penjualan_item.penjualan');
        $this->db->where('month(tanggal)',$bulan);
        $this->db->where('year(tanggal)',$tahun);
        return $this->db->get('penjualan_item');
    }

}