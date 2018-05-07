<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FileUpload
 *
 * @author Administrator
 */
class FileUpload {

    public $CI;

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->library("upload");
    }

    public function uploadfile($file, $filename, $folder_name = false) {
        $chkfolder = $config = '';

        if (isset($folder_name) && !empty($folder_name)) {
            $chkfolder = './uploads/' . $folder_name;
            if (!file_exists($chkfolder)) {
                mkdir($chkfolder, 0777, true);
            }
            $config['upload_path'] = $chkfolder;
        } else {
            $config['upload_path'] = './uploads';
        }
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '500000'; 
        $config['file_name'] = $filename;

        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload($file)) {
            $error = array('error' => $this->CI->upload->display_errors());
            echo '<pre>error_upload:';
            print_r($error);
            die;
            return false;
        } else {
            return $this->CI->upload->data();
        }
    }

    public function upload_files($file, $filename, $folder_name = false) {
       
        $chkfolder = $config = '';

        if (isset($folder_name) && !empty($folder_name)) {
            $chkfolder = './uploads/' . $folder_name;
            if (!file_exists($chkfolder)) {
                mkdir($chkfolder, 0777, true);
            }
            $config['upload_path'] = $chkfolder;
        } else {
            $config['upload_path'] = './uploads';
        }
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $filename;

//        $files = $_FILES;
//        for ($i = 0; $i < count($_FILES[$file]['name']); $i++) {
//            $_FILES[$file]['name'] = $files[$file]['name'][$i];
//            $_FILES[$file]['type'] = $files[$file]['type'][$i];
//            $_FILES[$file]['tmp_name'] = $files[$file]['tmp_name'][$i];
//            $_FILES[$file]['error'] = $files[$file]['error'][$i];
//            $_FILES[$file]['size'] = $files[$file]['size'][$i];


            $this->CI->upload->initialize($config);
           
            if (!$this->CI->upload->do_upload($file)) {
                $error = array('error' => $this->CI->upload->display_errors());
                echo '<pre>error_upload:';
                print_r($error);
                die;
                return false;
            } else {
                return $this->CI->upload->data();
            }
//        }
    }

    public function cupload($file, $filename) {
        $config['upload_path'] = "uploads/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $filename;


        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload($file)) {
            $error = array('error' => $this->CI->upload->display_errors());
            return false;
        } else {
            return $this->CI->upload->data();
        }
    }

}

?>
