<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('apiresponce')) {

    function apiresponse($status, $status_custom_msg, $response) {
        $data = array();
        if ($status == '1') {
            $status_msg = 'Sucess';
        } else {
            $status_msg = 'Error';
        }

        $data['responseCode'] = $status;
        $data['responseStatus'] = $status_msg;
        $data['responseMessage'] = $status_custom_msg;
        $data['response'] = $response;
        return $data;
    }

}

if (!function_exists('query_res_return')) {
    function query_res_return($data, $resata = FALSE) {
        if ($data->num_rows > 0) {
            $return = $data->result_array();
        } else {
            $return = false;
        }
        if (isset($resata) && $resata == '1' && $return != FALSE) {
            $return = $return[0];
        }
        return $return;
    }

}
// default ajax responce for web 
if (!function_exists('ajax_result_response')) {

    function ajax_result_response($data) {
        if(!empty($data)){
            $return = json_encode($data);
        }else{
            $return = false;
        }
        return $return;
    }

}