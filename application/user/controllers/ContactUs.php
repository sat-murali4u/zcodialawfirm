<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUs extends CI_Controller {

    public $appt_table = 'appointment';
    public $logo_table = 'logo';
    public $disclaimer_table = 'disclaimer';
    public $seo_page_table = 'seo_pages';
    public $seo_header_table = 'seo_header';
    public $map_table = 'map';

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('contactus_model');
    }

    public function index() {
        $data['contact_address'] = $this->contactus_model->getData('c_name,c_content,c_icon', 'contactus', array('c_name' => 'Address', 'c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $data['contact_email'] = $this->contactus_model->getData('c_name,c_content,c_icon', 'contactus', array('c_name' => 'Email', 'c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $data['contact_call'] = $this->contactus_model->getData('c_name,c_content,c_icon', 'contactus', array('c_name' => 'Call Us', 'c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $data['contactus_social'] = $this->contactus_model->getData('c_social_link,c_social_name', 'contactus', array('c_status' => 1, 'c_deleted' => 0, 'c_type' => 2));
        $data['contactus_footer'] = $this->contactus_model->getData('c_footer_content', 'contactus', array('c_status' => 1, 'c_deleted' => 0, 'c_type' => 3));
        $data['appt_details'] = $this->contactus_model->getData('*', $this->appt_table, array('appt_status' => 1, 'appt_deleted' => 0), 'appt_id');
        $data['logo_details'] = $this->contactus_model->getData('*', $this->logo_table, array('logo_status' => 1, 'logo_deleted' => 0), 'logo_id');
        $data['footer_about'] = $this->contactus_model->getData('c_content', 'contactus', array('c_name' => 'footer_content', 'c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $data['disclaimer'] = $this->contactus_model->getData('*', $this->disclaimer_table, array('disclaimer_status' => 1, 'disclaimer_deleted' => 0), 'disclaimer_id', 3);
        $data['seo_header'] = $this->contactus_model->getData('*', $this->seo_header_table, array('sh_status' => 1, 'sh_deleted' => 0), 'sh_id');
        $data['seo_page'] = $this->contactus_model->getData('*', $this->seo_page_table, array('sp_name' => ($this->uri->segment(1) == '' ? 'Home' : ''), 'sp_status' => 1, 'sp_deleted' => 0));
        $data['footer_submenus'] = $this->contactus_model->getSubMenus();
        $data['google_map_entries'] = $this->contactus_model->getData('*', $this->map_table, array('map_status' => 1, 'map_deleted' => 0));
        $data['contactus_contact'] = $this->contactus_model->getData('c_content', 'contactus', array('c_name' => 'contactus_content', 'c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));

        $this->load->view('template/header', $data);
        $this->load->view('contact-us', $data);
        $this->load->view('template/footer', $data);
    }

    public function slider() {
        $this->load->view('temp');
    }

    

}
