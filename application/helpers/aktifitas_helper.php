<?php

function log_activity($action, $item){
    $CI =& get_instance();

    $array = array(
        'date'          => date('Y-m-d'),
        'time'          => date('H:i:s'),
        'pic'           => $CI->session->userdata('name'),
        'ip'            => $_SERVER['REMOTE_ADDR'],
        'action'        => $action, //insert, update, delete, visit, login, logout
        'item'          => $item //packing, user, ink, ink tipe, part
    );

    $CI->load->model('model_main');

    // $CI->model_main->insert_data('yamani_log.log_activity',$array);
}