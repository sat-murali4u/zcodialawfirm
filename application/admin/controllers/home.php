<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public $homeTestimonials = 'home_testimonials';
    public $testimonialSlider = 'testimonial_slider';
    public $home_slider = 'home_slider';
    public $home_slider_box = 'home_slider_box';
    public $home_testimonial_bg = 'home_testimonial_bg';
    public $home_counter = 'home_counter';
    public $disclaimer_table = 'disclaimer';
    public $disclaimer_acceptor = 'disclaimer_acceptor';
    public $about_testimonial_table = 'about_testimonial';
    public $about_consultation_table = 'about_consultation';

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->model('home_model');
        $this->load->library("FileUpload");
        $this->load->library('session');
        $this->load->helper('allowed_url');
        $this->load->helper('text');
    }

    function accept_disclaimer() {
        $date = new DateTime();
        $ipAddress = '';

        ob_start();
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        system('ipconfig /all');
        $mycom = ob_get_contents();
        ob_clean();
        $findme = "Physical";
        $pmac = strpos($mycom, $findme);
        $mac = substr($mycom, ($pmac + 36), 17);
        $sys_details = array(
            'da_ipaddr' => gethostbyname(php_uname('n')),
            'da_agreed_status' => $this->input->post('option'),
            'da_physical_address' => $mac, 'da_hostname' => php_uname('n'), 'da_logged_on' => $date->getTimestamp());
        $this->home_model->insertData($this->disclaimer_acceptor, $sys_details);
        echo $this->input->post('option');
    }

    function get_remote_system_details() {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $macAddr = false;

        #run the external command, break output into lines
        $arp = `arp -a $ipAddress`;
        $lines = explode("\n", $arp);
        print_r($lines);
        die;
        #look for the output line describing our IP address
        foreach ($lines as $line) {
            $cols = preg_split('/\s+/', trim($line));
            if ($cols[0] == $ipAddress) {
                $macAddr = $cols[1];
            }
        }
        echo $macAddr;
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

    function testimonials() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['testimonials'] = $this->home_model->getData('*', $this->homeTestimonials, '', 'ht_id');
            $data['home_testimonial_bg_image'] = $this->home_model->getData('tmimg_bg', $this->home_testimonial_bg, array('tmimg_status' => 1, 'tmimg_deleted' => 0), 'tmimg_id');

            $this->load->view('header/header', $data);
            $this->load->view('home_testimonials', $data);
            $this->load->view('footer', $data);
        }
    }

    function disclaimer() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['disclaimer'] = $this->home_model->getData('*', $this->disclaimer_table, '', 'disclaimer_id');

            $this->load->view('header/header', $data);
            $this->load->view('disclaimer', $data);
            $this->load->view('footer', $data);
        }
    }

    function slider() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();


            $this->load->view('header/header', $data);
            $this->load->view('home_slider', $data);
            $this->load->view('footer');
        }
    }

    function counter_part() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();


            $this->load->view('header/header', $data);
            $this->load->view('counter_part', $data);
            $this->load->view('footer');
        }
    }

    function slider_box() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['hsb'] = $this->home_model->getData('*', $this->home_slider_box, array('hsb_status' => 1), 'hsb_id');


            $this->load->view('header/header', $data);
            $this->load->view('home_slider_box', $data);
            $this->load->view('footer');
        }
    }
    
    function consultation(){
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['about_consultation'] = $this->home_model->getData('*', $this->about_consultation_table, array('abt_consult_status' => 1), 'abt_consult_id');


            $this->load->view('header/header', $data);
            $this->load->view('about_consultation', $data);
            $this->load->view('footer');
        }
    }

    function update_hs_status() { // status change - for home slider - in datatable
        $hs_id = $this->input->post('hs_id');

        $hs_status = array('hs_status' => $this->input->post('hs_status'));
        $updated = $this->home_model->updateData($this->home_slider, $hs_status, array('hs_id' => $hs_id));

        echo $updated;
    }

    function update_hc_status() { // status change - for home counter - in datatable
        $hc_id = $this->input->post('hc_id');

        $hc_status = array('hc_status' => $this->input->post('hc_status'));
        $updated = $this->home_model->updateData($this->home_counter, $hc_status, array('hc_id' => $hc_id));

        echo $updated;
    }

    function update_tms_status() { // status change - for testimonial slider = in datatable
        $tms_id = $this->input->post('tms_id');
        $tms_status = array('tms_status' => $this->input->post('tms_status'));
        $updated = $this->home_model->updateData($this->testimonialSlider, $tms_status, array('tms_id' => $tms_id));

        echo $updated;
    }

    function update_ht_status() { // status change - for home Testimonial items - in datatable
        $ht_id = $this->input->post('ht_id');
        $ht_status = array('ht_status' => $this->input->post('ht_status'));
        $updated = $this->home_model->updateData($this->homeTestimonials, $ht_status, array('ht_id' => $ht_id));

        echo $updated;
    }

    function get_tmslist() { // Testimonial slider - for datatable
        $this->data1 = array();
        $data = array();
        $select = 'tms_id, tms_name, tms_content, tms_image, tms_image_sign, tms_status';
        $from = $this->testimonialSlider;
        $where = array('tms_deleted' => 0);
        $orderby = "tms_id";

        $tmsitems_list = $this->home_model->getData($select, $from, $where, $orderby);

        if (isset($tmsitems_list) && !empty($tmsitems_list)) {
            foreach ($tmsitems_list as $key => $value) {

                $value['tms_name'] = character_limiter($value['tms_name'], 30);
                $value['tms_content'] = $value['tms_content'];
                $value['tms_image'] = '<img class="dt_image_tms ' . (!file_exists($value['tms_image']) ? 'no_image' : '') . '"  src="' . ((file_exists($value['tms_image'])) ? $value['tms_image'] : 'themes/backend/assets/dist/img/noimage.png') . '" />';
                $value['tms_image_sign'] = '<img class="dt_image_tms ' . (!file_exists($value['tms_image_sign']) ? 'no_image' : '') . '"  src="' . ((file_exists($value['tms_image_sign'])) ? $value['tms_image_sign'] : 'themes/backend/assets/dist/img/noimage.png') . '" />';
                $value['action'] = '<a onclick="getTMSItemDetails($(this));" tms_id="' . $value['tms_id'] . '" class="edit_tmsitems btn"><i class="fa fa-pencil"></i></a>' . '<a onclick="delTMSItemDetails($(this));" class="btn open_popup_modal" tms_id=' . $value['tms_id'] . '  data-toggle="modal" data-target="#modal-delete_tmsitems"><i class="fa fa-trash-o"></i></a>';
                $value['tms_status'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['tms_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_tms_status($(this));" tms_id="' . $value['tms_id'] . '" tms_status="' . $value['tms_status'] . '"><span class="slider round"></span></label></a>';
                unset($value['tms_id']);
                $data['data'][] = array_values($value);
            }
        }

        if (empty($data)) {
            $data['data'] = [];
            echo json_encode($data);
        } else {
            echo json_encode($data);
        }
    }

    function get_HomeTMItems() { // for datatable
        $this->data1 = array();
        $data = array();
        $select = 'ht_id, ht_value, ht_text, ht_image, ht_status';
        $from = $this->homeTestimonials;
        $where = array('ht_deleted' => 0);
        $orderby = "ht_id";

        $htitems_list = $this->home_model->getData($select, $from, $where, $orderby);

        if (isset($htitems_list) && !empty($htitems_list)) {
            foreach ($htitems_list as $key => $value) {

                $value['ht_value'] = character_limiter($value['ht_value'], 30);
                $value['ht_text'] = $value['ht_text'];
                $value['ht_image'] = '<img class="dt_image_tms ' . (!file_exists($value['ht_image']) ? 'no_image' : '') . '"  src="' . ((file_exists($value['ht_image'])) ? $value['ht_image'] : 'themes/backend/assets/dist/img/noimage.png') . '" />';
                $value['action'] = '<a onclick="getHTItemDetails($(this));" ht_id="' . $value['ht_id'] . '" class="edit_htitems btn"><i class="fa fa-pencil"></i></a>' . '<a onclick="delHTItemDetails($(this));" class="btn open_popup_modal" ht_id=' . $value['ht_id'] . '  data-toggle="modal" data-target="#modal-delete_htitems"><i class="fa fa-trash-o"></i></a>';
                $value['ht_status'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['ht_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_ht_status($(this));" ht_id="' . $value['ht_id'] . '" ht_status="' . $value['ht_status'] . '"><span class="slider round"></span></label></a>';

                unset($value['ht_id']);
                $data['data'][] = array_values($value);
            }
        }
        if (empty($data)) {
            $data['data'] = [];
            echo json_encode($data);
        } else {
            echo json_encode($data);
        }
    }

    function get_HomeSliderItems() { // for datatable
        // $data1 = $this->data;
        $this->data1 = array();
        $data = array();
        $aitems_options = array();
        $select = 'hs_id, hs_header1, hs_subheader1, hs_subheader2, hs_bgimage, hs_signature,  hs_status';
        $from = $this->home_slider;
        $where = array('hs_deleted' => 0);
        $orderby = "hs_id";

        $hstems_list = $this->home_model->getData($select, $from, $where, $orderby);

        if (!empty($hstems_list)) {
            foreach ($hstems_list as $key => $value) {
                $value['hs_header1'] = character_limiter($value['hs_header1'], 30);
                $value['hs_subheader1'] = $value['hs_subheader1'];
                $value['hs_subheader2'] = $value['hs_subheader2'];
                $value['hs_bgimage'] = '<img class="dt_image_tms ' . (!file_exists($value['hs_bgimage']) ? 'no_image' : '') . '"  src="' . ((file_exists($value['hs_bgimage'])) ? $value['hs_bgimage'] : 'themes/backend/assets/dist/img/noimage.png') . '" />';
                $value['hs_signature'] = '<img class="dt_image_tms ' . (!file_exists($value['hs_signature']) ? 'no_image' : '') . '"  src="' . ((file_exists($value['hs_signature'])) ? $value['hs_signature'] : 'themes/backend/assets/dist/img/noimage.png') . '" />';
                $value['action'] = '<a onclick="getHSItemDetails($(this));" hs_id="' . $value['hs_id'] . '" class="edit_hsitems btn"><i class="fa fa-pencil"></i></a>' . '<a onclick="delHSItemDetails($(this));" class="btn open_popup_modal" hs_id=' . $value['hs_id'] . '  data-toggle="modal" data-target="#modal-delete_hsitems"><i class="fa fa-trash-o"></i></a>';
                $value['hs_status'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['hs_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_hs_status($(this));" hs_id="' . $value['hs_id'] . '" hs_status="' . $value['hs_status'] . '"><span class="slider round"></span></label></a>';

                unset($value['hs_id']);
                $data['data'][] = array_values($value);
            }
        }
        if (empty($data)) {
            $data['data'] = [];
            echo json_encode($data);
        } else {
            echo json_encode($data);
        }
    }

    function get_HomeCounterItems() { // for datatable
        // $data1 = $this->data;
        $this->data1 = array();
        $data = array();
        $aitems_options = array();
        $select = 'hc_id, hc_name, hc_count, hc_image_class, hc_image,  hc_status';
        $from = $this->home_counter;
        $where = array('hc_deleted' => 0);
        $orderby = "hc_id";

        $hctems_list = $this->home_model->getData($select, $from, $where, $orderby);

        if (!empty($hctems_list)) {
            foreach ($hctems_list as $key => $value) {
                $value['hc_name'] = character_limiter($value['hc_name'], 30);
                $value['hc_count'] = $value['hc_count'];
                $value['hc_image_class'] = '<div class="icon-box"><i class="flat_icon ' . $value['hc_image_class'] . '"></i></div>';
                $value['hc_image'] = '<img class="dt_image_tms ' . (!file_exists($value['hc_image']) ? 'no_image' : '') . '"  src="' . ((file_exists($value['hc_image'])) ? $value['hc_image'] : 'themes/backend/assets/dist/img/noimage.png') . '" />';
                $value['action'] = '<a onclick="getHCItemDetails($(this));" hc_id="' . $value['hc_id'] . '" class="edit_hcitems btn"><i class="fa fa-pencil"></i></a>' . '<a onclick="delHCItemDetails($(this));" class="btn open_popup_modal" hc_id=' . $value['hc_id'] . '  data-toggle="modal" data-target="#modal-delete_hcitems"><i class="fa fa-trash-o"></i></a>';
                $value['hc_status'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['hc_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_hc_status($(this));" hc_id="' . $value['hc_id'] . '" hc_status="' . $value['hc_status'] . '"><span class="slider round"></span></label></a>';

                unset($value['hc_id']);
                $data['data'][] = array_values($value);
            }
        }
        if (empty($data)) {
            $data['data'] = [];
            echo json_encode($data);
        } else {
            echo json_encode($data);
        }
    }

    function testimonialSlider() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['about_testimonial'] = $this->home_model->getData('*', $this->about_testimonial_table, '', 'abt_tm_id');

            $this->load->view('header/header', $data);
            $this->load->view('home_testimonial_slider', $data);
            $this->load->view('footer');
        }
    }

    function update_testimonials() { //on trigger of testimonials_submit()
        $inserted = 0;
        $date = new DateTime();
        $testimonial_image = $actual_testimonial_image = $isAboutItemExists = $testimonial_bg_Item = '';
        $testimonial_bg_image = $actual_testimonial_bg_image = '';
        $foldername = 'Testimonials';
        if (!empty($_FILES['testimonial_image']['name'])) {

            $actual_testimonial_image = $_FILES['testimonial_image']['name'];
            $info = new SplFileInfo($_FILES['testimonial_image']['name']);
            $testimonial_image = $date->getTimestamp() . 'testimonial_image.' . $info->getExtension();
            if ($this->fileupload->uploadfile('testimonial_image', $testimonial_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $testimonial_image = 'uploads/' . $upd_foldername . $testimonial_image;
                } else {
                    $testimonial_image = 'uploads/' . $testimonial_image;
                }
            }
        }

        if (!empty($_FILES['testimonial_bg_image']['name'])) {

            $actual_testimonial_bg_image = $_FILES['testimonial_bg_image']['name'];
            $info = new SplFileInfo($_FILES['testimonial_bg_image']['name']);
            $testimonial_bg_image = $date->getTimestamp() . 'testimonial_bg_image.' . $info->getExtension();
            if ($this->fileupload->uploadfile('testimonial_bg_image', $testimonial_bg_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $testimonial_bg_image = 'uploads/' . $upd_foldername . $testimonial_bg_image;
                } else {
                    $testimonial_bg_image = 'uploads/' . $testimonial_bg_image;
                }
            }
        }


        $testimonialItem = array('ht_value' => $this->input->post('txtTMName'),
            'ht_text' => $this->input->post('txtHomeTMContent')
        );


        if (isset($testimonial_image) && !empty($testimonial_image)) {
            $testimonialItem['ht_image'] = cleanurl($testimonial_image);
        }

        if (isset($testimonial_bg_image) && !empty($testimonial_bg_image)) {
            $testimonial_bg_Item['tmimg_bg'] = cleanurl($testimonial_bg_image);
        }

        $ht_id = $this->input->post('ht_id');

        if (isset($ht_id) && !empty($ht_id)) { //update search
            $isAboutItemExists = $this->home_model->searchContent($this->homeTestimonials, array('ht_id' => $ht_id, 'ht_deleted' => 0)); //table, where
        } else { //insert search
            $isAboutItemExists = $this->home_model->searchContent($this->homeTestimonials, array('ht_status' => 1, 'ht_deleted' => 0)); //table, where
        }

        if ($isAboutItemExists <> 0 && isset($ht_id) && !empty($ht_id)) {

            if (isset($testimonialItem['ht_image']) && !empty($testimonialItem['ht_image'])) {
                if (isset($isAboutItemExists[0]['ht_image']) && !empty($isAboutItemExists[0]['ht_image'])) {
                    if (file_exists($isAboutItemExists[0]['ht_image'])) {
                        $res = unlink($isAboutItemExists[0]['ht_image']);
                    }
                }
            }
        }

        $check_tm_item_empty = array_filter($testimonialItem);

        if (empty($ht_id)) {
            if (isset($check_tm_item_empty) && !empty($check_tm_item_empty)) {
                $inserted = $this->home_model->insertData($this->homeTestimonials, $testimonialItem);
            }
            if (isset($testimonial_bg_Item) && !empty($testimonial_bg_Item)) {
                $this->home_model->insertData($this->home_testimonial_bg, $testimonial_bg_Item);
            }
        } else {

            if (isset($ht_id) && !empty($ht_id)) {
                if (isset($check_tm_item_empty) && !empty($check_tm_item_empty)) {
                    $inserted = $this->home_model->updateData($this->homeTestimonials, $testimonialItem, array('ht_id' => $ht_id, 'ht_deleted' => 0));
                }
                if (isset($testimonial_bg_Item) && !empty($testimonial_bg_Item)) {
                    $inserted = $this->home_model->insertData($this->home_testimonial_bg, $testimonial_bg_Item);
                }
            }
        }
        echo $inserted;
    }

    function update_disclaimer() {      // update for disclaimer content - form_submit action
        $inserted = 0;

        $disclaimerData = array('disclaimer_content' => $this->input->post('disclaimer_content'));

        $isDisclaimerExists = $this->home_model->searchContent($this->disclaimer_table, array('disclaimer_status' => 1, 'disclaimer_deleted' => 0)); //insert - table, where

        if (empty($isDisclaimerExists)) {
            $inserted = $this->home_model->insertData($this->disclaimer_table, $disclaimerData);
        } else {
            $inserted = $this->home_model->updateData($this->disclaimer_table, $disclaimerData, array('disclaimer_status' => 1, 'disclaimer_deleted' => 0)); //table, where
        }

        echo $inserted;
    }

    function update_TMS() { // update for testimonial slider - tms_form_submit action
        $inserted = 0;
        $date = new DateTime();
        $TMS_image = $actual_TMS_image = $isTMSItemExists = '';
        $TMS_image_sign = $actual_TMS_image_sign = '';
        $foldername = 'Testimonials';

        if (!empty($_FILES['HomeTMS_image']['name'])) {
            $actual_TMS_image = $_FILES['HomeTMS_image']['name'];
            $info = new SplFileInfo($_FILES['HomeTMS_image']['name']);
            $TMS_image = $date->getTimestamp() . 'HomeTMS_image.' . $info->getExtension();
            if ($this->fileupload->uploadfile('HomeTMS_image', $TMS_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $TMS_image = 'uploads/' . $upd_foldername . $TMS_image;
                } else {
                    $TMS_image = 'uploads/' . $TMS_image;
                }
            }
        }

        if (!empty($_FILES['HomeTMS_image_sign']['name'])) {
            $actual_TMS_image_sign = $_FILES['HomeTMS_image_sign']['name'];
            $info = new SplFileInfo($_FILES['HomeTMS_image_sign']['name']);
            $TMS_image_sign = $date->getTimestamp() . 'HomeTMS_image_sign.' . $info->getExtension();
            if ($this->fileupload->uploadfile('HomeTMS_image_sign', $TMS_image_sign, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $TMS_image_sign = 'uploads/' . $upd_foldername . $TMS_image_sign;
                } else {
                    $TMS_image_sign = 'uploads/' . $TMS_image_sign;
                }
            }
        }

        $abt_testimonial = array('abt_tm_main_title' => $this->input->post('abt_tm_main_title'),
            'abt_tm_sub_title' => $this->input->post('abt_tm_sub_title')
        );

        $TMSItem = array('tms_name' => $this->input->post('txtHomeTMSName'),
            'tms_content' => $this->input->post('txtHomeContentTMS')
        );

        $IsEmpty_TMSItem = array_filter($TMSItem);

        if (isset($TMS_image) && !empty($TMS_image)) {
            $TMSItem['tms_image'] = cleanurl($TMS_image);
        }
        if (isset($TMS_image_sign) && !empty($TMS_image_sign)) {
            $TMSItem['tms_image_sign'] = cleanurl($TMS_image_sign);
        }

        $tms_id = $this->input->post('tms_id');

        $is_abt_testimonial_exists = $this->home_model->searchContent($this->about_testimonial_table);

        if ($is_abt_testimonial_exists == 0) {
            $inserted = $this->home_model->insertData($this->about_testimonial_table, $abt_testimonial);
        } else if ($is_abt_testimonial_exists <> 0) {
            $inserted = $this->home_model->updateData($this->about_testimonial_table, $abt_testimonial, array('abt_tm_id' => 1));
        }

        if ($isTMSItemExists <> 0 && isset($tms_id) && !empty($tms_id) && isset($IsEmpty_TMSItem) && !empty($IsEmpty_TMSItem)) {
            if (isset($TMSItem['tms_image']) && !empty($TMSItem['tms_image'])) {
                if (isset($isTMSItemExists[0]['tms_image']) && !empty($isTMSItemExists[0]['tms_image'])) {
                    if (file_exists($isTMSItemExists[0]['tms_image'])) {
                        $res = unlink($isTMSItemExists[0]['tms_image']);
                    }
                }
            }


            if (isset($TMSItem['tms_image_sign']) && !empty($TMSItem['tms_image_sign']) && isset($IsEmpty_TMSItem) && !empty($IsEmpty_TMSItem)) {
                if (isset($isTMSItemExists[0]['tms_image_sign']) && !empty($isTMSItemExists[0]['tms_image_sign'])) {
                    if (file_exists($isTMSItemExists[0]['tms_image_sign'])) {
                        $res = unlink($isTMSItemExists[0]['tms_image_sign']);
                    }
                }
            }
        }

        if ($is_abt_testimonial_exists == 0) {
            $inserted = $this->home_model->insertData($this->about_testimonial_table, $abt_testimonial);
        } else if ($is_abt_testimonial_exists <> 0) {
            $inserted = $this->home_model->updateData($this->about_testimonial_table, $abt_testimonial, array('abt_tm_id' => 1));
        }

        if (empty($tms_id) && isset($IsEmpty_TMSItem) && !empty($IsEmpty_TMSItem)) {
            $inserted = $this->home_model->insertData($this->testimonialSlider, $TMSItem);
        } else {

            if (isset($tms_id) && !empty($tms_id) && isset($IsEmpty_TMSItem) && !empty($IsEmpty_TMSItem)) { //update
                $inserted = $this->home_model->updateData($this->testimonialSlider, $TMSItem, array('tms_id' => $tms_id, 'tms_deleted' => 0)); //table, where
            }
        }

        echo $inserted;
    }

    function update_counter() { // home counter - update function on form_submit 
        $inserted = 0;
        $date = new DateTime();
        $hc_item = $hc_image = '';
        $hc_image_class = $actual_hc_image_class = $ishcItemExists = '';
        $foldername = 'Home_Counter';

        if (!empty($_FILES['hc_image']['name'])) {
            $actual_hc_bg_image = $_FILES['hc_image']['name'];
            $info = new SplFileInfo($_FILES['hc_image']['name']);
            $hc_image = $date->getTimestamp() . 'hc_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('hc_image', $hc_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $hc_image = 'uploads/' . $upd_foldername . $hc_image;
                } else {
                    $hc_image = 'uploads/' . $hc_image;
                }
            }
        }


        $hc_item = array(
            'hc_name' => $this->input->post('hc_name'),
            'hc_count' => $this->input->post('hc_count'),
            'hc_image_class' => $this->input->post('hc_image_class')
        );

        if (isset($hc_image) && !empty($hc_image)) {
            $hc_item['hc_image'] = cleanurl($hc_image);
        }

        $hc_id = $this->input->post('hc_id');

        if (isset($hc_id) && !empty($hc_id)) { //update search
            $ishcItemExists = $this->home_model->searchContent($this->home_counter, array('hc_id' => $hc_id, 'hc_deleted' => 0)); //table, where
        }

        if ($ishcItemExists <> 0 && isset($hc_id) && !empty($hc_id)) {

            if (isset($hc_item['hc_image']) && !empty($hc_item['hc_image'])) {
                if (isset($ishcItemExists[0]['hc_image']) && !empty($ishcItemExists[0]['hc_image'])) {
                    if (file_exists($ishcItemExists[0]['hc_image'])) {
                        $res1 = unlink($ishcItemExists[0]['hc_image']);
                    }
                }
            }
        }

        if (empty($hc_id)) {
            $inserted = $this->home_model->insertData($this->home_counter, $hc_item);
        } else {

            if (isset($hc_item) && !empty($hc_item)) {
                $inserted = $this->home_model->updateData($this->home_counter, $hc_item, array('hc_id' => $hc_id, 'hc_deleted' => 0)); //table, where
            }
        }

        echo $inserted;
    }

    function update_hs() { // home slider - update function on form_submit 
        $inserted = 0;
        $date = new DateTime();
        $hs_item = '';
        $hs_bg_image = $actual_hs_bg_image = $ishsItemExists = '';
        $hs_sign_image = $actual_hs_sign_image = $ishsSignItemExists = '';
        $foldername = 'Home_Slider';

        if (!empty($_FILES['hs_bg_image']['name'])) {
            $actual_hs_bg_image = $_FILES['hs_bg_image']['name'];
            $info = new SplFileInfo($_FILES['hs_bg_image']['name']);
            $hs_bg_image = $date->getTimestamp() . 'hs_bg_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('hs_bg_image', $hs_bg_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $hs_bg_image = 'uploads/' . $upd_foldername . $hs_bg_image;
                } else {
                    $hs_bg_image = 'uploads/' . $hs_bg_image;
                }
            }
        }

        if (!empty($_FILES['hs_sign_image']['name'])) {
            $actual_hs_sign_image = $_FILES['hs_sign_image']['name'];
            $info = new SplFileInfo($_FILES['hs_sign_image']['name']);
            $hs_sign_image = $date->getTimestamp() . 'hs_sign_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('hs_sign_image', $hs_sign_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $hs_sign_image = 'uploads/' . $upd_foldername . $hs_sign_image;
                } else {
                    $hs_sign_image = 'uploads/' . $hs_sign_image;
                }
            }
        }

        $hs_item = array(
            'hs_header1' => $this->input->post('txtHomeSliderMainHeading'),
            'hs_subheader1' => $this->input->post('txtHomeSliderSubHead1'),
            'hs_subheader2' => $this->input->post('txtHomeSliderSubHead2'),
            'hs_buttontext1' => $this->input->post('txtHomeSliderBtnText'),
            'hs_buttonlink1' => $this->input->post('txtHomeSliderBtnLink')
        );

        if (isset($hs_bg_image) && !empty($hs_bg_image)) {
            $hs_item['hs_bgimage'] = cleanurl($hs_bg_image);
        }

        if (isset($hs_sign_image) && !empty($hs_sign_image)) {
            $hs_item['hs_signature'] = cleanurl($hs_sign_image);
        }

        $hs_id = $this->input->post('hs_id');

        if (isset($hs_id) && !empty($hs_id)) { //update search
            $ishsItemExists = $this->home_model->searchContent($this->home_slider, array('hs_id' => $hs_id, 'hs_deleted' => 0)); //table, where
        } else { //insert search
            $ishsItemExists = $this->home_model->searchContent($this->home_slider, array('hs_status' => 1, 'hs_deleted' => 0)); //insert - table, where
        }

        if ($ishsItemExists <> 0 && isset($hs_id) && !empty($hs_id)) {

            if (isset($hs_item['hs_bgimage']) && !empty($hs_item['hs_bgimage'])) {
                if (isset($ishsItemExists[0]['hs_bgimage']) && !empty($ishsItemExists[0]['hs_bgimage'])) {
                    if (file_exists($ishsItemExists[0]['hs_bgimage'])) {
                        $res1 = unlink($ishsItemExists[0]['hs_bgimage']);
                    }
                }

                if (isset($ishsItemExists[0]['hs_signature']) && !empty($ishsItemExists[0]['hs_signature'])) {
                    if (file_exists($ishsItemExists[0]['hs_signature'])) {
                        $res2 = unlink($ishsItemExists[0]['hs_signature']);
                    }
                }
            }
        }

        if (empty($hs_id)) {
            $inserted = $this->home_model->insertData($this->home_slider, $hs_item);
        } else {

            if (isset($hs_item) && !empty($hs_item)) {
                $inserted = $this->home_model->updateData($this->home_slider, $hs_item, array('hs_id' => $hs_id, 'hs_deleted' => 0)); //table, where
            }
        }

        echo $inserted;
    }

    function update_hsb() { // home slider box - update function on form_submit 
        $inserted = 0;
        $date = new DateTime();
        $hsb_item = '';
        $hsb_button_image = $actual_hsb_button_image = $ishsbItemExists = '';
        $hsb_sign_image = $actual_hsb_sign_image = $ishsbSignItemExists = '';
        $foldername = 'Home_Slider';

        if (!empty($_FILES['hsb_buttonimage']['name'])) {
            $actual_hsb_button_image = $_FILES['hsb_buttonimage']['name'];
            $info = new SplFileInfo($_FILES['hsb_buttonimage']['name']);
            $hsb_button_image = $date->getTimestamp() . 'hsb_buttonimage.' . $info->getExtension();

            if ($this->fileupload->uploadfile('hsb_buttonimage', $hsb_button_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $hsb_button_image = 'uploads/' . $upd_foldername . $hsb_button_image;
                } else {
                    $hsb_button_image = 'uploads/' . $hsb_button_image;
                }
            }
        }


        $hsb_item = array(
            'hsb_percentage' => $this->input->post('hsb_percentage'),
            'hsb_text' => $this->input->post('hsb_text'),
            'hsb_buttonlink' => $this->input->post('hsb_buttonlink'),
        );

        if (isset($hsb_button_image) && !empty($hsb_button_image)) {
            $hsb_item['hsb_buttonimage'] = cleanurl($hsb_button_image);
        }

        $isAboutMeExists = $this->home_model->searchContent($this->home_slider_box, array('hsb_status' => 1));
        if ($isAboutMeExists == 0) {
            $inserted = $this->home_model->insertData($this->home_slider_box, $hsb_item);
        } else {
            $inserted = $this->home_model->updateData($this->home_slider_box, $hsb_item, array('hsb_status' => 1));
        }

        echo $inserted;
    }

    function getTMSDetails() { // testimonial slider details - ajax
        $select = 'tms_id, tms_name, tms_content, tms_image, tms_image_sign';
        $from = $this->testimonialSlider;
        $tms_id = $this->input->post('tms_id');

        $tms_itemDetails = $this->home_model->getData($select, $from, array('tms_id' => $tms_id));

        echo json_encode($tms_itemDetails);
    }

    function getHTDetails() { // home testimonial details
        $select = 'ht_id, ht_value, ht_text, ht_image';
        $from = $this->homeTestimonials;
        $ht_id = $this->input->post('ht_id');

        $ht_itemDetails = $this->home_model->getData($select, $from, array('ht_id' => $ht_id));

        echo json_encode($ht_itemDetails);
    }

    function getHSDetails() { // Home slider Details
        $select = 'hs_id, hs_header1, hs_subheader1, hs_subheader2,hs_buttontext1,hs_buttonlink1, hs_bgimage, hs_signature';
        $from = $this->home_slider;
        $hs_id = $this->input->post('hs_id');
        $hs_itemDetails = $this->home_model->getData($select, $from, array('hs_id' => $hs_id));
        echo json_encode($hs_itemDetails);
    }

    function getHCDetails() { // Home counter Details
        $select = 'hc_id, hc_name, hc_count, hc_image,hc_image_class,hc_status';
        $from = $this->home_counter;
        $hc_id = $this->input->post('hc_id');
        $hc_itemDetails = $this->home_model->getData($select, $from, array('hc_id' => $hc_id));
        echo json_encode($hc_itemDetails);
    }

    function deleteHsDetail() { // delete function for home slider - modal
        $deleted = 0;
        $id = $this->input->post('hs_id');
        if (isset($id) && !empty($id)) {
            $from = $this->home_slider;
            $where = array('hs_id' => $id);
            $update_value = array('hs_deleted' => 1);
            $deleted = $this->home_model->deleteData($from, $where, $update_value);
        }

        echo $deleted;
    }

    function deleteHcDetail() { // delete function for home counter - modal
        $deleted = 0;
        $id = $this->input->post('hc_id');
        if (isset($id) && !empty($id)) {
            $from = $this->home_counter;
            $where = array('hc_id' => $id);
            $update_value = array('hc_deleted' => 1);
            $deleted = $this->home_model->deleteData($from, $where, $update_value);
        }

        echo $deleted;
    }

    function deleteTMSDetail() { // delete function for testimonial slider details - modal
        $deleted = 0;
        $id = $this->input->post('tms_id');
        if (isset($id) && !empty($id)) {
            $from = $this->testimonialSlider;
            $where = array('tms_id' => $id);
            $update_value = array('tms_deleted' => 1);
            $deleted = $this->home_model->deleteData($from, $where, $update_value);
        }

        echo $deleted;
    }

    function deleteHTDetail() { // delete function for home testimonial - modal
        $deleted = 0;
        $id = $this->input->post('ht_id');
        if (isset($id) && !empty($id)) {
            $from = $this->homeTestimonials;
            $where = array('ht_id' => $id);
            $update_value = array('ht_deleted' => 1);
            $deleted = $this->home_model->deleteData($from, $where, $update_value);
        }

        echo $deleted;
    }
    
    

    function update_consultation() { //on trigger of abtCounsultation_submit()
        $inserted = 0;

        $ConsultationItems = array(
            'abt_consult_main_title' => $this->input->post('abt_consult_main_title'),
            'abt_consult_sub_title' => $this->input->post('abt_consult_sub_title'),
            'abt_consult_form_header' => $this->input->post('abt_consult_form_header'),
            'abt_consult_button_text' => $this->input->post('abt_consult_button_text')
        );

        $isConsultationItemExists = $this->home_model->searchContent($this->about_consultation_table, array('abt_consult_status' => 1, 'abt_consult_deleted' => 0)); //table, where

        if ($isConsultationItemExists == 0) {
            $inserted = $this->home_model->insertData($this->about_consultation_table, $ConsultationItems);
        } else {
            $inserted = $this->home_model->updateData($this->about_consultation_table, $ConsultationItems, array('abt_consult_status' => 1, 'abt_consult_deleted' => 0));
        }

        echo $inserted;
    }

    function print_me($message, $content) {
        echo '<pre>' . $message;
        print_r($content);
        echo '</pre>';
    }

    function print_die($message, $content) {
        echo '<pre>' . $message;
        print_r($content);
        echo '</pre>';
        die;
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */    