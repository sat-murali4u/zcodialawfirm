<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('allowed_url')) {

    function cleanurl($string) {
        $string = str_replace(array('[\', \']'), '', $string);
        $string = preg_replace('/\[.*\]/U', '', $string);
        return $string;
    }

}


