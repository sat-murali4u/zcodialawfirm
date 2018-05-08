<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AboutUs extends CI_Controller {

    public $data;
    public $aboutus_table = 'aboutus';
    public $aboutus_items_table = 'aboutus_items';
    public $timeline_table = 'aboutus_timeline';
    public $timelineitems_table = 'aboutus_timeline_items';
    public $contacts_table = 'contactus';
    public $footer_table = 'footer';
    public $seo_page_table = 'seo_pages';
    public $seo_header_table = 'seo_header';
    public $map_table = 'map';
    public $aboutAttorney_table = 'attorney';
    public $attorney_items = 'attorney_items';
    public $appt_table = 'appointment';
    public $logo_table = 'logo';
    public $practiceAreas = 'practiceareas';
    public $practiceAreaTypes = 'practicearea_types';

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('aboutus_model');
        $this->load->model('home_model');
        $this->data['aboutus'] = $this->aboutus_model->getData('*', $this->aboutus_table, array('au_status' => 1, 'au_deleted' => 0));
        $this->data['aboutus_items'] = $this->aboutus_model->getData('*', $this->aboutus_items_table, array('auti_status' => 1, 'auti_deleted' => 0));
        $this->data['abt_timeline'] = $this->aboutus_model->getData('*', $this->timeline_table, array('aut_status' => 1, 'aut_deleted' => 0));
        $this->data['abt_timelineitems'] = $this->aboutus_model->getData('*', $this->timelineitems_table, array('autli_status' => 1, 'autli_deleted' => 0), 'autli_id');
        $this->data['contactus_address'] = $this->aboutus_model->getData('*', 'contactus', array('c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $this->data['contactus_social'] = $this->aboutus_model->getData('*', 'contactus', array('c_status' => 1, 'c_deleted' => 0, 'c_type' => 2));
        $this->data['contactus_footer'] = $this->aboutus_model->getData('*', 'contactus', array('c_status' => 1, 'c_deleted' => 0, 'c_type' => 3));
        $this->data['seo_header'] = $this->aboutus_model->getData('*', $this->seo_header_table, array('sh_status' => 1, 'sh_deleted' => 0), 'sh_id');
        $this->data['seo_page'] = $this->aboutus_model->getData('*', $this->seo_page_table, array('sp_name' => ($this->uri->segment(1) == 'aboutus' ? 'AboutUs' : ''), 'sp_status' => 1, 'sp_deleted' => 0));
        $this->data['google_map_entries'] = $this->aboutus_model->getData('*', $this->map_table, array('map_status' => 1, 'map_deleted' => 0));
        $this->data['about_attorney'] = $this->aboutus_model->getData('*', $this->aboutAttorney_table, array('atty_status' => 1, 'atty_deleted' => 0), 'atty_id');
        $this->data['attorney_details'] = $this->home_model->getAttorneyData();
        $this->data['appt_details'] = $this->aboutus_model->getData('*', $this->appt_table, array('appt_status' => 1, 'appt_deleted' => 0), 'appt_id');
        $this->data['footer_about'] = $this->aboutus_model->getData('c_content', 'contactus', array('c_name' => 'footer_content', 'c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $this->data['contact_address'] = $this->aboutus_model->getData('c_name,c_content,c_icon', 'contactus', array('c_name' => 'Address', 'c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $this->data['contact_email'] = $this->aboutus_model->getData('c_name,c_content,c_icon', 'contactus', array('c_name' => 'Email', 'c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $this->data['contact_call'] = $this->aboutus_model->getData('c_name,c_content,c_icon', 'contactus', array('c_name' => 'Call Us', 'c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $this->data['contactus_social'] = $this->aboutus_model->getData('c_social_link,c_social_name', 'contactus', array('c_status' => 1, 'c_deleted' => 0, 'c_type' => 2));
        $this->data['contactus_footer'] = $this->aboutus_model->getData('c_footer_content', 'contactus', array('c_status' => 1, 'c_deleted' => 0, 'c_type' => 3));
        $this->data['logo_details'] = $this->aboutus_model->getData('*', $this->logo_table, array('logo_status' => 1, 'logo_deleted' => 0), 'logo_id');
        $this->data['footer_submenus'] = $this->home_model->getSubMenus();
    }

    public function index() {
//        echo '<pre>';
//        print_r($this->data);
//        echo '</pre>';
//        die;
        $this->load->view('template/header', $this->data);
        $this->load->view('about-us', $this->data);
        $this->load->view('template/footer', $this->data);
    }

    public function slider() {
        $this->load->view('temp');
    }

    function upload_img_status() {
        $selector = $this->input->post('selector');

        if ($selector == 1) {
            $this->session->set_userdata("aboutus_header_img", "1");
        }
        if ($selector == 2) {
            $this->session->set_userdata("aboutus_content_img", "1");
        }
        echo $selector;
    }

}
