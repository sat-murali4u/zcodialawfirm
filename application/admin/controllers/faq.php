<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faq extends CI_Controller {

    public $faq_category = 'question_category';
    public $faq_questionDetails = 'qc_detail';

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->model('faq_model');
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

    function category() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {

            $this->data['menu'] = true;
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();

            $this->load->view('header/header', $data);
            $this->load->view('question_category', $data);
            $this->load->view('footer', $data);
        }
    }

    function questions() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {

            $this->data['menu'] = true;
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $select = 'qc_id,qc_name';
            $from = $this->faq_category;
            $where = array('qc_status' => 1, 'qc_deleted' => 0);
            $order_by = 'qc_name';
            $sort_by = 'asc';
            $limit = '';
            $data['questions_category'] = $this->faq_model->getData($select, $from, $where, $order_by, $limit, $sort_by);


            $this->load->view('header/header', $data);
            $this->load->view('que_details', $data);
            $this->load->view('footer', $data);
        }
    }

    /* Question Category Start */

    function get_questionCategories() { // Testimonial slider - for datatable
        $this->data1 = array();
        $data = array();
        $select = 'qc_id, qc_name, qc_status';
        $from = $this->faq_category;
        $where = array('qc_deleted' => 0);
        $orderby = "qc_id";
        $qc_list = $this->faq_model->getData($select, $from, $where, $orderby);
        if (isset($qc_list) && !empty($qc_list)) {
            foreach ($qc_list as $key => $value) {
                $value['qc_name'] = character_limiter($value['qc_name'], 30);
                $value['action'] = '<a onclick="getQCDetails($(this));" qc_id="' . $value['qc_id'] . '" class="edit_qcitems btn"><i class="fa fa-pencil"></i></a>' . '<a onclick="delQCDetails($(this));" class="btn open_popup_modal" qc_id=' . $value['qc_id'] . '  data-toggle="modal" data-target="#modal-delete_qcitems"><i class="fa fa-trash-o"></i></a>';
                $value['qc_status'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['qc_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_qc_status($(this));" qc_id="' . $value['qc_id'] . '" qc_status="' . $value['qc_status'] . '"><span class="slider round"></span></label></a>';
                unset($value['qc_id']);
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

    function update_faqDetails() {// update for question details - quedetails_submit action
        $inserted = 0;
        $queDetailsExists = '';

        $queDetails = array(
            'qc_id' => $this->input->post('qc_id'),
            'qd_question' => $this->input->post('qd_question'),
            'qd_answer' => $this->input->post('qd_answer')
        );

        $checkQDArray = array_filter($queDetails);
        
        $qd_id = $this->input->post('qd_id');

        if (isset($qd_id) && !empty($qd_id)) { //update search
            $queDetailsExists = $this->faq_model->searchContent($this->faq_questionDetails, array('qd_id' => $qd_id, 'qd_deleted' => 0)); //table, where
        }

        if (empty($qd_id) && isset($checkQDArray) && !empty($checkQDArray)) {
            $inserted = $this->faq_model->insertData($this->faq_questionDetails, $queDetails);
        } else {
            if (isset($qd_id) && !empty($qd_id) && isset($checkQDArray) && !empty($checkQDArray)) { //update
                $inserted = $this->faq_model->updateData($this->faq_questionDetails, $queDetails, array('qd_id' => $qd_id, 'qd_deleted' => 0)); //table, where
            }
        }

        echo $inserted;
    }

    function update_qc() { // update for question category - category_submit action
        $inserted = 0;
        $isQCItemExists = '';

        $qcItem = array('qc_name' => $this->input->post('txtCatName'));

        $qc_id = $this->input->post('qc_id');

        if (isset($qc_id) && !empty($qc_id)) { //update search
            $isQCItemExists = $this->faq_model->searchContent($this->faq_category, array('qc_id' => $qc_id, 'qc_deleted' => 0)); //table, where
        } else { //insert search
            $isQCItemExists = $this->faq_model->searchContent($this->faq_category, array('qc_status' => 1, 'qc_deleted' => 0)); //insert - table, where
        }



        if (empty($qc_id)) {
            $inserted = $this->faq_model->insertData($this->faq_category, $qcItem);
        } else {

            if (isset($qc_id) && !empty($qc_id)) { //update
                $inserted = $this->faq_model->updateData($this->faq_category, $qcItem, array('qc_id' => $tms_id, 'qc_deleted' => 0)); //table, where
            }
        }

        echo $inserted;
    }

    function getQCDetails() {  // question category details - ajax
        $select = 'qc_id, qc_name';
        $from = $this->faq_category;
        $qc_id = $this->input->post('qc_id');

        $qc_itemDetails = $this->faq_model->getData($select, $from, array('qc_id' => $qc_id));

        echo json_encode($qc_itemDetails);
    }
    
     function getQDDetails() {  // question details - ajax
        $select = 'qd_id, qc_id, qd_question, qd_answer';
        $from = $this->faq_questionDetails;
        $qd_id = $this->input->post('qd_id');

        $qc_itemDetails = $this->faq_model->getData($select, $from, array('qd_id' => $qd_id));
        echo json_encode($qc_itemDetails);
    }

    function deleteQCDetail() {   // delete function for question category - modal
        $deleted = 0;
        $id = $this->input->post('qc_id');
        if (isset($id) && !empty($id)) {
            $from = $this->faq_category;
            $where = array('qc_id' => $id);
            $update_value = array('qc_deleted' => 1);
            $deleted = $this->faq_model->deleteData($from, $where, $update_value);
        }

        echo $deleted;
    }
    
    function deleteQDDetail() {   // delete function for question category - modal
        $deleted = 0;
        $id = $this->input->post('qd_id');
      
        if (isset($id) && !empty($id)) {
            $from = $this->faq_questionDetails;
            $where = array('qd_id' => $id);
            $update_value = array('qd_deleted' => 1);
            $deleted = $this->faq_model->deleteData($from, $where, $update_value);
        }

        echo $deleted;
    }

    function update_QC_status() { // status change - for Question Category = in datatable
        $qc_id = $this->input->post('qc_id');
        $qc_status = array('qc_status' => $this->input->post('qc_status'));
        $updated = $this->faq_model->updateData($this->faq_category, $qc_status, array('qc_id' => $qc_id));

        echo $updated;
    }

    function update_QD_status() { // status change - for Question Detail = in datatable
        $qd_id = $this->input->post('qd_id');
        $qd_status = array('qd_status' => $this->input->post('qd_status'));
        $updated = $this->faq_model->updateData($this->faq_questionDetails, $qd_status, array('qd_id' => $qd_id));

        echo $updated;
    }


    function get_questionDetails() { // get Question Details - for datatable
        $this->data1 = array();
        $data = array();

        $qc_list = $this->faq_model->get_qc_qd_join_data();

        if (isset($qc_list) && !empty($qc_list)) {
            foreach ($qc_list as $key => $value) {
                $value['qc_name'] = character_limiter($value['qc_name'], 30);
                $value['qd_question'] = $value['qd_question'];
                $value['qd_answer'] = $value['qd_answer'];
                $value['action'] = '<a onclick="getQDDetails($(this));" qd_id="' . $value['qd_id'] . '" class="edit_qditems btn"><i class="fa fa-pencil"></i></a>' . '<a onclick="delQDDetails($(this));" class="btn open_popup_modal" qd_id=' . $value['qd_id'] . '  data-toggle="modal" data-target="#modal-delete_qditems"><i class="fa fa-trash-o"></i></a>';
                $value['qd_status'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['qd_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_qd_status($(this));" qd_id="' . $value['qd_id'] . '" qd_status="' . $value['qd_status'] . '"><span class="slider round"></span></label></a>';
                unset($value['qc_id']);
                unset($value['qd_id']);
                unset($value['qc_status']);
                unset($value['qc_deleted']);
               
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
