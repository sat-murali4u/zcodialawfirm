<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

    public $faq_category = 'question_category';
    public $faq_questionDetails = 'qc_detail';
    public $map_table = 'map';

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('faq_model');
    }

    public function index() {
        $data['question_category'] = $this->faq_model->getData('*', $this->faq_category, array('qc_status' => 1, 'qc_deleted' => 0));
        $data['question_details'] = $this->faq_model->get_qd_consolidated();
        $data['contactus_address'] = $this->faq_model->getData('c_name,c_content,c_icon', 'contactus', array('c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $data['contactus_social'] = $this->faq_model->getData('c_social_link,c_social_name', 'contactus', array('c_status' => 1, 'c_deleted' => 0, 'c_type' => 2));
        $data['contactus_footer'] = $this->faq_model->getData('c_footer_content', 'contactus', array('c_status' => 1, 'c_deleted' => 0, 'c_type' => 3));
        $data['google_map_entries'] = $this->faq_model->getData('*', $this->map_table, array('map_status' => 1, 'map_deleted' => 0));

        $this->load->view('template/header', $data);
        $this->load->view('faq', $data);
        $this->load->view('template/footer', $data);
    }

    public function slider() {
        $this->load->view('temp');
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
