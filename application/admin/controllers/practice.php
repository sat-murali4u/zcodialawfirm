<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Practice extends CI_Controller {

    public $practiceAreas = 'practiceareas';
    public $practiceAreaTypes = 'practicearea_types';
    public $practiceAreaDetails = 'practicearea_detail';

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->model('pa_model');
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

    function about() {

        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['about_pa'] = $this->pa_model->getData('*', $this->practiceAreas, array('pa_status' => 1), 'pa_id');

            $this->load->view('header/header', $data);
            $this->load->view('about_practiceareas', $data);
            $this->load->view('footer', $data);
        }
    }

    function items() {

        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['about_patypes'] = $this->pa_model->getData('*', $this->practiceAreaTypes, array('pat_status' => 1), 'pat_id');

            $this->load->view('header/header', $data);
            $this->load->view('practicearea_items', $data);
            $this->load->view('footer', $data);
        }
    }

    function details() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {

            $this->data['menu'] = true;
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $select = 'pat_id, pat_header';
            $from = $this->practiceAreaTypes;
            $where = array('pat_status' => 1, 'pat_deleted' => 0);
            $order_by = 'pat_header';
            $sort_by = 'asc';
            $limit = '';
            $data['practicearea_types'] = $this->pa_model->getData($select, $from, $where, $order_by, $limit, $sort_by);


            $this->load->view('header/header', $data);
            $this->load->view('practice_details', $data);
            $this->load->view('footer', $data);
        }
    }

    function update_about_pa() { // update functionality for about Practice Areas - form_submit()
        $inserted = 0;
        $date = new DateTime();
        $foldername = 'PracticeAreas';
        $actual_abtContent_image = $abtContent_image = $pa_image = $pa_sideimage = $abtPA_image = $abtPA_sideimage = '';

        if (!empty($_FILES['pa_image']['name'])) {
            $info = new SplFileInfo($_FILES['pa_image']['name']);
            $pa_image = $date->getTimestamp() . 'abtpracticearea_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('pa_image', $pa_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $abtPA_image = 'uploads/' . $upd_foldername . $pa_image;
                } else {
                    $abtPA_image = 'uploads/' . $pa_image;
                }
            }
        }


        if (!empty($_FILES['pa_sideimage']['name'])) {
            $info = new SplFileInfo($_FILES['pa_sideimage']['name']);
            $pa_sideimage = $date->getTimestamp() . 'abtpracticearea_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('pa_sideimage', $pa_sideimage, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $abtPA_sideimage = 'uploads/' . $upd_foldername . $pa_sideimage;
                } else {
                    $abtPA_sideimage = 'uploads/' . $pa_sideimage;
                }
            }
        }

        $aboutPracticeAreas = array(
            'pa_mainheader' => $this->input->post('pa_mainheader'),
            'pa_subheader' => $this->input->post('pa_subheader'),
            'pa_content' => $this->input->post('pa_content'),
            'pa_buttontext' => $this->input->post('pa_buttontext'),
            'pa_buttonlink' => $this->input->post('pa_buttonlink')
        );

        if (isset($abtPA_image) && !empty($abtPA_image)) {
            $aboutPracticeAreas['pa_image'] = cleanurl($abtPA_image);
        }
        if (isset($abtPA_sideimage) && !empty($abtPA_sideimage)) {
            $aboutPracticeAreas['pa_sideimage'] = cleanurl($abtPA_sideimage);
        }


        $isAboutPAExists = $this->pa_model->searchContent($this->practiceAreas, array('pa_status' => 1));
        if ($isAboutPAExists == 0) {
            $inserted = $this->pa_model->insertData($this->practiceAreas, $aboutPracticeAreas);
        } else {
            $inserted = $this->pa_model->updateData($this->practiceAreas, $aboutPracticeAreas, array('pa_status' => 1));
        }
        echo $inserted;
    }

    function get_pat_details() { // PracticeArea Items slider - for datatable
        $this->data1 = array();
        $data = array();
        $select = 'pat_id, pat_header, pat_content,pat_icon_class, pat_icon, pat_home_flag, pat_status';
        $from = $this->practiceAreaTypes;
        $where = array('pat_deleted' => 0);
        $orderby = "pat_id";

        $patitems_list = $this->pa_model->getData($select, $from, $where, $orderby);
        if (isset($patitems_list) && !empty($patitems_list)) {
            foreach ($patitems_list as $key => $value) {

                $value['pat_header'] = $value['pat_header'];
                $value['pat_content'] = $value['pat_content'];
                $value['pat_icon_class'] = '<div class="icon-box"><i class="flat_icon ' . $value['pat_icon_class'] . '"></i></div>';
                $value['pat_icon'] = '<img class="dt_image_pat ' . (!file_exists($value['pat_icon']) ? 'no_image' : '') . '"  src="' . ((file_exists($value['pat_icon'])) ? $value['pat_icon'] : 'themes/backend/assets/dist/img/noimage.png') . '" />';
                $value['action'] = '<a onclick="getPATItemDetails($(this));" pat_id="' . $value['pat_id'] . '" class="edit_patitems btn"><i class="fa fa-pencil"></i></a>' . '<a onclick="delPATItemDetails($(this));" class="btn open_popup_modal" pat_id=' . $value['pat_id'] . '  data-toggle="modal" data-target="#modal-delete_patitems"><i class="fa fa-trash-o"></i></a>';
                $value['pat_home_flag'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['pat_home_flag'] == 1 ? ' checked' : '') . ' onclick="change_dt_pat_hf_status($(this));" pat_id="' . $value['pat_id'] . '" pat_home_flag="' . $value['pat_home_flag'] . '"><span class="slider round"></span></label></a>';
                $value['pat_status'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['pat_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_pat_status($(this));" pat_id="' . $value['pat_id'] . '" pat_status="' . $value['pat_status'] . '"><span class="slider round"></span></label></a>';
                unset($value['pat_id']);
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

    function getPATDetails() { // PracticeArea Item details - ajax request
        $select = 'pat_id, pat_header, pat_content, pat_icon_class, pat_icon';
        $from = $this->practiceAreaTypes;
        $pat_id = $this->input->post('pat_id');

        $pat_itemDetails = $this->pa_model->getData($select, $from, array('pat_id' => $pat_id));

        echo json_encode($pat_itemDetails);
    }

    function deletePATDetail() { // delete function for PracticeAreas Types - modal - ajax request
        $deleted = 0;
        $id = $this->input->post('pat_id');
        if (isset($id) && !empty($id)) {
            $from = $this->practiceAreaTypes;
            $where = array('pat_id' => $id);
            $update_value = array('pat_deleted' => 1);
            $deleted = $this->pa_model->deleteData($from, $where, $update_value);
        }

        echo $deleted;
    }

    function update_about_pat() { // update functionality for about Practice Area Type Items - form_submit() - PAT - Practice Area Types
        $inserted = 0;
        $date = new DateTime();
        $foldername = 'PracticeAreas';
        $actual_patContent_image = $abtContent_image = $pat_image = $pat_sideimage = $PATItem_image = $practiceAreasItems = $isPATItemExists = '';

        if (!empty($_FILES['pat_icon']['name'])) {
            $info = new SplFileInfo($_FILES['pat_icon']['name']);
            $pat_image = $date->getTimestamp() . 'practiceareaitem_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('pat_icon', $pat_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $PATItem_image = 'uploads/' . $upd_foldername . $pat_image;
                } else {
                    $PATItem_image = 'uploads/' . $pat_image;
                }
            }
        }

        $practiceAreasItems = array(
            'pat_header' => $this->input->post('pat_header'),
            'pat_icon_class' => $this->input->post('pat_icon_class'),
            'pat_content' => $this->input->post('pat_content')
        );

        if (isset($PATItem_image) && !empty($PATItem_image)) {
            $practiceAreasItems['pat_icon'] = cleanurl($PATItem_image);
        }

        $pat_id = $this->input->post('pat_id');

        if (isset($pat_id) && !empty($pat_id)) { //update search
            $isPATItemExists = $this->pa_model->searchContent($this->practiceAreaTypes, array('pat_id' => $pat_id, 'pat_deleted' => 0)); //table, where
        } else { //insert search
            $isPATItemExists = $this->pa_model->searchContent($this->practiceAreaTypes, array('pat_status' => 1, 'pat_deleted' => 0)); //insert - table, where
        }
        if ($isPATItemExists <> 0 && isset($pat_id) && !empty($pat_id)) {

            if (isset($practiceAreasItems['pat_icon']) && !empty($practiceAreasItems['pat_icon'])) {

                if (isset($isPATItemExists[0]['pat_icon']) && !empty($isPATItemExists[0]['pat_icon'])) {

                    if (file_exists($isPATItemExists[0]['pat_icon'])) {
                        $res = unlink($isPATItemExists[0]['pat_icon']);
                    }
                }
            }
        }

        if (empty($pat_id)) {
            $inserted = $this->pa_model->insertData($this->practiceAreaTypes, $practiceAreasItems);
        } else {

            if (isset($pat_id) && !empty($pat_id)) { //update
                $inserted = $this->pa_model->updateData($this->practiceAreaTypes, $practiceAreasItems, array('pat_id' => $pat_id, 'pat_deleted' => 0)); //table, where
            }
        }

        echo $inserted;
    }

    function update_pat_status() { // status change - for Pratice Area Items = in datatable
        $pat_id = $this->input->post('pat_id');
        $pat_status = array('pat_status' => $this->input->post('pat_status'));
        $updated = $this->pa_model->updateData($this->practiceAreaTypes, $pat_status, array('pat_id' => $pat_id));

        echo $updated;
    }
    
    function update_pat_hf_status(){ // home flag status change - for Pratice Area Items = in datatable
        $pat_id = $this->input->post('pat_id');
        $pat_home_flag = array('pat_home_flag' => $this->input->post('pat_home_flag'));
        $updated = $this->pa_model->updateData($this->practiceAreaTypes, $pat_home_flag, array('pat_id' => $pat_id));

        echo $updated;
    }

    function update_practiceAreaDetails() { // update for practice area details - pa_details_submit action
        $inserted = 0;
        $date = new DateTime();
        $practiceAreaDetailsExists = $PADItem_image = $pad_images = '';
        $foldername = 'PracticeAreas';

        $practiceAreaDetails = array(
            'pat_id' => $this->input->post('pat_id'),
            'pad_content' => $this->input->post('pad_content')
        );

        if (!empty($_FILES['fileToUpload']['name'])) {
            $files_count = count($_FILES['fileToUpload']['name']);

            for ($i = 0; $i < $files_count; $i++) {
                $_FILES['file']['name'] = $_FILES['fileToUpload']['name'][$i];
                $_FILES['file']['type'] = $_FILES['fileToUpload']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['fileToUpload']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['fileToUpload']['error'][$i];
                $_FILES['file']['size'] = $_FILES['fileToUpload']['size'][$i];

                $info = new SplFileInfo($_FILES['file']['name']);
                $pad_image = $date->getTimestamp() . 'pad_image' . $i . '.' . $info->getExtension();
                if ($this->fileupload->uploadfile('file', $pad_image, $foldername)) {
                    if (isset($foldername) && !empty($foldername)) {
                        $upd_foldername = $foldername . '/';
                        $pad_image = 'uploads/' . $upd_foldername . $pad_image;
                    } else {
                        $pad_image = 'uploads/' . $pad_image;
                    }
                }

                if (isset($pad_image) && !empty($pad_image)) {
                    $pad_images[] = cleanurl($pad_image);
                }
            }
            $practiceAreaDetails = array(
                'pad_image' => json_encode($pad_images)
            );
        }

        $checkPADArray = array_filter($practiceAreaDetails);

        $pad_id = $this->input->post('pad_id');

        if (isset($pad_id) && !empty($pad_id)) { //update search
            $practiceAreaDetailsExists = $this->pa_model->searchContent($this->practiceAreaDetails, array('pad_id' => $pad_id, 'pad_deleted' => 0)); //table, where
        }
        if (isset($pad_images) && !empty($pad_images)) {
            $old_images = json_decode($practiceAreaDetailsExists[0]['pad_image'], true);
            $update_images = array_merge($old_images, $pad_images);
            $practiceAreaDetails = array(
                'pad_image' => json_encode($update_images)
            );
        }
        if (empty($pad_id) && isset($checkPADArray) && !empty($checkPADArray)) {
            $inserted = $this->pa_model->insertData($this->practiceAreaDetails, $practiceAreaDetails);
        } else {
            if (isset($pad_id) && !empty($pad_id) && isset($checkPADArray) && !empty($checkPADArray)) { //update
                $inserted = $this->pa_model->updateData($this->practiceAreaDetails, $practiceAreaDetails, array('pad_id' => $pad_id, 'pad_deleted' => 0)); //table, where
            }
        }

        echo $inserted;
    }

    function get_PracticeAreaDetails() { // Practice Area details - for datatable
        $this->data1 = array();
        $data = array();
        $select = 'practicearea_detail.pad_id as pad_id, '
                . 'practicearea_types.pat_header as pat_header, '
                . 'practicearea_detail.pad_image as pad_image,'
                . 'practicearea_detail.pad_content as pad_content, '
                . 'practicearea_detail.pad_status as pad_status';
        $from = $this->practiceAreaDetails;
        $join = $this->practiceAreaTypes;
        $join_on = "practicearea_detail.pat_id = practicearea_types.pat_id";
        $where = array( 'practicearea_detail.pad_deleted' => 0,
            'practicearea_types.pat_status' => 1, 'practicearea_types.pat_deleted' => 0);
        $orderby = "practicearea_detail.pad_id";

        $practiceAreaDetails = $this->pa_model->getJoinData($select, $from, $join, $join_on, $where, $orderby);
        //echo '<pre>sd:';print_r($practiceAreaDetails);die;
        if (isset($practiceAreaDetails) && !empty($practiceAreaDetails)) {
            foreach ($practiceAreaDetails as $key => $value) {
                $pad_image = json_decode($value['pad_image'], true);
                $images = '';
                foreach ($pad_image as $value_pi) {
                    $images .= '<span class="pat_thumbnail_outer"><img class="pat_thumbnail" src="' . $value_pi . '"></span>';
                }

                $value['pat_header'] = character_limiter($value['pat_header'], 50);
                $value['pad_image'] = '<div class="pat_image_preview">' . $images . '</div>';
                $value['pad_content'] = $value['pad_content'];
                $value['action'] = '<a onclick="getPAItemDetails($(this));" pad_id="' . $value['pad_id'] . '" class="edit_paitems btn"><i class="fa fa-pencil"></i></a>' . '<a onclick="delPAItemDetails($(this));" class="btn open_popup_modal" pad_id=' . $value['pad_id'] . '  data-toggle="modal" data-target="#modal-delete_PracticeAreaItem"><i class="fa fa-trash-o"></i></a>';
                $value['pad_status'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['pad_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_pad_status($(this));" pad_id="' . $value['pad_id'] . '" pad_status="' . $value['pad_status'] . '"><span class="slider round"></span></label></a>';
                unset($value['pad_id']);
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

    function getPADetails() {
        $select = 'pad_id, pat_id, pad_content, pad_image';
        $from = $this->practiceAreaDetails;
        $pad_id = $this->input->post('pad_id');

        $PA_Details = $this->pa_model->getData($select, $from, array('pad_id' => $pad_id));

        echo json_encode($PA_Details);
    }

    function deletePADetail() { // delete function for PracticeArea Details - modal - ajax request
        $deleted = 0;
        $id = $this->input->post('pad_id');
        $img_name = $this->input->post('img_name');
        if (isset($img_name) && !empty($img_name) && isset($id) && !empty($id)) {
            $pad_items = $this->pa_model->searchContent($this->practiceAreaDetails, array('pad_id' => $id, 'pad_deleted' => 0)); //table, where
            if (isset($pad_items) && !empty($pad_items)) {
                $json_image = $pad_items[0]['pad_image'];
                $array = json_decode($json_image, true);
                foreach (array_keys($array, $img_name, true) as $key) {
                    unset($array[$key]);
                }
                $from = $this->practiceAreaDetails;
                $where = array('pad_id' => $id, 'pad_status' => 1, 'pad_deleted' => 0);
                $update_value = array('pad_image' => json_encode(array_values($array)));
                $deleted = $this->pa_model->deleteData($from, $where, $update_value);
            }
        } elseif (isset($id) && !empty($id)) {
            $from = $this->practiceAreaDetails;
            $where = array('pad_id' => $id);
            $update_value = array('pad_deleted' => 1);
            $deleted = $this->pa_model->deleteData($from, $where, $update_value);
        }

        echo $deleted;
    }

    function update_pad_status() {
        $pad_id = $this->input->post('pad_id');
        $pad_status = array('pad_status' => $this->input->post('pad_status'));
        $updated = $this->pa_model->updateData($this->practiceAreaDetails, $pad_status, array('pad_id' => $pad_id));

        echo $updated;
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