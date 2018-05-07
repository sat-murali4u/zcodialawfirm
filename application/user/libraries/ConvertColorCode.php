<?php

class ConvertColorCode {

    public $CI;

    public function __construct() {
        $this->CI = & get_instance();
    }

    public function convert2rgb($colorcode) {
        $split = str_split($colorcode, 2);
        $r = hexdec($split[0]);
        $g = hexdec($split[1]);
        $b = hexdec($split[2]);
        return "rgba(" . $r . ", " . $g . ", " . $b . ",1)";
    }

    public function rgb2hex2rgb($color) {
        if (!$color)
            return false;
        $color = trim($color);
        $result = false;
        if (preg_match("/^[0-9ABCDEFabcdef\#]+$/i", $color)) {
            $hex = str_replace('#', '', $color);
            if (!$hex)
                return false;
            if (strlen($hex) == 3):
                $result['r'] = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
                $result['g'] = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
                $result['b'] = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
            else:
                $result['r'] = hexdec(substr($hex, 0, 2));
                $result['g'] = hexdec(substr($hex, 2, 2));
                $result['b'] = hexdec(substr($hex, 4, 2));
            endif;
        }elseif (preg_match("/^[0-9]+(,| |.)+[0-9]+(,| |.)+[0-9]+$/i", $color)) {
            $rgbstr = str_replace(array(',', ' ', '.'), ':', $color);
            $rgbarr = explode(":", $rgbstr);
            $result = '#';
            $result .= str_pad(dechex($rgbarr[0]), 2, "0", STR_PAD_LEFT);
            $result .= str_pad(dechex($rgbarr[1]), 2, "0", STR_PAD_LEFT);
            $result .= str_pad(dechex($rgbarr[2]), 2, "0", STR_PAD_LEFT);
            $result = strtoupper($result);
        } else {
            $result = false;
        }

        return $result;
    }

}
