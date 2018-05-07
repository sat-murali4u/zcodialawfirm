<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $homeTestimonials = 'home_testimonials';
    public $TMS_table = 'testimonial_slider';
    public $home_slider = 'home_slider';
    public $home_slider_box = 'home_slider_box';
    public $home_testimonial_bg = 'home_testimonial_bg';
    public $practiceAreas = 'practiceareas';
    public $practiceAreaTypes = 'practicearea_types';
    public $timeline_table = 'aboutus_timeline';
    public $timelineitems_table = 'aboutus_timeline_items';
    public $aboutus_table = 'aboutus';
    public $aboutus_items_table = 'aboutus_items';
    public $appt_table = 'appointment';
    public $logo_table = 'logo';
    public $menu_table = 'main_menu';
    public $seo_page_table = 'seo_pages';
    public $seo_header_table = 'seo_header';
    public $home_counter = 'home_counter';
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
    public $disclaimer_table = 'disclaimer';
    public $map_table = 'map';
    public $about_testimonial_table = 'about_testimonial';
    public $about_consultation_table = 'about_consultation';

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('home_model');
        $this->load->library('ConvertColorCode');
    }

    public function index() {
        $data['home_slider_details'] = $this->home_model->getData('*', $this->home_slider, array('hs_status' => 1, 'hs_deleted' => 0));
        $data['home_sliderbox_details'] = $this->home_model->getData('*', $this->home_slider_box, array('hsb_status' => 1, 'hsb_deleted' => 0));
        $data['testimonial_slider_details'] = $this->home_model->getData('*', $this->TMS_table, array('tms_status' => 1, 'tms_deleted' => 0));
        $data['testimonials_details'] = $this->home_model->getData('*', $this->homeTestimonials, array('ht_status' => 1, 'ht_deleted' => 0));
        $data['home_testimonial_bg_image'] = $this->home_model->getData('tmimg_bg', $this->home_testimonial_bg, array('tmimg_status' => 1, 'tmimg_deleted' => 0), "tmimg_id", 1);
        $data['home_practiceareas'] = $this->home_model->getData('*', $this->practiceAreas, array('pa_status' => 1, 'pa_deleted' => 0));
        $data['home_practiceareas_items'] = $this->home_model->getData('*', $this->practiceAreaTypes, array('pat_status' => 1, 'pat_deleted' => 0));
        $data['footer_about'] = $this->home_model->getData('c_content', 'contactus', array('c_name' => 'footer_content', 'c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $data['contact_address'] = $this->home_model->getData('c_name,c_content,c_icon', 'contactus', array('c_name' => 'Address', 'c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $data['contact_email'] = $this->home_model->getData('c_name,c_content,c_icon', 'contactus', array('c_name' => 'Email', 'c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $data['contact_call'] = $this->home_model->getData('c_name,c_content,c_icon', 'contactus', array('c_name' => 'Call Us', 'c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $data['contactus_social'] = $this->home_model->getData('c_social_link,c_social_name', 'contactus', array('c_status' => 1, 'c_deleted' => 0, 'c_type' => 2));
        $data['contactus_footer'] = $this->home_model->getData('c_footer_content', 'contactus', array('c_status' => 1, 'c_deleted' => 0, 'c_type' => 3));
        $data['abt_timeline'] = $this->home_model->getData('*', $this->timeline_table, array('aut_status' => 1, 'aut_deleted' => 0));
        $data['abt_timelineitems'] = $this->home_model->getData('*', $this->timelineitems_table, array('autli_status' => 1, 'autli_deleted' => 0), 'autli_id');
        $data['aboutus'] = $this->home_model->getData('*', $this->aboutus_table, array('au_status' => 1, 'au_deleted' => 0));
        $data['aboutus_items'] = $this->home_model->getData('*', $this->aboutus_items_table, array('auti_status' => 1, 'auti_deleted' => 0));
        $data['appt_details'] = $this->home_model->getData('*', $this->appt_table, array('appt_status' => 1, 'appt_deleted' => 0), 'appt_id');
        $data['logo_details'] = $this->home_model->getData('*', $this->logo_table, array('logo_status' => 1, 'logo_deleted' => 0), 'logo_id');
        $data['about_pa'] = $this->home_model->getData('*', $this->practiceAreas, array('pa_status' => 1, 'pa_deleted' => 0), 'pa_id');
        $data['about_patypes'] = $this->home_model->getData('*', $this->practiceAreaTypes, array('pat_home_flag' => 1, 'pat_deleted' => 0), 'pat_id');
        $data['home_counter'] = $this->home_model->getData('*', $this->home_counter, array('hc_status' => 1, 'hc_deleted' => 0), 'hc_id');
        $data['about_attorney'] = $this->home_model->getData('*', $this->aboutAttorney_table, array('atty_status' => 1, 'atty_deleted' => 0), 'atty_id');
        $data['attorney_details'] = $this->home_model->getAttorneyData();
        $data['attorney_skills'] = $this->home_model->getData('*', $this->attorney_skills_table, array('atty_skill_status' => 1, 'atty_skill_deleted' => 0), 'atty_skill_id');
        $data['attorney_skill_types'] = $this->home_model->getData('*', $this->attorney_skillsType_table, array('atty_st_status' => 1, 'atty_st_deleted' => 0), 'atty_st_id');
        $data['attorney_experience'] = $this->home_model->getData('*', $this->attorney_experience_table, array('atty_exp_status' => 1, 'atty_exp_deleted' => 0), 'atty_exp_id');
        $data['attorney_experience_types'] = $this->home_model->getData('*', $this->attorney_experience_types_table, array('atty_et_status' => 1, 'atty_et_deleted' => 0), 'atty_et_id');
        $data['wcu'] = $this->home_model->getData('*', $this->wcu_table, array('wcu_status' => 1, 'wcu_deleted' => 0), 'wcu_id');
        $data['wcu_types'] = $this->home_model->getData('*', $this->wcuTypes_table, array('wcu_type_status' => 1, 'wcu_type_deleted' => 0), 'wcu_type_id', 3);
        $data['disclaimer'] = $this->home_model->getData('*', $this->disclaimer_table, array('disclaimer_status' => 1, 'disclaimer_deleted' => 0), 'disclaimer_id', 3);
        $data['seo_header'] = $this->home_model->getData('*', $this->seo_header_table, array('sh_status' => 1, 'sh_deleted' => 0), 'sh_id');
        $data['seo_page'] = $this->home_model->getData('*', $this->seo_page_table, array('sp_name' => ($this->uri->segment(1) == '' ? 'Home' : ''), 'sp_status' => 1, 'sp_deleted' => 0));
        $data['footer_submenus'] = $this->home_model->getSubMenus();
        $data['google_map_entries'] = $this->home_model->getData('*', $this->map_table, array('map_status' => 1, 'map_deleted' => 0));
        $data['about_testimonial'] = $this->home_model->getData('*', $this->about_testimonial_table, array('abt_tm_status' => 1, 'abt_tm_deleted' => 0), 'abt_tm_id');
        $data['about_consultation'] = $this->home_model->getData('*', $this->about_consultation_table, array('abt_consult_status' => 1, 'abt_consult_deleted' => 0), 'abt_consult_id');

        $this->load->view('template/header', $data);
        $this->load->view('home', $data);
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

    function get_menu_entries() { // get top menu entries - ajax on load
        print_r('here');
        die;
        $result = $this->home_model->getMenuData();
        echo json_encode($result);
    }

    function print_die($message, $content) {
        echo '<pre>' . $message;
        print_r($content);
        echo '</pre>';
        die;
    }

}
