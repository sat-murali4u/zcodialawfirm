<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About extends CI_Controller {

    public $aboutus_table = 'aboutus';
    public $aboutus_items = 'aboutus_items';
    public $timeline_table = 'aboutus_timeline';
    public $timelineitems_table = 'aboutus_timeline_items';
    public $aboutAttorney_table = 'attorney';
    public $attorney_items = 'attorney_items';
    public $attorney_social_table = 'attorney_social';
    public $social_table = 'social';
    public $attorney_skills_table = 'attorney_skills';
    public $attorney_skillsType_table = 'attorney_skills_type';
    public $attorney_experience_table = 'attorney_experience';
    public $attorney_experience_types_table = 'attorney_experience_type';
    public $wcu_table = 'wcu';
    public $wcuTypes_table = 'wcu_type';
    public $attorney_breadcrumb_table = 'attorney_breadcrumb';
    public $attorney_skill_category_table = 'attorney_skill_category';

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->model('aboutus_model');
        $this->load->library("FileUpload");
        $this->load->library('session');
        $this->load->helper('allowed_url');
        $this->load->helper('text');

        if ($this->tank_auth->is_logged_in()) {
            $this->data['user_id'] = $this->tank_auth->get_user_id();
            $this->data['username'] = $this->tank_auth->get_username();
        } else {
            if ($this->uri->segment(2) == 'login' || $this->uri->segment(2) == 'register') {
                
            } else {
                redirect('/auth/logout/');
            }
        }
    }

    function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();

            $this->load->view('header/header', $data);
            $this->load->view('about', $data);
            $this->load->view('footer', $data);
        }
    }

    function myself() { //about myself
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['about_me'] = $this->aboutus_model->getData('*', $this->aboutus_table, array('au_status' => 1), 'au_id');

            $this->load->view('header/header', $data);
            $this->load->view('about_myself', $data);
            $this->load->view('footer');
        }
    }

    function why_us() { //about myself
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['why_us'] = $this->aboutus_model->getData('*', $this->wcu_table, array('wcu_status' => 1), 'wcu_id');

            $this->load->view('header/header', $data);
            $this->load->view('why_choose_us', $data);
            $this->load->view('footer');
        }
    }

    function items() { //about items
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['about_us'] = $this->aboutus_model->getData('*', $this->aboutus_table, '', 'au_id');
            // echo '<pre>aboutus_items:';print_r($data);die;

            $this->load->view('header/header', $data);
            $this->load->view('about_items', $data);
            $this->load->view('footer');
        }
    }

    function attorney_details() { // About Attorney Details
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();

            $this->load->view('header/header', $data);
            $this->load->view('attorney_details', $data);
            $this->load->view('footer');
        }
    }

    function attorney_social() { // About Attorney Social Details
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['attorney_details'] = $this->aboutus_model->getData('*', $this->attorney_items, array('attyItem_status' => 1, 'attyItem_deleted' => 0), 'attyItem_id');
            $data['social_details'] = $this->aboutus_model->getData('*', $this->social_table, array('social_status' => 1, 'social_deleted' => 0), 'social_name', 'asc');

            $this->load->view('header/header', $data);
            $this->load->view('attorney_social', $data);
            $this->load->view('footer');
        }
    }

    function attorney() { // about attorney
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['about_attorney'] = $this->aboutus_model->getData('*', $this->aboutAttorney_table, array('atty_status' => 1, 'atty_deleted' => 0), 'atty_id');

            $this->load->view('header/header', $data);
            $this->load->view('about_attorney', $data);
            $this->load->view('footer');
        }
    }

    function attorney_breadcrumb() { // about attorney
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['attorney_breadcrumb'] = $this->aboutus_model->getData('*', $this->attorney_breadcrumb_table, array('atty_bc_status' => 1, 'atty_bc_deleted' => 0), 'atty_bc_id');

            $this->load->view('header/header', $data);
            $this->load->view('attorney_breadcrumb', $data);
            $this->load->view('footer');
        }
    }

    function attorney_skills() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['attorney_skills'] = $this->aboutus_model->getData('*', $this->attorney_skills_table, array('atty_skill_status' => 1, 'atty_skill_deleted' => 0), 'atty_skill_id');
            $this->load->view('header/header', $data);
            $this->load->view('attorney_skills', $data);
            $this->load->view('footer');
        }
    }

    function attorney_skill_category() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            // $data['attorney_skills'] = $this->aboutus_model->getData('*', $this->attorney_skills_table, array('atty_skill_status' => 1, 'atty_skill_deleted' => 0), 'atty_skill_id');
            $this->load->view('header/header', $data);
            $this->load->view('attorney_skill_category', $data);
            $this->load->view('footer');
        }
    }

    function our_experience() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['attorney_experience'] = $this->aboutus_model->getData('*', $this->attorney_experience_table, array('atty_exp_status' => 1, 'atty_exp_deleted' => 0), 'atty_exp_id');
            $this->load->view('header/header', $data);
            $this->load->view('our_experience', $data);
            $this->load->view('footer');
        }
    }

    function timeline() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['about_timeline'] = $this->aboutus_model->getData('*', $this->timeline_table, '', 'aut_id');


            $this->load->view('header/header', $data);
            $this->load->view('about_timeline', $data);
            $this->load->view('footer');
        }
    }

    function update_about_attorney() { //update about attorney form_subit() ajax
        $inserted = 0;
        $date = new DateTime();
        $abtAttyItem_image = $actual_abtAttyItem_image = $isAboutAttyItemExists = '';
        $abtAttyBGItem_image = $actual_abtAttyBGItem_image = $isAboutAttyBGItemExists = '';
        $foldername = 'Attorney';

        if (!empty($_FILES['atty_title_image']['name'])) {
            $info = new SplFileInfo($_FILES['atty_title_image']['name']);
            $abtAttyItem_image = $date->getTimestamp() . 'atty_title_image.' . $info->getExtension();
            if ($this->fileupload->uploadfile('atty_title_image', $abtAttyItem_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $abtAttyItem_image = 'uploads/' . $upd_foldername . $abtAttyItem_image;
                } else {
                    $abtAttyItem_image = 'uploads/' . $abtAttyItem_image;
                }
            }
        }

        if (!empty($_FILES['atty_bg_image']['name'])) {
            $info = new SplFileInfo($_FILES['atty_bg_image']['name']);
            $abtAttyBGItem_image = $date->getTimestamp() . 'atty_bg_image.' . $info->getExtension();
            if ($this->fileupload->uploadfile('atty_bg_image', $abtAttyBGItem_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $abtAttyBGItem_image = 'uploads/' . $upd_foldername . $abtAttyBGItem_image;
                } else {
                    $abtAttyBGItem_image = 'uploads/' . $abtAttyBGItem_image;
                }
            }
        }

        $aboutAttyItem = array(
            'atty_title_head' => $this->input->post('atty_title_head'),
            'atty_content' => $this->input->post('atty_content')
        );

        if (isset($abtAttyItem_image) && !empty($abtAttyItem_image)) {
            $aboutAttyItem['atty_title_image'] = cleanurl($abtAttyItem_image);
        }

        if (isset($abtAttyBGItem_image) && !empty($abtAttyBGItem_image)) {
            $aboutAttyItem['atty_bg_image'] = cleanurl($abtAttyBGItem_image);
        }

        $isAboutAttyItemExists = $this->aboutus_model->searchContent($this->aboutAttorney_table, array('atty_status' => 1, 'atty_deleted' => 0)); //table, where


        if (empty($isAboutAttyItemExists)) {
            $inserted = $this->aboutus_model->insertData($this->aboutAttorney_table, $aboutAttyItem);
        } else {

            if (isset($isAboutAttyItemExists) && !empty($isAboutAttyItemExists)) { //update
                $inserted = $this->aboutus_model->updateData($this->aboutAttorney_table, $aboutAttyItem, array('atty_status' => 1, 'atty_deleted' => 0)); //table, where
            }
        }

        echo $inserted;
    }

    function update_about_item() { // About Us - form_submit - ajax request
        $inserted = 0;
        $date = new DateTime();
        $abtItem_image = $actual_abtItem_image = $abtSideItem_image = $actual_abtSideItem_image = $isAboutUsExists = $isAboutItemExists = '';
        $foldername = 'About_Items';

        if (!empty($_FILES['auti_image']['name'])) {
            $info = new SplFileInfo($_FILES['auti_image']['name']);
            $abtItem_image = $date->getTimestamp() . 'abtItem_image.' . $info->getExtension();
            if ($this->fileupload->uploadfile('auti_image', $abtItem_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $abtItem_image = 'uploads/' . $upd_foldername . $abtItem_image;
                } else {
                    $abtItem_image = 'uploads/' . $abtItem_image;
                }
            }
        }

        if (!empty($_FILES['au_side_image']['name'])) {
            $info = new SplFileInfo($_FILES['au_side_image']['name']);
            $abtSideItem_image = $date->getTimestamp() . 'au_side_image.' . $info->getExtension();
            if ($this->fileupload->uploadfile('au_side_image', $abtSideItem_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $abtSideItem_image = 'uploads/' . $upd_foldername . $abtSideItem_image;
                } else {
                    $abtSideItem_image = 'uploads/' . $abtSideItem_image;
                }
            }
        }

        $aboutUs = array('au_header_title' => $this->input->post('au_header_title'),
            'au_content' => $this->input->post('au_content')
        );
        if (isset($abtSideItem_image) && !empty($abtSideItem_image)) {
            $aboutUs['au_side_image'] = cleanurl($abtSideItem_image);
        }

        $aboutItem = array('auti_name' => $this->input->post('auti_name'),
            'auti_content' => $this->input->post('auti_content')
        );
        
        $IsEmpty_aboutItem = array_filter($aboutItem);

        if (isset($abtItem_image) && !empty($abtItem_image)) {
            $aboutItem['auti_image'] = cleanurl($abtItem_image);
        }

        $auti_id = $this->input->post('auti_id');

        $isAboutUsExists = $this->aboutus_model->searchContent($this->aboutus_table, array('au_status' => 1, 'au_deleted' => 0));


        if (isset($auti_id) && !empty($auti_id)) { //update search
            $isAboutItemExists = $this->aboutus_model->searchContent($this->aboutus_items, array('auti_id' => $auti_id, 'auti_deleted' => 0)); //table, where
        }

        if ($isAboutItemExists <> 0 && isset($auti_id) && !empty($auti_id)) {

            if (isset($aboutItem['auti_image']) && !empty($aboutItem['auti_image'])) {

                if (isset($isAboutItemExists[0]['auti_image']) && !empty($isAboutItemExists[0]['auti_image'])) {

                    if (file_exists($isAboutItemExists[0]['auti_image'])) {
                        $res = unlink($isAboutItemExists[0]['auti_image']);
                    }
                }
            }
        }

        if ($isAboutUsExists == 0) {
            $inserted = $this->aboutus_model->insertData($this->aboutus_table, $aboutUs);
        } else if ($isAboutUsExists <> 0) {
            $inserted = $this->aboutus_model->updateData($this->aboutus_table, $aboutUs, array('au_deleted' => 0, 'au_status' => 1));
        }

        if (empty($auti_id) && isset($IsEmpty_aboutItem) && !empty($IsEmpty_aboutItem)) {
            $inserted = $this->aboutus_model->insertData($this->aboutus_items, $aboutItem);
        } else {

            if (isset($auti_id) && !empty($auti_id) && isset($IsEmpty_aboutItem) && !empty($IsEmpty_aboutItem)) { //update
                $inserted = $this->aboutus_model->updateData($this->aboutus_items, $aboutItem, array('auti_id' => $auti_id, 'auti_deleted' => 0)); //table, where
            }
        }

        echo $inserted;
    }

    function get_attyDetails() { // getting attorney list for datatable on load
        $data1 = $this->data;
        $this->data1 = array();

        $data = array();

        $atty_options = array();
        $select = 'attyItem_id, attyItem_name, attyItem_designation, attyItem_image, attyItem_status';
        $from = $this->attorney_items;
        $where = array('attyItem_deleted' => 0);
        $orderby = "attyItem_id";

        $abtAttyDetails = $this->aboutus_model->getData($select, $from, $where, $orderby);

        if (!empty($abtAttyDetails)) {
            foreach ($abtAttyDetails as $key => $value) {
                $value['attyItem_name'] = $value['attyItem_name'];
                $value['attyItem_designation'] = $value['attyItem_designation'];
                $value['attyItem_image'] = '<img class="dt_image_atty ' . (!file_exists($value['attyItem_image']) ? 'no_image' : '') . '"  src="' . ((file_exists($value['attyItem_image'])) ? $value['attyItem_image'] : 'themes/backend/assets/dist/img/noimage.png') . '" />';
                $value['attyItem_status'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['attyItem_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_attyDetails_status($(this));" attyItem_id="' . $value['attyItem_id'] . '" attyItem_status="' . $value['attyItem_status'] . '"><span class="slider round"></span></label></a>';
                $value['action'] = '<a onclick="getAttyDetails($(this));" attyItem_id="' . $value['attyItem_id'] . '" class="edit_attyDetails btn"><i class="fa fa-pencil"></i></a>' . '<a class="btn open_popup_modal" attyItem_id=' . $value['attyItem_id'] . '  data-toggle="modal" data-target="#modal-delete_attyDetails" onclick="delAttyDetails($(this));"><i class="fa fa-trash-o"></i></a>';

                unset($value['attyItem_id']);
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

    function get_timelinelist() { // getting timeline list for datatable on load
        $data1 = $this->data;
        $this->data1 = array();

        $data = array();

        $aitems_options = array();
        $select = 'autli_id, autli_fromyear, autli_toyear, autli_head, autli_content,autli_image, autli_status';
        $from = $this->timelineitems_table;
        $where = array('autli_deleted' => 0);
        $orderby = "autli_id";

        $timelineitems_list = $this->aboutus_model->getData($select, $from, $where, $orderby);


        if (!empty($timelineitems_list)) {
            foreach ($timelineitems_list as $key => $value) {
                $value['autli_fromyear'] = $value['autli_fromyear'] . ' - ' . $value['autli_toyear'];
                $value['autli_head'] = character_limiter($value['autli_head'], 30);
                $value['autli_content'] = $value['autli_content'];
                $value['autli_image'] = '<img class="dt_image_tl ' . (!file_exists($value['autli_image']) ? 'no_image' : '') . '"  src="' . ((file_exists($value['autli_image'])) ? $value['autli_image'] : 'themes/backend/assets/dist/img/noimage.png') . '" />';
                $value['autli_status'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['autli_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_timeline_status($(this));" autli_id="' . $value['autli_id'] . '" autli_status="' . $value['autli_status'] . '"><span class="slider round"></span></label></a>';
                $value['action'] = '<a onclick="getTimelineItemDetails($(this));" autli_id="' . $value['autli_id'] . '" class="edit_timelineitems btn"><i class="fa fa-pencil"></i></a>' . '<a class="btn open_popup_modal" autli_id=' . $value['autli_id'] . '  data-toggle="modal" data-target="#modal-delete_timelineitems" onclick="delTimelineItemDetails($(this));"><i class="fa fa-trash-o"></i></a>';

                unset($value['autli_id']);
                // unset($value['autli_fromyear']);
                unset($value['autli_toyear']);
                //  unset($value['autli_head']);
                //  unset($value['autli_content']);
                $data['data'][] = array_values($value);
            }
        }
        //echo '<pre>';print_r($data);die;
        if (empty($data)) {
            $data['data'] = [];
            echo json_encode($data);
        } else {
            echo json_encode($data);
        }
    }

    function get_aboutItems_details() { // getting aboutItems list for datatable on load
        $data1 = $this->data;
        $this->data1 = array();

        $data = array();

        $aitems_options = array();
        $select = 'auti_id, auti_name, auti_content, auti_image, auti_status';
        $from = $this->aboutus_items;
        $where = array('auti_deleted' => 0);
        $orderby = "auti_id";

        $aitems_list = $this->aboutus_model->getData($select, $from, $where, $orderby);

//$this->print_die('aiitems_list:',$aitems_list);

        if (!empty($aitems_list)) {
            foreach ($aitems_list as $key => $value) {
                $value['auti_name'] = character_limiter($value['auti_name'], 30);
                $value['auti_content'] = $value['auti_content'];
                $value['auti_image'] = '<img class="dt_image_ai ' . (!file_exists($value['auti_image']) ? 'no_image' : '') . '"  src="' . ((file_exists($value['auti_image'])) ? $value['auti_image'] : 'themes/backend/assets/dist/img/noimage.png') . '" />';
                $value['action'] = '<a onclick="getItemDetails($(this));" auti_id="' . $value['auti_id'] . '" class="edit_aboutitems btn"><i class="fa fa-pencil"></i></a>' . '<a onclick="delItemDetails($(this));" class="btn open_popup_modal" auti_id=' . $value['auti_id'] . '  data-toggle="modal" data-target="#modal-delete_abtitems"><i class="fa fa-trash-o"></i></a>';
                $value['auti_status'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['auti_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_ai_status($(this));" auti_id="' . $value['auti_id'] . '" auti_status="' . $value['auti_status'] . '"><span class="slider round"></span></label></a>';
                unset($value['auti_id']);
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

    function deleteAttyDetail() {         // delete functionality for Attorney detail - ajax
        $deleted = 0;
        $id = $this->input->post('attyitem_id');

        if (isset($id) && !empty($id)) {
            $from = $this->attorney_items;
            $where = array('attyItem_id' => $id);
            $update_value = array('attyItem_deleted' => 1);
            $deleted = $this->aboutus_model->deleteData($from, $where, $update_value);
        }

        echo $deleted;
    }

    function deleteTimelineDetail() { // delete functionality for Timeline detail - ajax
        $deleted = 0;
        $id = $this->input->post('autli_id');

        if (isset($id) && !empty($id)) {
            $from = $this->timelineitems_table;
            $where = array('autli_id' => $id);
            $update_value = array('autli_deleted' => 1);
            $deleted = $this->aboutus_model->deleteData($from, $where, $update_value);
        }

        echo $deleted;
    }

    function deleteAbtItemDetail() { // modal delete function for  About Item
        $deleted = 0;
        $id = $this->input->post('auti_id');
        if (isset($id) && !empty($id)) {
            $from = $this->aboutus_items;
            $where = array('auti_id' => $id);
            $update_value = array('auti_deleted' => 1);
            $deleted = $this->aboutus_model->deleteData($from, $where, $update_value);
        }

        echo $deleted;
    }

    function update_attyDetails_status() {   // status update functionality for about timeline  
        $attyItem_id = $this->input->post('attyItem_id');
        $attyItem_status = array('attyItem_status' => $this->input->post('attyItem_status'));
        $updated = $this->aboutus_model->updateData($this->attorney_items, $attyItem_status, array('attyItem_id' => $attyItem_id));

        echo $updated;
    }

    function update_timeline_status() { // status update functionality for about timeline  
        $autli_id = $this->input->post('autli_id');
        $autli_status = array('autli_status' => $this->input->post('autli_status'));
        $updated = $this->aboutus_model->updateData($this->timelineitems_table, $autli_status, array('autli_id' => $autli_id));

        echo $updated;
    }

    function update_attorneySocialDetails() { // update functionality for attorney social details - form_submit()
        $inserted = 0;
        $date = new DateTime();
        $foldername = 'Attorney';
        $isAttySocialDetailsExists = '';

        $a_id = $this->input->post('a_id'); //attorney_edit_id
        $s_id = $this->input->post('s_id'); //social_edit_id

        $aboutAttorneySocial = array(
            'attyItem_id' => $this->input->post('attyItem_id'),
            'attySocialLink' => $this->input->post('attySocialLink'),
            'social_id' => $this->input->post('social_id')
        );

        if (isset($a_id) && !empty($a_id) && isset($s_id) && !empty($s_id)) { //update search
            $isAttySocialDetailsExists = $this->aboutus_model->searchContent($this->attorney_social_table, array('attyItem_id' => $a_id, 'social_id' => $s_id, 'attySocial_status' => 1, 'attySocial_deleted' => 0)); //table, where
        } else {
            $isAttySocialDetailsExists = $this->aboutus_model->searchContent($this->attorney_social_table, array('attyItem_id' => $this->input->post('attyItem_id'), 'social_id' => $this->input->post('social_id'), 'attySocial_status' => 1, 'attySocial_deleted' => 0)); //table, where            
        }



        if ($isAttySocialDetailsExists == 0 && isset($aboutAttorneySocial) && !empty($aboutAttorneySocial)) {
            $inserted = $this->aboutus_model->insertData($this->attorney_social_table, $aboutAttorneySocial);
        } else {

            if (isset($aboutAttorneySocial) && !empty($aboutAttorneySocial)) {
                $inserted = $this->aboutus_model->updateData($this->attorney_social_table, $aboutAttorneySocial, array('attyItem_id' => $this->input->post('attyItem_id'), 'social_id' => $this->input->post('social_id'), 'attySocial_status' => 1, 'attySocial_deleted' => 0)); //table, where
            }
        }

        echo $inserted;
    }

    function update_attorneyDetails() { // update functionality for about attorney details - form_submit()
        $inserted = 0;
        $date = new DateTime();
        $foldername = 'Attorney';
        $actual_abtAtty_image = $actual_abtAtty_image = $abtAtty_image = $atty_image = $isAttyDetailsExists = '';

        if (!empty($_FILES['attyItem_image']['name'])) {
            $info = new SplFileInfo($_FILES['attyItem_image']['name']);
            $atty_image = $date->getTimestamp() . 'attyItem_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('attyItem_image', $atty_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $abtAtty_image = 'uploads/' . $upd_foldername . $atty_image;
                } else {
                    $abtAtty_image = 'uploads/' . $atty_image;
                }
            }
        }


        $aboutAttorney = array(
            'attyItem_name' => $this->input->post('attyItem_name'),
            'attyItem_designation' => $this->input->post('attyItem_designation'));

        if (isset($abtAtty_image) && !empty($abtAtty_image)) {
            $aboutAttorney['attyItem_image'] = cleanurl($abtAtty_image);
        }

        $attyItem_id = $this->input->post('attyItem_id');

        if (isset($attyItem_id) && !empty($attyItem_id)) { //update search
            $isAttyDetailsExists = $this->aboutus_model->searchContent($this->attorney_items, array('attyItem_id' => $attyItem_id, 'attyItem_deleted' => 0)); //table, where
        }

        if ($isAttyDetailsExists <> 0 && isset($attyItem_id) && !empty($attyItem_id)) {

            if (isset($aboutAttorney['attyItem_image']) && !empty($aboutAttorney['attyItem_image'])) {
                if (isset($isAttyDetailsExists[0]['attyItem_image']) && !empty($isAttyDetailsExists[0]['attyItem_image'])) {
                    if (file_exists($isAttyDetailsExists[0]['attyItem_image'])) {
                        $res1 = unlink($isAttyDetailsExists[0]['attyItem_image']);
                    }
                }
            }
        }

        if (empty($attyItem_id)) {
            $inserted = $this->aboutus_model->insertData($this->attorney_items, $aboutAttorney);
        } else {

            if (isset($aboutAttorney) && !empty($aboutAttorney)) {
                $inserted = $this->aboutus_model->updateData($this->attorney_items, $aboutAttorney, array('attyItem_id' => $attyItem_id, 'attyItem_deleted' => 0)); //table, where
            }
        }

        echo $inserted;
    }

    function update_about_myself() { // update functionality for about myself - form_submit()
        $inserted = 0;
        $date = new DateTime();
        $foldername = 'About_Slider';
        $actual_abtSlider_image = $actual_abtContent_image = $abtContent_image = $abtSlider_image = '';

        if (!empty($_FILES['abtSlider_image']['name'])) {
            $info = new SplFileInfo($_FILES['abtSlider_image']['name']);
            $slider_image = $date->getTimestamp() . 'abtMyself_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('abtSlider_image', $slider_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $abtSlider_image = 'uploads/' . $upd_foldername . $slider_image;
                } else {
                    $abtSlider_image = 'uploads/' . $slider_image;
                }
            }
        }

        if (!empty($_FILES['abtContent_image']['name'])) {
            $info = new SplFileInfo($_FILES['abtContent_image']['name']);
            $content_image = $date->getTimestamp() . 'abtMyself_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('abtContent_image', $content_image, $foldername)) { //$file, $filename,$folder_name
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $abtContent_image = 'uploads/' . $upd_foldername . $content_image;
                } else {
                    $abtContent_image = 'uploads/' . $content_image;
                }
            }
        }

        $aboutMyself = array('au_header_title' => $this->input->post('txtAbtMainHeader'),
            'au_header_subtitle' => $this->input->post('txtAbtMainSubHeader'),
            'au_content_main_title' => $this->input->post('txtAbtHeaderText'),
            'au_content_sub_title' => $this->input->post('txtAbtSubHeaderText'),
            'au_content' => $this->input->post('txtContentAboutMe')
        );

        if (isset($abtSlider_image) && !empty($abtSlider_image)) {
            $aboutMyself['au_slider_image'] = cleanurl($abtSlider_image);
        }if (isset($abtContent_image) && !empty($abtContent_image)) {
            $aboutMyself['au_content_image'] = cleanurl($abtContent_image);
        }


        $isAboutMeExists = $this->aboutus_model->searchContent($this->aboutus_table, array('au_status' => 1));
        if ($isAboutMeExists == 0) {
            $inserted = $this->aboutus_model->insertData($this->aboutus_table, $aboutMyself);
        } else {
            $inserted = $this->aboutus_model->updateData($this->aboutus_table, $aboutMyself, array('au_status' => 1));
        }

        echo $inserted;
    }

    function update_ai_status() {

        $auti_id = $this->input->post('auti_id');
        $auti_status = array('auti_status' => $this->input->post('auti_status'));
        $updated = $this->aboutus_model->updateData($this->aboutus_items, $auti_status, array('auti_id' => $auti_id));

        echo $updated;
    }

    function getAttorneyDetails() {// getting  Attorney details for editing
        $select = 'attyItem_id, attyItem_name, attyItem_designation, attyItem_image';
        $from = $this->attorney_items;
        $attyItem_id = $this->input->post('attyItem_id');
        $au_itemDetails = $this->aboutus_model->getData($select, $from, array('attyItem_id' => $attyItem_id));

        echo json_encode($au_itemDetails);
    }

    function getAttorneySocialDetails() {// getting  Attorney's Social details for editing
        $select = 'attySocial_id, attyItem_id, attySocialLink, social_id';
        $from = $this->attorney_social_table;
        $where = array('attyItem_id' => $this->input->post('attyItem_id'), 'social_id' => $this->input->post('social_id'));
        $au_itemDetails = $this->aboutus_model->getData($select, $from, $where);
        if (isset($au_itemDetails) && !empty($au_itemDetails)) {
            echo json_encode($au_itemDetails);
        } else {
            echo 0;
        }
    }

    function getItemDetails() { // getting details of About items for editing
        $select = 'auti_id, auti_name, auti_content, auti_image';
        $from = $this->aboutus_items;
        $auti_id = $this->input->post('auti_id');
        $au_itemDetails = $this->aboutus_model->getData($select, $from, array('auti_id' => $auti_id));

        echo json_encode($au_itemDetails);
    }

    function getTimelineItemDetails() { // getting details of Timeline items for editing
        $select = 'autli_id, autli_fromyear, autli_toyear, autli_head, autli_content, autli_image';
        $from = $this->timelineitems_table;
        $autli_id = $this->input->post('autli_id');

        $au_timelineitemDetails = $this->aboutus_model->getData($select, $from, array('autli_id' => $autli_id));

        echo json_encode($au_timelineitemDetails);
    }

    function update_timeline() { // update functionality for timeline on form_submit
        $inserted = 0;
        $date = new DateTime();
        $foldername = 'Timeline';
        $abtTLItem_item = $autli_image = '';
        $actual_abtTLItem_bg_image = $actual_autli_image_class = $isabtTLItemItemExists = $isTLItemsExists = '';

        if (!empty($_FILES['autli_image']['name'])) {
            $actual_abtTLItem_bg_image = $_FILES['autli_image']['name'];
            $info = new SplFileInfo($_FILES['autli_image']['name']);
            $autli_image = $date->getTimestamp() . 'autli_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('autli_image', $autli_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $autli_image = 'uploads/' . $upd_foldername . $autli_image;
                } else {
                    $autli_image = 'uploads/' . $autli_image;
                }
            }
        }

        $aboutTimeline = array(
            'aut_main_title' => $this->input->post('AbtTLMainHeader'),
            'aut_sub_title' => $this->input->post('AbtTLMainSubHeader')
        );
        $aboutTimelineItems = array(
            'autli_fromyear' => $this->input->post('AbtTLFromYear'),
            'autli_toyear' => $this->input->post('AbtTLToYear'),
            'autli_head' => $this->input->post('AbtTLHeader'),
            'autli_content' => $this->input->post('AbtTLSubHeader')
        );

        if (isset($autli_image) && !empty($autli_image)) {
            $aboutTimelineItems['autli_image'] = cleanurl($autli_image);
        }

        $IsEmpty_aboutTimelineItems = array_filter($aboutTimelineItems);

        $autli_id = $this->input->post('autli_id');

        $isTLExists = $this->aboutus_model->searchContent($this->timeline_table);

        if (isset($autli_id) && !empty($autli_id)) { //update search
            $isTLItemsExists = $this->aboutus_model->searchContent($this->timelineitems_table, array('autli_id' => $autli_id, 'autli_deleted' => 0)); //table, where
        }

        if ($isTLItemsExists <> 0 && isset($autli_id) && !empty($autli_id)) {

            if (isset($aboutTimelineItems['autli_image']) && !empty($aboutTimelineItems['autli_image'])) {
                if (isset($isTLItemsExists[0]['autli_image']) && !empty($isTLItemsExists[0]['autli_image'])) {
                    if (file_exists($isTLItemsExists[0]['autli_image'])) {
                        $res1 = unlink($isTLItemsExists[0]['autli_image']);
                    }
                }
            }
        }

        if ($isTLExists == 0) {
            $inserted = $this->aboutus_model->insertData($this->timeline_table, $aboutTimeline);
        } else if ($isTLExists <> 0) {
            $inserted = $this->aboutus_model->updateData($this->timeline_table, $aboutTimeline, array('aut_id' => 1));
        }

        if (empty($autli_id) && isset($IsEmpty_aboutTimelineItems) && !empty($IsEmpty_aboutTimelineItems)) {
            $inserted = $this->aboutus_model->insertData($this->timelineitems_table, $aboutTimelineItems);
        } else {

            if (isset($autli_id) && !empty($autli_id) && isset($IsEmpty_aboutTimelineItems) && !empty($IsEmpty_aboutTimelineItems)) { //update
                $inserted = $this->aboutus_model->updateData($this->timelineitems_table, $aboutTimelineItems, array('autli_id' => $autli_id, 'autli_deleted' => 0)); //table, where
            }
        }
        echo $inserted;
    }

    //attorney skills start 
    function update_attorney_skills() { //update about attorney_skills form_subit() ajax
        $inserted = 0;
        $date = new DateTime();
        $abtAttySkill_image = $actual_abtAttySkill_image = $isAboutAttySkillExists = '';
        $abtAttySkillType_image = $actual_abtAttySkillType_image = $isAboutAttySkillTypeExists = '';
        $foldername = 'Attorney_Skills';

        if (!empty($_FILES['atty_skill_bg_image']['name'])) {
            $info = new SplFileInfo($_FILES['atty_skill_bg_image']['name']);
            $abtAttySkill_image = $date->getTimestamp() . 'atty_skill_bg_image.' . $info->getExtension();
            if ($this->fileupload->uploadfile('atty_skill_bg_image', $abtAttySkill_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $abtAttySkill_image = 'uploads/' . $upd_foldername . $abtAttySkill_image;
                } else {
                    $abtAttySkill_image = 'uploads/' . $abtAttySkill_image;
                }
            }
        }

        if (!empty($_FILES['atty_st_image']['name'])) {
            $info = new SplFileInfo($_FILES['atty_st_image']['name']);
            $abtAttySkillType_image = $date->getTimestamp() . 'atty_st_image.' . $info->getExtension();
            if ($this->fileupload->uploadfile('atty_st_image', $abtAttySkillType_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $abtAttySkillType_image = 'uploads/' . $upd_foldername . $abtAttySkillType_image;
                } else {
                    $abtAttySkillType_image = 'uploads/' . $abtAttySkillType_image;
                }
            }
        }

        $atty_st_id = $this->input->post('atty_st_id');
        $aboutAttorneySkills = array(
            'atty_skill_name' => $this->input->post('atty_skill_name'),
            'atty_skill_desc' => $this->input->post('atty_skill_desc')
        );
        $aboutAttorneySkillsType = array(
            'atty_st_name' => $this->input->post('atty_st_name'),
            'atty_st_goal' => $this->input->post('atty_st_goal'),
            'atty_st_start_color' => $this->input->post('atty_st_start_color'),
            'atty_st_end_color' => $this->input->post('atty_st_end_color')
        );


        if (isset($abtAttySkill_image) && !empty($abtAttySkill_image)) {
            $aboutAttorneySkills['atty_skill_bg_image'] = cleanurl($abtAttySkill_image);
        }

        if (isset($abtAttySkillType_image) && !empty($abtAttySkillType_image)) {
            $aboutAttorneySkillsType['atty_st_image'] = cleanurl($abtAttySkillType_image);
        }

        $IsEmpty_aboutAttorneySkillsType = array_filter($aboutAttorneySkillsType);


        $isAttorneySkillsExists = $this->aboutus_model->searchContent($this->attorney_skills_table, array('atty_skill_status' => 1, 'atty_skill_deleted' => 0));

        if (isset($atty_st_id) && !empty($atty_st_id)) { //update search
            $isAboutAttySkillTypeExists = $this->aboutus_model->searchContent($this->attorney_skillsType_table, array('atty_st_id' => $atty_st_id, 'atty_st_deleted' => 0, 'atty_st_status' => 1)); //table, where
        }

        if ($isAboutAttySkillTypeExists <> 0 && isset($atty_st_id) && !empty($atty_st_id)) {


            if (isset($aboutAttorneySkillsType['atty_st_image']) && !empty($aboutAttorneySkillsType['atty_st_image'])) {
                if (isset($isAboutAttySkillTypeExists[0]['atty_st_image']) && !empty($isAboutAttySkillTypeExists[0]['atty_st_image'])) {
                    if (file_exists($isAboutAttySkillTypeExists[0]['atty_st_image'])) {
                        $res1 = unlink($isAboutAttySkillTypeExists[0]['atty_st_image']);
                    }
                }
            }
        }

        if ($isAttorneySkillsExists == 0) {
            $inserted = $this->aboutus_model->insertData($this->attorney_skills_table, $aboutAttorneySkills);
        } else if ($isAttorneySkillsExists <> 0) {
            $inserted = $this->aboutus_model->updateData($this->attorney_skills_table, $aboutAttorneySkills, array('atty_skill_status' => 1, 'atty_skill_deleted' => 0));
        }

        if (empty($atty_st_id) && isset($IsEmpty_aboutAttorneySkillsType) && !empty($IsEmpty_aboutAttorneySkillsType)) {
            $inserted = $this->aboutus_model->insertData($this->attorney_skillsType_table, $aboutAttorneySkillsType);
        } else {
            if (isset($atty_st_id) && !empty($atty_st_id)) { //update
                $inserted = $this->aboutus_model->updateData($this->attorney_skillsType_table, $aboutAttorneySkillsType, array('atty_st_id' => $atty_st_id, 'atty_st_status' => 1, 'atty_st_deleted' => 0)); //table, where
            }
        }
        echo $inserted;
    }

    function get_attorneySkillTypes() { // getting attorney Skill Types for datatable on load
        $data1 = $this->data;
        $this->data1 = array();

        $data = array();

        $atty_options = array();
        $select = 'atty_st_id, atty_st_name, atty_st_goal, atty_st_start_color, atty_st_end_color, atty_st_status';
        $from = $this->attorney_skillsType_table;
        $where = array('atty_st_deleted' => 0);
        $orderby = "atty_st_id";

        $abtAttyDetails = $this->aboutus_model->getData($select, $from, $where, $orderby);

        if (!empty($abtAttyDetails)) {
            foreach ($abtAttyDetails as $key => $value) {
                $value['atty_st_name'] = $value['atty_st_name'];
                $value['atty_st_goal'] = $value['atty_st_goal'];
                $value['atty_st_start_color'] = '<div class="color_image_st_outer"><div class="color_image_st" style="background-color:' . $value['atty_st_start_color'] . '" ></div></div>';
                $value['atty_st_end_color'] = '<div class="color_image_st_outer"><div class="color_image_st" style="background-color:' . $value['atty_st_end_color'] . '" ></div></div>';
                $value['atty_st_status'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['atty_st_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_attySkillType_status($(this));" atty_st_id="' . $value['atty_st_id'] . '" atty_st_status="' . $value['atty_st_status'] . '"><span class="slider round"></span></label></a>';
                $value['action'] = '<a onclick="getAttySkillTypes($(this));" atty_st_id="' . $value['atty_st_id'] . '" class="edit_attyDetails btn"><i class="fa fa-pencil"></i></a>' . '<a class="btn open_popup_modal" atty_st_id=' . $value['atty_st_id'] . '  data-toggle="modal" data-target="#modal-delete_attySkillTypes" onclick="delAttySkillTypes($(this));"><i class="fa fa-trash-o"></i></a>';

                unset($value['atty_st_id']);
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

    function update_attySkillTypes_status() {
        $atty_st_id = $this->input->post('atty_st_id');
        $atty_st_status = array('atty_st_status' => $this->input->post('atty_st_status'));
        $updated = $this->aboutus_model->updateData($this->attorney_skillsType_table, $atty_st_status, array('atty_st_id' => $atty_st_id));

        echo $updated;
    }

    function getAttorneySkillTypes() {// getting  Attorney Skill Types  for editing
        $select = 'atty_st_id, atty_st_name, atty_st_goal, atty_st_start_color,atty_st_end_color';
        $from = $this->attorney_skillsType_table;
        $atty_st_id = $this->input->post('atty_st_id');
        $attySTDetails = $this->aboutus_model->getData($select, $from, array('atty_st_id' => $atty_st_id));

        echo json_encode($attySTDetails);
    }

    //attorney skills end
    //experience part start 
    function update_attorney_experience() { //update about attorney experience form_subit() ajax
        $inserted = 0;
        $date = new DateTime();
        $abtAttyExperience_image = $actual_abtAttyExperience_image = $isAboutAttyExperienceExists = '';
        $abtAttyExperienceType_image = $actual_abtAttyExperienceType_image = $isAboutAttyExperienceTypeExists = '';
        $abtAttyExperienceSign_image = $actual_abtAttyExperienceSign_image = $isAboutAttyExperienceSignExists = '';
        $foldername = 'Attorney_Experience';

        if (!empty($_FILES['atty_exp_bg_image']['name'])) {
            $info = new SplFileInfo($_FILES['atty_exp_bg_image']['name']);
            $abtAttyExperience_image = $date->getTimestamp() . 'atty_exp_bg_image.' . $info->getExtension();
            if ($this->fileupload->uploadfile('atty_exp_bg_image', $abtAttyExperience_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $abtAttyExperience_image = 'uploads/' . $upd_foldername . $abtAttyExperience_image;
                } else {
                    $abtAttyExperience_image = 'uploads/' . $abtAttyExperience_image;
                }
            }
        }

        if (!empty($_FILES['atty_et_image']['name'])) {
            $info = new SplFileInfo($_FILES['atty_et_image']['name']);
            $abtAttyExperienceType_image = $date->getTimestamp() . 'atty_et_image.' . $info->getExtension();
            if ($this->fileupload->uploadfile('atty_et_image', $abtAttyExperienceType_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $abtAttyExperienceType_image = 'uploads/' . $upd_foldername . $abtAttyExperienceType_image;
                } else {
                    $abtAttyExperienceType_image = 'uploads/' . $abtAttyExperienceType_image;
                }
            }
        }

        if (!empty($_FILES['atty_exp_sign_image']['name'])) {
            $info = new SplFileInfo($_FILES['atty_exp_sign_image']['name']);
            $abtAttyExperienceSign_image = $date->getTimestamp() . 'atty_exp_sign_image.' . $info->getExtension();
            if ($this->fileupload->uploadfile('atty_exp_sign_image', $abtAttyExperienceSign_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $abtAttyExperienceSign_image = 'uploads/' . $upd_foldername . $abtAttyExperienceSign_image;
                } else {
                    $abtAttyExperienceSign_image = 'uploads/' . $abtAttyExperienceSign_image;
                }
            }
        }


        $atty_et_id = $this->input->post('atty_et_id');

        $aboutAttorneyExperiences = array(
            'atty_exp_name' => $this->input->post('atty_exp_name'),
            'atty_exp_desc' => $this->input->post('atty_exp_desc')
        );
        $aboutAttorneyExperiencesType = array(
            'atty_et_link' => $this->input->post('atty_et_link')
        );


        if (isset($abtAttyExperience_image) && !empty($abtAttyExperience_image)) {
            $aboutAttorneyExperiences['atty_exp_bg_image'] = cleanurl($abtAttyExperience_image);
        }

        if (isset($abtAttyExperienceType_image) && !empty($abtAttyExperienceType_image)) {
            $aboutAttorneyExperiencesType['atty_et_image'] = cleanurl($abtAttyExperienceType_image);
        }

        if (isset($abtAttyExperienceSign_image) && !empty($abtAttyExperienceSign_image)) {
            $aboutAttorneyExperiences['atty_exp_sign_image'] = cleanurl($abtAttyExperienceSign_image);
        }

        $IsEmpty_aboutAttorneyExperiencesType = array_filter($aboutAttorneyExperiencesType);


        $isAttorneyExperiencesExists = $this->aboutus_model->searchContent($this->attorney_experience_table, array('atty_exp_status' => 1, 'atty_exp_deleted' => 0));




        if ($isAttorneyExperiencesExists == 0) {
            $inserted = $this->aboutus_model->insertData($this->attorney_experience_table, $aboutAttorneyExperiences);
        } else if ($isAttorneyExperiencesExists <> 0) {
            $inserted = $this->aboutus_model->updateData($this->attorney_experience_table, $aboutAttorneyExperiences, array('atty_exp_status' => 1, 'atty_exp_deleted' => 0));
        }

        if (empty($atty_et_id) && isset($IsEmpty_aboutAttorneyExperiencesType) && !empty($IsEmpty_aboutAttorneyExperiencesType)) {
            $inserted = $this->aboutus_model->insertData($this->attorney_experience_types_table, $aboutAttorneyExperiencesType);
        } else {
            if (isset($atty_et_id) && !empty($atty_et_id)) { //update
                $inserted = $this->aboutus_model->updateData($this->attorney_experience_types_table, $aboutAttorneyExperiencesType, array('atty_et_id' => $atty_et_id, 'atty_et_status' => 1, 'atty_et_deleted' => 0)); //table, where
            }
        }
        echo $inserted;
    }

    function get_attyExperienceTypes() { // getting attorney Experience Types for datatable on load
        $data1 = $this->data;
        $this->data1 = array();

        $data = array();

        $atty_options = array();
        $select = 'atty_et_id, atty_et_image, atty_et_link, atty_et_status';
        $from = $this->attorney_experience_types_table;
        $where = array('atty_et_deleted' => 0);
        $orderby = "atty_et_id";

        $abtAttyExpDetails = $this->aboutus_model->getData($select, $from, $where, $orderby);

        if (!empty($abtAttyExpDetails)) {
            foreach ($abtAttyExpDetails as $key => $value) {
                $value['atty_et_image'] = '<img class="dt_image_et ' . (!file_exists($value['atty_et_image']) ? 'no_image' : '') . '"  src="' . ((file_exists($value['atty_et_image'])) ? $value['atty_et_image'] : 'themes/backend/assets/dist/img/noimage.png') . '" />';
                $value['atty_et_link'] = $value['atty_et_link'];
                $value['atty_et_status'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['atty_et_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_attyExperienceType_status($(this));" atty_et_id="' . $value['atty_et_id'] . '" atty_et_status="' . $value['atty_et_status'] . '"><span class="slider round"></span></label></a>';
                $value['action'] = '<a onclick="getAttyExperienceTypes($(this));" atty_et_id="' . $value['atty_et_id'] . '" class="edit_attyDetails btn"><i class="fa fa-pencil"></i></a>' . '<a class="btn open_popup_modal" atty_et_id=' . $value['atty_et_id'] . '  data-toggle="modal" data-target="#modal-delete_attyExperienceTypes" onclick="delAttyExperienceTypes($(this));"><i class="fa fa-trash-o"></i></a>';

                unset($value['atty_et_id']);
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

    function update_attyExperienceTypes_status() {
        $atty_et_id = $this->input->post('atty_et_id');
        $atty_et_status = array('atty_et_status' => $this->input->post('atty_et_status'));
        $updated = $this->aboutus_model->updateData($this->attorney_experience_types_table, $atty_et_status, array('atty_et_id' => $atty_et_id));

        echo $updated;
    }

    function getAttorneyExperienceTypes() {// getting  Attorney Experience Types  for editing
        $select = 'atty_et_id,  atty_et_link, atty_et_image';
        $from = $this->attorney_experience_types_table;
        $atty_et_id = $this->input->post('atty_et_id');
        $attyETDetails = $this->aboutus_model->getData($select, $from, array('atty_et_id' => $atty_et_id));

        echo json_encode($attyETDetails);
    }

    function deleteAttyExperienceType() {         // delete functionality for Attorney detail - ajax
        $deleted = 0;
        $id = $this->input->post('atty_et_id');

        if (isset($id) && !empty($id)) {
            $from = $this->attorney_experience_types_tablet;
            $where = array('atty_et_id' => $id);
            $update_value = array('atty_et_deleted' => 1);
            $deleted = $this->aboutus_model->deleteData($from, $where, $update_value);
        }

        echo $deleted;
    }

    function update_wcu() { //update wcu form_subit() ajax
        $inserted = 0;
        $date = new DateTime();
        $wcu_bg_image = $isWCUExists = '';
        $wcu_type_image = $isWCUTypeExists = '';
        $foldername = 'whychooseus';

        if (!empty($_FILES['wcu_image']['name'])) {
            $info = new SplFileInfo($_FILES['wcu_image']['name']);
            $wcu_bg_image = $date->getTimestamp() . 'wcu_image.' . $info->getExtension();
            if ($this->fileupload->uploadfile('wcu_image', $wcu_bg_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $wcu_bg_image = 'uploads/' . $upd_foldername . $wcu_bg_image;
                } else {
                    $wcu_bg_image = 'uploads/' . $wcu_bg_image;
                }
            }
        }

        if (!empty($_FILES['wcu_type_image']['name'])) {
            $info = new SplFileInfo($_FILES['wcu_type_image']['name']);
            $wcu_type_image = $date->getTimestamp() . 'wcu_type_image.' . $info->getExtension();
            if ($this->fileupload->uploadfile('wcu_type_image', $wcu_type_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $wcu_type_image = 'uploads/' . $upd_foldername . $wcu_type_image;
                } else {
                    $wcu_type_image = 'uploads/' . $wcu_type_image;
                }
            }
        }

        $wcu_type_id = $this->input->post('wcu_type_id');

        $wcu = array(
            'wcu_head' => $this->input->post('wcu_head'),
            'wcu_desc' => $this->input->post('wcu_desc'),
            'wcu_box_image' => $this->input->post('wcu_box_image'),
            'wcu_box_head' => $this->input->post('wcu_box_head'),
            'wcu_box_desc' => $this->input->post('wcu_box_desc')
        );

        $wcuType = array(
            'wcu_type_name' => $this->input->post('wcu_type_name'),
            'wcu_type_name_hl' => $this->input->post('wcu_type_name_hl'),
            'wcu_type_desc' => $this->input->post('wcu_type_desc'),
            'wcu_type_icon' => $this->input->post('wcu_type_icon')
        );


        if (isset($wcu_bg_image) && !empty($wcu_bg_image)) {
            $wcu['wcu_image'] = cleanurl($wcu_bg_image);
        }

        if (isset($wcu_type_image) && !empty($wcu_type_image)) {
            $wcuType['wcu_type_image'] = cleanurl($wcu_type_image);
        }

        $IsEmpty_WCUType = array_filter($wcuType);

        $isWCUExists = $this->aboutus_model->searchContent($this->wcu_table, array('wcu_status' => 1, 'wcu_deleted' => 0));
        if ($isWCUExists == 0) {
            $inserted = $this->aboutus_model->insertData($this->wcu_table, $wcu);
        } else if ($isWCUExists <> 0) {
            $inserted = $this->aboutus_model->updateData($this->wcu_table, $wcu, array('wcu_status' => 1, 'wcu_deleted' => 0));
        }
        if (empty($wcu_type_id) && isset($IsEmpty_WCUType) && !empty($IsEmpty_WCUType)) {
            $inserted = $this->aboutus_model->insertData($this->wcuTypes_table, $wcuType);
        } else {
            if (isset($wcu_type_id) && !empty($wcu_type_id)) { //update
                $inserted = $this->aboutus_model->updateData($this->wcuTypes_table, $wcuType, array('wcu_type_id' => $wcu_type_id, 'wcu_type_status' => 1, 'wcu_type_deleted' => 0)); //table, where
            }
        }
        echo $inserted;
    }

    function get_WCUItems() {
        $data1 = $this->data;
        $this->data1 = array();

        $data = array();

        $atty_options = array();
        $select = 'wcu_type_id, wcu_type_name,wcu_type_desc, wcu_type_name_hl, wcu_type_icon, wcu_type_image,wcu_type_status';
        $from = $this->wcuTypes_table;
        $where = array('wcu_type_deleted' => 0);
        $orderby = "wcu_type_id";

        $WCUTypeDetails = $this->aboutus_model->getData($select, $from, $where, $orderby);

        if (!empty($WCUTypeDetails)) {
            foreach ($WCUTypeDetails as $key => $value) {
                $value['wcu_type_name'] = $value['wcu_type_name'];
                $value['wcu_type_desc'] = $value['wcu_type_desc'];
                $value['wcu_type_name_hl'] = $value['wcu_type_name_hl'];

                $value['wcu_type_icon'] = '<div class="icon-box"><i class="flat_icon ' . $value['wcu_type_icon'] . '"></i></div>';
                $value['wcu_type_image'] = '<img class="dt_image_wcu ' . (!file_exists($value['wcu_type_image']) ? 'no_image' : '') . '"  src="' . ((file_exists($value['wcu_type_image'])) ? $value['wcu_type_image'] : 'themes/backend/assets/dist/img/noimage.png') . '" />';
                $value['wcu_type_status'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['wcu_type_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_wcuType_status($(this));" wcu_type_id="' . $value['wcu_type_id'] . '" wcu_type_status="' . $value['wcu_type_status'] . '"><span class="slider round"></span></label></a>';
                $value['action'] = '<a onclick="getWCUTypes($(this));" wcu_type_id="' . $value['wcu_type_id'] . '" class="edit_WCUDetails btn"><i class="fa fa-pencil"></i></a>' . '<a class="btn open_popup_modal" wcu_type_id=' . $value['wcu_type_id'] . '  data-toggle="modal" data-target="#modal-delete_WCUTypes" onclick="delWCUTypes($(this));"><i class="fa fa-trash-o"></i></a>';

                unset($value['wcu_type_id']);
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

    function update_WCUTypeStatus() {   // status update functionality for about timeline  
        $wcu_type_id = $this->input->post('wcu_type_id');
        $wcu_type_status = array('wcu_type_status' => $this->input->post('wcu_type_status'));
        $updated = $this->aboutus_model->updateData($this->wcuTypes_table, $wcu_type_status, array('wcu_type_id' => $wcu_type_id));

        echo $updated;
    }

    function getWCUDetails() {// getting  WCU details for editing
        $select = 'wcu_type_id, wcu_type_name, wcu_type_desc,wcu_type_name_hl, wcu_type_icon, wcu_type_image';
        $from = $this->wcuTypes_table;
        $wcu_type_id = $this->input->post('wcu_type_id');
        $WCUTypes = $this->aboutus_model->getData($select, $from, array('wcu_type_id' => $wcu_type_id));

        echo json_encode($WCUTypes);
    }

    function deleteWCUTypeDetail() {         // delete functionality for Attorney detail - ajax
        $deleted = 0;
        $id = $this->input->post('wcu_type_id');

        if (isset($id) && !empty($id)) {
            $from = $this->wcuTypes_table;
            $where = array('wcu_type_id' => $id);
            $update_value = array('wcu_type_deleted' => 1);
            $deleted = $this->aboutus_model->deleteData($from, $where, $update_value);
        }

        echo $deleted;
    }

    //attorney breadcrumb start 
    function update_attorney_bc() { //update about attorney_bc form_subit() ajax
        $inserted = 0;
        $date = new DateTime();
        $abtAttyBC_image = $actual_abtAttyBC_image = $isAboutAttyBCExists = '';
        $foldername = 'Attorney';

        if (!empty($_FILES['atty_bc_bg_image']['name'])) {
            $info = new SplFileInfo($_FILES['atty_bc_bg_image']['name']);
            $abtAttyBC_image = $date->getTimestamp() . 'atty_bc_bg_image.' . $info->getExtension();
            if ($this->fileupload->uploadfile('atty_bc_bg_image', $abtAttyBC_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $abtAttyBC_image = 'uploads/' . $upd_foldername . $abtAttyBC_image;
                } else {
                    $abtAttyBC_image = 'uploads/' . $abtAttyBC_image;
                }
            }
        }

        $aboutAttyBC = array(
            'atty_bc_header' => $this->input->post('atty_bc_header')
        );

        if (isset($abtAttyBC_image) && !empty($abtAttyBC_image)) {
            $aboutAttyBC['atty_bc_bg_image'] = cleanurl($abtAttyBC_image);
        }

        $isAboutAttyBCExists = $this->aboutus_model->searchContent($this->attorney_breadcrumb_table, array('atty_bc_status' => 1, 'atty_bc_deleted' => 0)); //table, where


        if (empty($isAboutAttyBCExists)) {
            $inserted = $this->aboutus_model->insertData($this->attorney_breadcrumb_table, $aboutAttyBC);
        } else {
            if (isset($isAboutAttyBCExists) && !empty($isAboutAttyBCExists)) { //update
                $inserted = $this->aboutus_model->updateData($this->attorney_breadcrumb_table, $aboutAttyBC, array('atty_bc_status' => 1, 'atty_bc_deleted' => 0)); //table, where
            }
        }

        echo $inserted;
    }

    //attorney breadcrumb end 
    //experience part end
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