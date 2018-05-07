<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public $data;
    public $valid_mac = "([0-9A-F]{2}[:-]){5}([0-9A-F]{2})";
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
    public $newsfeed_table = 'news_feed';
    public $map_table = 'map';

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('news_model');
        $this->load->library('encrypt');
        $this->load->helper('text');
        $this->load->library('session');

        $this->data['home_slider_details'] = $this->news_model->getData('*', $this->home_slider, array('hs_status' => 1, 'hs_deleted' => 0));
        $this->data['home_sliderbox_details'] = $this->news_model->getData('*', $this->home_slider_box, array('hsb_status' => 1, 'hsb_deleted' => 0));
        $this->data['testimonial_slider_details'] = $this->news_model->getData('*', $this->TMS_table, array('tms_status' => 1, 'tms_deleted' => 0));
        $this->data['testimonials_details'] = $this->news_model->getData('*', $this->homeTestimonials, array('ht_status' => 1, 'ht_deleted' => 0));
        $this->data['home_testimonial_bg_image'] = $this->news_model->getData('tmimg_bg', $this->home_testimonial_bg, array('tmimg_status' => 1, 'tmimg_deleted' => 0), "tmimg_id", 1);
        $this->data['home_practiceareas'] = $this->news_model->getData('*', $this->practiceAreas, array('pa_status' => 1, 'pa_deleted' => 0));
        $this->data['home_practiceareas_items'] = $this->news_model->getData('*', $this->practiceAreaTypes, array('pat_status' => 1, 'pat_deleted' => 0));
        $this->data['footer_about'] = $this->news_model->getData('c_content', 'contactus', array('c_name' => 'footer_content', 'c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $this->data['contact_address'] = $this->news_model->getData('c_name,c_content,c_icon', 'contactus', array('c_name' => 'Address', 'c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $this->data['contact_email'] = $this->news_model->getData('c_name,c_content,c_icon', 'contactus', array('c_name' => 'Email', 'c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $this->data['contact_call'] = $this->news_model->getData('c_name,c_content,c_icon', 'contactus', array('c_name' => 'Call Us', 'c_status' => 1, 'c_deleted' => 0, 'c_type' => 1));
        $this->data['contactus_social'] = $this->news_model->getData('c_social_link,c_social_name', 'contactus', array('c_status' => 1, 'c_deleted' => 0, 'c_type' => 2));
        $this->data['contactus_footer'] = $this->news_model->getData('c_footer_content', 'contactus', array('c_status' => 1, 'c_deleted' => 0, 'c_type' => 3));
        $this->data['abt_timeline'] = $this->news_model->getData('*', $this->timeline_table, array('aut_status' => 1, 'aut_deleted' => 0));
        $this->data['abt_timelineitems'] = $this->news_model->getData('*', $this->timelineitems_table, array('autli_status' => 1, 'autli_deleted' => 0), 'autli_id');
        $this->data['aboutus'] = $this->news_model->getData('*', $this->aboutus_table, array('au_status' => 1, 'au_deleted' => 0));
        $this->data['aboutus_items'] = $this->news_model->getData('*', $this->aboutus_items_table, array('auti_status' => 1, 'auti_deleted' => 0));
        $this->data['appt_details'] = $this->news_model->getData('*', $this->appt_table, array('appt_status' => 1, 'appt_deleted' => 0), 'appt_id');
        $this->data['logo_details'] = $this->news_model->getData('*', $this->logo_table, array('logo_status' => 1, 'logo_deleted' => 0), 'logo_id');
        $this->data['about_pa'] = $this->news_model->getData('*', $this->practiceAreas, array('pa_status' => 1, 'pa_deleted' => 0), 'pa_id');
        $this->data['about_patypes'] = $this->news_model->getData('*', $this->practiceAreaTypes, array('pat_status' => 1, 'pat_deleted' => 0), 'pat_id');
        $this->data['home_counter'] = $this->news_model->getData('*', $this->home_counter, array('hc_status' => 1, 'hc_deleted' => 0), 'hc_id');
        $this->data['about_attorney'] = $this->news_model->getData('*', $this->aboutAttorney_table, array('atty_status' => 1, 'atty_deleted' => 0), 'atty_id');
        $this->data['attorney_details'] = $this->news_model->getAttorneyData();
        $this->data['attorney_skills'] = $this->news_model->getData('*', $this->attorney_skills_table, array('atty_skill_status' => 1, 'atty_skill_deleted' => 0), 'atty_skill_id');
        $this->data['attorney_skill_types'] = $this->news_model->getData('*', $this->attorney_skillsType_table, array('atty_st_status' => 1, 'atty_st_deleted' => 0), 'atty_st_id');
        $this->data['attorney_experience'] = $this->news_model->getData('*', $this->attorney_experience_table, array('atty_exp_status' => 1, 'atty_exp_deleted' => 0), 'atty_exp_id');
        $this->data['attorney_experience_types'] = $this->news_model->getData('*', $this->attorney_experience_types_table, array('atty_et_status' => 1, 'atty_et_deleted' => 0), 'atty_et_id');
        $this->data['wcu'] = $this->news_model->getData('*', $this->wcu_table, array('wcu_status' => 1, 'wcu_deleted' => 0), 'wcu_id');
        $this->data['wcu_types'] = $this->news_model->getData('*', $this->wcuTypes_table, array('wcu_type_status' => 1, 'wcu_type_deleted' => 0), 'wcu_type_id', 3);
        $this->data['disclaimer'] = $this->news_model->getData('*', $this->disclaimer_table, array('disclaimer_status' => 1, 'disclaimer_deleted' => 0), 'disclaimer_id', 3);
        $this->data['seo_header'] = $this->news_model->getData('*', $this->seo_header_table, array('sh_status' => 1, 'sh_deleted' => 0), 'sh_id');
        $this->data['seo_page'] = $this->news_model->getData('*', $this->seo_page_table, array('sp_name' => ($this->uri->segment(1) == '' ? 'Home' : ''), 'sp_status' => 1, 'sp_deleted' => 0));
        $this->data['footer_submenus'] = $this->news_model->getSubMenus();
        $this->data['google_map_entries'] = $this->news_model->getData('*', $this->map_table, array('map_status' => 1, 'map_deleted' => 0));
    }

    public function runCommand($command) {
        return shell_exec($command);
    }

    public function getCurrentMacAddress($interface) {

        $ifconfig = $this->runCommand("arp -a"); //ifconfig {$interface}");
        print_r($ifconfig);
        die;
        preg_match("/" . $this->valid_mac . "/i", $ifconfig, $ifconfig);
        if (isset($ifconfig[0])) {
            return trim(strtoupper($ifconfig[0]));
        }
        return false;
    }

    public function index() {

//        $mycom = '';
//        ob_start();
//        $cmd = 'GETMAC /S ' . $this->get_ip_address() . ' /NH';
//        system($cmd);
//        $mycom = ob_get_contents();
//        ob_clean();

        $this->data['news_feed'] = $this->unique_multidim_array($this->news_model->getData('*', $this->newsfeed_table, '', 'nf_id', 1, 14), 'uuid');
        // $this->data['news_feed'] = $this->unique_multidim_array($this->data['news_feed'], 'uuid');
        $this->load->view('template/header', $this->data);
        //$this->load->view('news_part/blog', $this->data);
        $this->load->view('news_part/news', $this->data);
        $this->load->view('template/footer', $this->data);
    }

    function singlepage() {
        $this->load->view('template/header', $this->data);
        $this->load->view('news_part/singlepage', $this->data);
        $this->load->view('template/footer', $this->data);
    }

    function view_news() {

        $this->load->library('table');

        if ($this->uri->segment(3) != 'update') {
            if ($this->uri->segment(3) != '') {
                $limit = $this->uri->segment(3);
            } else {
                $limit = '0';
            }
        } else {
            $limit = '0';
        }

        $query = $this->db->query("SELECT * FROM `news_feed` where news_feed.deleted=0 order by news_feed.nf_id desc LIMIT " . $limit . ",8");
        $query1 = $this->db->query("SELECT * FROM `news_feed` where news_feed.deleted=0 order by news_feed.nf_id desc");
        $result = $query->result_array();

        $this->data['news_feed'] = $this->unique_multidim_array($result, 'uuid');

        $row_count = 1;
        $total_rows = count($this->unique_multidim_array($query1->result_array(), 'uuid'));
        $this->data['pagination'] = '';
        $config['per_page'] = 9;
        $next_page = $config['per_page'] + $limit;
        if ($total_rows > 9) {
            $this->load->library('pagination');
            $config['base_url'] = base_url('index.php/news/view_news');
            $config['total_rows'] = $total_rows;
            $config['full_tag_open'] = '<a href="' . base_url('index.php/news/view_news/1') . '" class="pagination-prev"><i class="fa fa-long-arrow-left d-none d-sm-inline-block"></i> Prev</a><ul class="flat-list ml-auto mr-auto">';
            $config['full_tag_close'] = '</ul><a href="' . base_url('index.php/news/view_news/') . $next_page . '" class="pagination-next">next <i class="fa fa-long-arrow-right d-none d-sm-inline-block"></i></a>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = "</li>";
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = "</li>";
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = "</a></li>";
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = "</li>";
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = "</li>";

            $this->pagination->initialize($config);
            $this->data['pagination'] = $this->pagination->create_links();
        }

        // $this->data['news_feed'] = $this->unique_multidim_array($this->news_model->getData('*', $this->newsfeed_table, '', 'nf_id', $limit, 14), 'uuid');
        // $this->data['news_feed'] = $this->unique_multidim_array($this->data['news_feed'], 'uuid');
        $this->load->view('template/header', $this->data);
        $this->load->view('news_part/blog', $this->data);
        $this->load->view('template/footer', $this->data);
    }

    public function single_page() {
        $this->data['news_feed'] = $this->unique_multidim_array($this->news_model->getData('*', $this->newsfeed_table, '', 'nf_id', 1, 14), 'uuid');

        $result = $this->news_model->getData('*', $this->newsfeed_table, array('nf_id' => $this->encrypt->decode(str_replace(' ', '+', $_GET['id']))));
        if (isset($result) && !empty($result)) {
            $thread = json_decode($result[0]['thread'], true);

            $date = new DateTime(substr($thread['published'], 0, -6), new DateTimeZone('UTC'));
            $date->setTimezone(new DateTimeZone(substr($thread['published'], -6)));

            $result = array(
                'main_image' => $thread['main_image'],
                'published_date' => $date->format('M j, Y'),
                'title' => $thread['title'],
                'text' => $result[0]['text']
            );

            $this->data['single_page'] = $result;
        }

        $this->load->view('template/header', $this->data);
        $this->load->view('news_part/blog_single', $this->data);
        $this->load->view('template/footer', $this->data);
    }

    function unique_multidim_array($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach ($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

    function get_ip_address() {
        $ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
        foreach ($ip_keys as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    // trim for safety measures
                    $ip = trim($ip);
                    // attempt to validate IP
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
    }

}
