<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public $homeTestimonials = 'home_testimonials';
    public $testimonialSlider = 'testimonial_slider';
    public $home_slider = 'home_slider';
    public $home_testimonial_bg = 'home_testimonial_bg';

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

    function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            
            $this->load->view('header/header', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('footer', $data);
            
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */