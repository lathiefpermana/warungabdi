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
}