<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_main extends CI_Model{
    
    function insert_data($table,$array){
        $this->db->insert($table,$array);
    }
}