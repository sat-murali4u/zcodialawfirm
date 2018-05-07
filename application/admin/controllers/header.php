<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Header extends CI_Controller {

    public $logo_table = 'logo';
    public $menu_table = 'main_menu';
    public $appt_table = 'appointment';
    public $seo_page_table = 'seo_pages';
    public $seo_header_table = 'seo_header';

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->model('header_model');
        $this->load->helper('directory');
        $this->load->library("FileUpload");
        $this->load->library('session');
        $this->load->helper('allowed_url');
        $this->load->helper('text');
        
    }

    function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {

            $this->data['menu'] = true;
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['user_profile'] = $this->tank_auth->get_username();

            $this->load->view('header/header', $data);
            $this->load->view('welcome', $data);
            $this->load->view('footer', $data);
        }
    }

    function logo() {

        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {

            $this->data['menu'] = true;
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['user_profile'] = $this->tank_auth->get_username();
            $data['logo_details'] = $this->header_model->getData('*', $this->logo_table, array('logo_status' => 1, 'logo_deleted' => 0), 'logo_id');
            $this->load->view('header/header', $data);
            $this->load->view('header/header_logo', $data);
            $this->load->view('footer', $data);
        }
    }

    function appointment() {

        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {

            $this->data['menu'] = true;
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['user_profile'] = $this->tank_auth->get_username();
            $data['appt_details'] = $this->header_model->getData('*', $this->appt_table, array('appt_status' => 1, 'appt_deleted' => 0), 'appt_id');

            $this->load->view('header/header', $data);
            $this->load->view('header/appointment', $data);
            $this->load->view('footer', $data);
        }
    }

    function seo() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $map = directory_map('./application/user/controllers/');
            if (isset($map) && !empty($map)) {
                foreach ($map as $key => $value) {
                    if (!is_int($key)) {
                        unset($map[$key]);
                    }
                }
            }
            $unwanted = array('index.html');
            $pages = str_replace('.php', '', array_values(array_diff($map, $unwanted)));
            
            sort($pages);
            $data['controller_pages'] = $pages;

            $this->load->view('header/header', $data);
            $this->load->view('header/seo', $data);
            $this->load->view('footer', $data);
        }
    }

    function menu() {

        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {

            $this->data['menu'] = true;
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['user_profile'] = $this->tank_auth->get_username();
            // $data['logo_details'] = $this->header_model->getData('*', $this->logo_table, array('logo_status' => 1,'logo_deleted'=>0), 'logo_id');;
            //$this->get_menu_details();
            $this->load->view('header/header', $data);
            $this->load->view('header/menu', $data);
            $this->load->view('footer', $data);
        }
    }

    function get_SEOPageDetails() {
        $data['sp_details'] = array();
        $page = $this->input->post('dd_page');
        if ($page !== 0) {
            $data['sp_details'] = $this->header_model->searchContent($this->seo_page_table, array('sp_name' => $page, 'sp_status' => 1, 'sp_deleted' => 0));
            echo json_encode($data['sp_details']);
        }
    }

    function getSEOMenuHeaders() {
        $data['sh_details'] = $this->header_model->searchContent($this->seo_header_table, array('sh_status' => 1, 'sh_deleted' => 0));
        echo json_encode($data['sh_details']);
    }

    function get_menu_entries() { // get top menu entries - ajax on load
        $result = $this->header_model->getMenuData();
        echo json_encode($result);
    }

    function update_seo_details() { // update seo details - form_submit - ajax
        $inserted = 0;
        $sp_name = $this->input->post('dd_page');
        $seo_pages = array('sp_name' => $this->input->post('dd_page'), 'sp_title' => $this->input->post('pageTitle'), 'sp_meta_title' => $this->input->post('metaTitle'), 'sp_meta_desc' => $this->input->post('metaDesc'));
        $seo_header = array('sh_ga_script' => $this->input->post('gaScript'), 'sh_ga_code' => $this->input->post('gaCode'), 'sh_robot_text' => $this->input->post('robotText'));
        $isSPItemExists = $this->header_model->searchContent($this->seo_page_table, array('sp_name' => $sp_name, 'sp_deleted' => 0)); //table, where
        $isSHItemExists = $this->header_model->searchContent($this->seo_header_table, array('sh_status' => 1, 'sh_deleted' => 0)); //table, where

        if ($isSPItemExists <> 0) {
            $sp_id = $isSPItemExists[0]['sp_id'];
            $inserted = $this->header_model->updateData($this->seo_page_table, $seo_pages, array('sp_id' => $sp_id, 'sp_deleted' => 0)); //table, where
        } else {

            if ($sp_name !== 0) {
                $inserted = $this->header_model->insertData($this->seo_page_table, $seo_pages);
            }
        }
        if ($isSHItemExists <> 0) {
            $inserted = $this->header_model->updateData($this->seo_header_table, $seo_header, array('sh_status' => 1, 'sh_deleted' => 0)); //table, where
        } else {
            $inserted = $this->header_model->insertData($this->seo_header_table, $seo_header);
        }
        echo $inserted;
    }

    function delete_menu() { // delete menu based on menu_id in addMenu / Submenu modal
        $this->header_model->updateData($this->menu_table, array('menu_deleted' => 1), array('menu_id' => $this->input->post('menu_id'), 'parent_id' => $this->input->post('parent_id')));
        $inserted = $this->getMenuDetails($this->input->post('parent_id'));
        return $inserted;
    }

    function update_menu() { // add/update menu and submenu details based on parent_id = addMenu / addSubmenu Modal 
        $inserted = 0;
        $isMenuExists = 0;
        $menu_name = $this->input->post('menu_name');
        $url = $this->input->post('url');
        $menu_id = $this->input->post('menu_id');
        $parent_id = $this->input->post('parent_id');
        $menu_type = $this->input->post('menu_type');
        if ($menu_id) {

            $isMenuExists = $this->header_model->searchContent($this->menu_table, array('menu_text' => $menu_name, 'parent_id' => $parent_id, 'menu_status' => 1, 'menu_deleted' => 0, 'menu_id !=' => $menu_id));
        } else {
            $isMenuExists = $this->header_model->searchContent($this->menu_table, array('menu_text' => $menu_name, 'parent_id' => $parent_id, 'menu_status' => 1, 'menu_deleted' => 0));
        }

        if ($isMenuExists == 0 && !$menu_id) {
            $menu = array(
                'menu_text' => trim(ucfirst($menu_name)),
                'parent_id' => $parent_id,
                'url' => $url
            );
            if ($this->header_model->insertData($this->menu_table, $menu)) {
                $inserted = $this->getMenuDetails($parent_id, $menu_type);
                return $inserted;
            }
        } else if ($isMenuExists == 0 && $menu_id) {

            $menu = array(
                'menu_text' => trim(ucfirst($menu_name)),
                'parent_id' => $parent_id,
                'url' => $url
            );

            $where = array('menu_id' => $menu_id, 'menu_deleted' => 0);
            if ($this->header_model->updateData($this->menu_table, $menu, $where)) {
                $inserted = $this->getMenuDetails($parent_id, $menu_type);
                return $inserted;
            }
        } else {
            // Menu name already exists
            echo 0;
        }
    }

    // get menu details for menu and submenu dropdown list to be populated for view page 
    function getMenuDetails($parent_id = false, $menu_type = false) {
        $returndata['menu_details'] = array();
        $searchValues = array('menu_status' => 1, 'menu_deleted' => 0);
        $posted_parent_id = $this->input->post('parent_id');
        if ($posted_parent_id >= 0) {
            $searchValues['parent_id'] = $posted_parent_id;
        } else {
            $searchValues['parent_id'] = $parent_id;
        }

        $data1['menu'] = $this->header_model->getData('*', $this->menu_table, $searchValues, 'menu_text', 'asc');
        if ($posted_parent_id == 0) {
            $returndata['menu_details'] = $this->load->view('menu_dd', $data1, true);
        } else if ($posted_parent_id > 0) {
            $returndata['menu_details'] = $this->load->view('submenu_dd', $data1, true);
        } else {
            $returndata['menu_details'] = $this->load->view('menu_dd', $data1, true);
        }


        return $this->output
                        ->set_header("HTTP/1.0 200 OK")
                        ->set_content_type('application/json')
                        ->set_output(json_encode($returndata));
    }

    function update_logo() { // update functionality for Logo - form_submit()
        $inserted = 0;
        $date = new DateTime();
        $foldername = 'Logo';
        $fav_image = $logo_image = $logo_retina_image = $logo_sticky_retina_image = $logo_mobile_image = $logo_mobile_retina_image = $logo_mobile_sticky_image = $logo_sticky_image = $logo_mobile_sticky_retina_image = '';
        $fav_upload = $logo_upload = $logo_retina_upload = $logo_sticky_retina_upload = $logo_mobile_upload = $logo_mobile_retina_upload = $logo_mobile_sticky_upload = $logo_sticky_upload = $logo_mobile_sticky_retina_upload = '';

        if (!empty($_FILES['fav_image']['name'])) {
            $info = new SplFileInfo($_FILES['fav_image']['name']);
            $fav_image = $date->getTimestamp() . 'fav_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('fav_image', $fav_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $fav_upload = 'uploads/' . $upd_foldername . $fav_image;
                } else {
                    $fav_upload = 'uploads/' . $fav_image;
                }
            }
        }
        if (!empty($_FILES['logo_image']['name'])) {
            $info = new SplFileInfo($_FILES['logo_image']['name']);
            $logo_image = $date->getTimestamp() . 'logo_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('logo_image', $logo_image, $foldername)) { //$file, $filename,$folder_name
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $logo_upload = 'uploads/' . $upd_foldername . $logo_image;
                } else {
                    $logo_upload = 'uploads/' . $logo_image;
                }
            }
        }
        if (!empty($_FILES['logo_retina_image']['name'])) {
            $info = new SplFileInfo($_FILES['logo_retina_image']['name']);
            $logo_retina_image = $date->getTimestamp() . 'logo_retina_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('logo_retina_image', $logo_retina_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $logo_retina_upload = 'uploads/' . $upd_foldername . $logo_retina_image;
                } else {
                    $logo_retina_upload = 'uploads/' . $logo_retina_image;
                }
            }
        }
        if (!empty($_FILES['logo_sticky_image']['name'])) {
            $info = new SplFileInfo($_FILES['logo_sticky_image']['name']);
            $logo_sticky_image = $date->getTimestamp() . 'logo_sticky_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('logo_sticky_image', $logo_sticky_image, $foldername)) { //$file, $filename,$folder_name
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $logo_sticky_upload = 'uploads/' . $upd_foldername . $logo_sticky_image;
                } else {
                    $logo_sticky_upload = 'uploads/' . $logo_sticky_image;
                }
            }
        }
        if (!empty($_FILES['logo_sticky_retina_image']['name'])) {
            $info = new SplFileInfo($_FILES['logo_sticky_retina_image']['name']);
            $logo_sticky_retina_image = $date->getTimestamp() . 'logo_sticky_retina_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('logo_sticky_retina_image', $logo_sticky_retina_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $logo_sticky_retina_upload = 'uploads/' . $upd_foldername . $logo_sticky_retina_image;
                } else {
                    $logo_sticky_retina_upload = 'uploads/' . $logo_sticky_retina_image;
                }
            }
        }
        if (!empty($_FILES['logo_mobile_image']['name'])) {
            $info = new SplFileInfo($_FILES['logo_mobile_image']['name']);
            $logo_mobile_image = $date->getTimestamp() . 'logo_mobile_image.' . $info->getExtension();
            if ($this->fileupload->uploadfile('logo_mobile_image', $logo_mobile_image, $foldername)) { //$file, $filename,$folder_name
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $logo_mobile_upload = 'uploads/' . $upd_foldername . $logo_mobile_image;
                } else {
                    $logo_mobile_upload = 'uploads/' . $logo_mobile_image;
                }
            }
        }
        if (!empty($_FILES['logo_mobile_retina_image']['name'])) {
            $info = new SplFileInfo($_FILES['logo_mobile_retina_image']['name']);
            $logo_mobile_retina_image = $date->getTimestamp() . 'logo_mobile_retina_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('logo_mobile_retina_image', $logo_mobile_retina_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $logo_mobile_retina_upload = 'uploads/' . $upd_foldername . $logo_mobile_retina_image;
                } else {
                    $logo_mobile_retina_upload = 'uploads/' . $logo_mobile_retina_image;
                }
            }
        }
        if (!empty($_FILES['logo_mobile_sticky_image']['name'])) {
            $info = new SplFileInfo($_FILES['logo_mobile_sticky_image']['name']);
            $logo_mobile_sticky_image = $date->getTimestamp() . 'logo_mobile_sticky_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('logo_mobile_sticky_image', $logo_mobile_sticky_image, $foldername)) { //$file, $filename,$folder_name
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $logo_mobile_sticky_upload = 'uploads/' . $upd_foldername . $logo_mobile_sticky_image;
                } else {
                    $logo_mobile_sticky_upload = 'uploads/' . $logo_mobile_sticky_image;
                }
            }
        }
        if (!empty($_FILES['logo_mobile_sticky_retina_image']['name'])) {
            $info = new SplFileInfo($_FILES['logo_mobile_sticky_retina_image']['name']);
            $logo_mobile_sticky_retina_image = $date->getTimestamp() . 'logo_mobile_sticky_retina_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('logo_mobile_sticky_retina_image', $logo_mobile_sticky_retina_image, $foldername)) { //$file, $filename,$folder_name
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $logo_mobile_sticky_retina_upload = 'uploads/' . $upd_foldername . $logo_mobile_sticky_retina_image;
                } else {
                    $logo_mobile_sticky_retina_upload = 'uploads/' . $logo_mobile_sticky_retina_image;
                }
            }
        }

        $logoDetails = array(
            'title' => $this->input->post('title'),
            'logo_title' => $this->input->post('logo_title'),
            'logo_href' => $this->input->post('logo_href'),
            'logo_alt_text' => $this->input->post('logo_alt_text'),
            'logo_header_height' => $this->input->post('logo_header_height'),
            'logo_header_width' => $this->input->post('logo_header_width'),
            'logo_footer_height' => $this->input->post('logo_footer_height'),
            'logo_footer_width' => $this->input->post('logo_footer_width'),
            'logo_sticky_alt_text' => $this->input->post('logo_sticky_alt_text'),
            'logo_mobile_retina_alt_text' => $this->input->post('logo_mobile_retina_alt_text'),
            'logo_mobile_sticky_retina_alt_text' => $this->input->post('logo_mobile_sticky_retina_alt_text'),
            'logo_data_height' => $this->input->post('logo_data_height'),
            'logo_data_padding' => $this->input->post('logo_data_padding'),
            'logo_main_data_height' => $this->input->post('logo_main_data_height'),
            'logo_sticky_data_height' => $this->input->post('logo_sticky_data_height'),
            'logo_mobile_data_height' => $this->input->post('logo_mobile_data_height'),
            'logo_mobile_sticky_data_height' => $this->input->post('logo_mobile_sticky_data_height')
        );

        if (isset($fav_upload) && !empty($fav_upload)) {
            $logoDetails['fav_image'] = cleanurl($fav_upload);
        }
        if (isset($logo_upload) && !empty($logo_upload)) {
            $logoDetails['logo_image'] = cleanurl($logo_upload);
        }
        if (isset($logo_retina_upload) && !empty($logo_retina_upload)) {
            $logoDetails['logo_retina_image'] = cleanurl($logo_retina_upload);
        }
        if (isset($logo_sticky_upload) && !empty($logo_sticky_upload)) {
            $logoDetails['logo_sticky_image'] = cleanurl($logo_sticky_upload);
        }
        if (isset($logo_sticky_retina_upload) && !empty($logo_sticky_retina_upload)) {
            $logoDetails['logo_sticky_retina_image'] = cleanurl($logo_sticky_retina_upload);
        }
        if (isset($logo_mobile_upload) && !empty($logo_mobile_upload)) {
            $logoDetails['logo_mobile_image'] = cleanurl($logo_mobile_upload);
        }
        if (isset($logo_mobile_retina_upload) && !empty($logo_mobile_retina_upload)) {
            $logoDetails['logo_mobile_retina_image'] = cleanurl($logo_mobile_retina_upload);
        }
        if (isset($logo_mobile_sticky_upload) && !empty($logo_mobile_sticky_upload)) {
            $logoDetails['logo_mobile_sticky_image'] = cleanurl($logo_mobile_sticky_upload);
        }
        if (isset($logo_mobile_sticky_retina_upload) && !empty($logo_mobile_sticky_retina_upload)) {
            $logoDetails['logo_mobile_sticky_retina_image'] = cleanurl($logo_mobile_sticky_retina_upload);
        }


        $isLogoDetailsExists = $this->header_model->searchContent($this->logo_table, array('logo_status' => 1, 'logo_deleted' => 0));
        if ($isLogoDetailsExists == 0) {
            $inserted = $this->header_model->insertData($this->logo_table, $logoDetails);
        } else {
            //  echo '<pre>';print_r($isLogoDetailsExists);die;
            $inserted = $this->header_model->updateData($this->logo_table, $logoDetails, array('logo_status' => 1, 'logo_deleted' => 0));
        }

        echo $inserted;
    }

    function update_appointment() { // update functionality for Appointment - form_submit()
        $inserted = 0;
        $date = new DateTime();
        $foldername = 'Appointment';
        $appt_phone_image = $appt_clock_image = '';
        $appt_phone_image_upload = $appt_clock_image_upload = '';

        if (!empty($_FILES['appt_phone_image']['name'])) {
            $info = new SplFileInfo($_FILES['appt_phone_image']['name']);
            $appt_phone_image = $date->getTimestamp() . 'appt_phone_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('appt_phone_image', $appt_phone_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $appt_phone_image_upload = 'uploads/' . $upd_foldername . $appt_phone_image;
                } else {
                    $appt_phone_image_upload = 'uploads/' . $appt_phone_image;
                }
            }
        }

        if (!empty($_FILES['appt_clock_image']['name'])) {
            $info = new SplFileInfo($_FILES['appt_clock_image']['name']);
            $appt_clock_image = $date->getTimestamp() . 'appt_clock_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('appt_clock_image', $appt_clock_image, $foldername)) { //$file, $filename,$folder_name
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $appt_clock_image_upload = 'uploads/' . $upd_foldername . $appt_clock_image;
                } else {
                    $appt_clock_image_upload = 'uploads/' . $appt_clock_image;
                }
            }
        }


        $appointmentDetails = array(
            'appt_phone' => $this->input->post('appt_phone'),
            'appt_open_days' => $this->input->post('appt_open_days'),
            'appt_vacation_days' => $this->input->post('appt_vacation_days'),
            'appt_time_between' => $this->input->post('appt_time_between'),
            'appt_fa_phone_icon' => $this->input->post('appt_fa_phone_icon'),
            'appt_fa_clock_icon' => $this->input->post('appt_fa_clock_icon'),
        );

        if (isset($appt_phone_image_upload) && !empty($appt_phone_image_upload)) {
            $appointmentDetails['appt_phone_image'] = cleanurl($appt_phone_image_upload);
        }
        if (isset($appt_clock_image_upload) && !empty($appt_clock_image_upload)) {
            $appointmentDetails['appt_clock_image'] = cleanurl($appt_clock_image_upload);
        }


        $isApptDetailsExists = $this->header_model->searchContent($this->appt_table, array('appt_status' => 1, 'appt_deleted' => 0));
        if ($isApptDetailsExists == 0) {
            $inserted = $this->header_model->insertData($this->appt_table, $appointmentDetails);
        } else {
            $inserted = $this->header_model->updateData($this->appt_table, $appointmentDetails, array('appt_status' => 1, 'appt_deleted' => 0));
        }

        echo $inserted;
    }

}
