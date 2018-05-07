<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public $homeTestimonials = 'home_testimonials';
    public $testimonialSlider = 'testimonial_slider';
    public $home_slider = 'home_slider';
    public $home_testimonial_bg = 'home_testimonial_bg';
    public $aboutus_table = 'aboutus';
    public $aboutus_items = 'aboutus_items';
    public $timeline_table = 'aboutus_timeline';
    public $timelineitems_table = 'aboutus_timeline_items';

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->model('dashboard_model');
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

    function get_deleted_tmslist() {
        $this->data1 = array();
        $data = array();
        $select = 'tms_id, tms_name, tms_content, tms_image, tms_deleted';
        $from = $this->testimonialSlider;
        $where = array('tms_deleted' => 1);
        $orderby = "tms_id";

        $tmsitems_list = $this->dashboard_model->getData($select, $from, $where, $orderby);

        if (isset($tmsitems_list) && !empty($tmsitems_list)) {
            foreach ($tmsitems_list as $key => $value) {

                $value['tms_name'] = character_limiter($value['tms_name'], 30);
                $value['tms_content'] = $value['tms_content'];
                $value['tms_image'] = '<img class="dt_image ' . (!file_exists($value['tms_image']) ? 'no_image' : '') . '"  src="' . ((file_exists($value['tms_image'])) ? $value['tms_image'] : 'themes/backend/assets/dist/img/noimage.png') . '" />';
                $value['tms_deleted'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['tms_deleted'] == 1 ? ' checked' : '') . ' onclick="change_dt_tms_deleted($(this));" tms_id="' . $value['tms_id'] . '" tms_deleted="' . $value['tms_deleted'] . '"><span class="slider round"></span></label></a>';
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

    function get_deleted_HS_Items() {
        $this->data1 = array();
        $data = array();
        $aitems_options = array();
        $select = 'hs_id, hs_header1, hs_subheader1, hs_subheader2, hs_bgimage, hs_signature, hs_deleted';
        $from = $this->home_slider;
        $where = array('hs_deleted' => 1);
        $orderby = "hs_id";

        $hstems_list = $this->dashboard_model->getData($select, $from, $where, $orderby);

        if (!empty($hstems_list)) {
            foreach ($hstems_list as $key => $value) {
                $value['hs_header1'] = character_limiter($value['hs_header1'], 30);
                $value['hs_subheader1'] = $value['hs_subheader1'];
                $value['hs_subheader2'] = $value['hs_subheader2'];
                $value['hs_bgimage'] = '<img class="dt_image ' . (!file_exists($value['hs_bgimage']) ? 'no_image' : '') . '"  src = "' . ((file_exists($value['hs_bgimage'])) ? $value['hs_bgimage'] : 'themes/backend/assets/dist/img/noimage.png') . '" />';
                $value['hs_signature'] = '<img class="dt_image ' . (!file_exists($value['hs_signature']) ? 'no_image' : '') . '"  src = "' . ((file_exists($value['hs_signature'])) ? $value['hs_signature'] : 'themes/backend/assets/dist/img/noimage.png') . '" />';
                $value['hs_deleted'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['hs_deleted'] == 1 ? ' checked' : '') . ' onclick="change_dt_hs_delete($(this));" hs_id="' . $value['hs_id'] . '" hs_deleted="' . $value['hs_deleted'] . '"><span class="slider round"></span></label></a>';

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

    function get_deleted_TL_Items() { // getting deleted Home slider items for datatable on load
        $this->data1 = array();

        $data = array();

        $aitems_options = array();
        $select = 'autli_id, autli_fromyear, autli_toyear, autli_head, autli_content';
        $from = $this->timelineitems_table;
        $where = array('autli_deleted' => 1);
        $orderby = "autli_id";

        $timelineitems_list = $this->dashboard_model->getData($select, $from, $where, $orderby);


        if (!empty($timelineitems_list)) {
            foreach ($timelineitems_list as $key => $value) {
                $value['autli_fromyear'] = $value['autli_fromyear'] . ' - ' . $value['autli_toyear'];
                $value['autli_head'] = character_limiter($value['autli_head'], 30);
                $value['autli_content'] = $value['autli_content'];
                // $value['action'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['autli_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_timeline_status($(this));" autli_id="' . $value['autli_id'] . '" autli_status="' . $value['autli_status'] . '"><span class="slider round"></span></label></a>';
                $value['action'] = '<a onclick="getTimelineItemDetails($(this));" autli_id="' . $value['autli_id'] . '" class="edit_timelineitems btn"><i class="fa fa-pencil"></i></a>' . '<a class="btn open_popup_modal" autli_id=' . $value['autli_id'] . '  data-toggle="modal" data-target="#modal-delete_timelineitems" onclick="delTimelineItemDetails($(this));"><i class="fa fa-trash-o"></i></a>';

                unset($value['autli_id']);
                unset($value['autli_toyear']);
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

    function update_hs_delete() { //update the deleted status for home slider
        $hs_id = $this->input->post('hs_id');
        $hs_deleted = array('hs_deleted' => $this->input->post('hs_deleted'));
        $updated = $this->dashboard_model->updateData($this->home_slider, $hs_deleted, array('hs_id' => $hs_id));

        echo $updated;
    }

    function update_tms_delete() { //update the deleted status for testimonial slider
        $tms_id = $this->input->post('tms_id');
        
        $tms_deleted = array('tms_deleted' => $this->input->post('tms_deleted'));
        $updated = $this->dashboard_model->updateData($this->testimonialSlider, $tms_deleted, array('tms_id' => $tms_id));

        echo $updated;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */