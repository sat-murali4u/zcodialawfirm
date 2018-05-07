<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends CI_Controller {

    public $contacts_table = 'contactus';
    public $footer_table = 'footer';
    public $map_table = 'map';
    public $logo_table = 'logo';

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->model('contact_model');
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

    function content() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();

            $this->load->view('header/header', $data);
            $this->load->view('contactus', $data);
            $this->load->view('footer', $data);
        }
    }

    function google_maps() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['google_map_enries'] = $this->contact_model->getData('*', $this->map_table, array('map_status' => 1, 'map_deleted' => 0));
            $this->load->view('header/header', $data);
            $this->load->view('google_maps', $data);
            $this->load->view('footer', $data);
        }
    }

    function get_contactus_details() { // Contact Us Details - for datatable 
        $this->data1 = array();
        $data = array();
        $select = 'c_id, c_name,  c_content, c_icon,c_type, c_status ';
        $from = $this->contacts_table;
        $where = array('c_deleted' => 0, 'c_type' => 1);
        $orderby = "c_id";

        $contactitems = $this->contact_model->getData($select, $from, $where, $orderby);

        if (isset($contactitems) && !empty($contactitems)) {
            foreach ($contactitems as $key => $value) {
                $value['c_name'] = $value['c_name'];
                $value['c_content'] = '<div class="dt_contact_content">' . $value['c_content'] . '</div>';
                $value['c_icon'] = '<img class="dt_image_contact ' . (!file_exists($value['c_icon']) ? 'no_image' : '') . '"  src="' . ((file_exists($value['c_icon'])) ? $value['c_icon'] : 'themes/backend/assets/dist/img/noimage.png') . '" />';
                $value['action'] = '<a onclick="getContactDetails($(this));" c_id="' . $value['c_id'] . '" c_type="' . $value['c_type'] . '" class="edit_contactitems btn"><i class="fa fa-pencil"></i></a>' . '<a onclick="delContactItems($(this));" class="btn open_popup_modal" c_id=' . $value['c_id'] . '  data-toggle="modal" data-target="#modal-delete_contactitems"><i class="fa fa-trash-o"></i></a>';
                $value['c_status'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['c_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_contact_status($(this));" c_id="' . $value['c_id'] . '" c_status="' . $value['c_status'] . '"><span class="slider round"></span></label></a>';
                unset($value['c_id']);
                unset($value['c_type']);
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

    function get_social_details() { // Contact Us - social Details - for datatable 
        $this->data1 = array();
        $data = array();
        $select = 'c_id, c_social_name, c_social_link, c_type, c_status ';
        $from = $this->contacts_table;
        $where = array('c_deleted' => 0, 'c_type' => 2, 'c_social_name<>' => '');
        $orderby = "c_id";

        $contactitems = $this->contact_model->getData($select, $from, $where, $orderby);

        if (isset($contactitems) && !empty($contactitems)) {
            foreach ($contactitems as $key => $value) {
                $value['c_social_name'] = (($value['c_social_name'] == '0' || $value['c_social_name'] == 'null') ? '' : $value['c_social_name']);
                $value['c_social_link'] = $value['c_social_link'];
                $value['action'] = '<a onclick="getContactDetails($(this));" c_id="' . $value['c_id'] . '" c_type="' . $value['c_type'] . '" class="edit_contactitems btn"><i class="fa fa-pencil"></i></a>' . '<a onclick="delContactItems($(this));" class="btn open_popup_modal" c_id=' . $value['c_id'] . '  data-toggle="modal" data-target="#modal-delete_contactitems"><i class="fa fa-trash-o"></i></a>';
                $value['c_status'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['c_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_contact_status($(this));" c_id="' . $value['c_id'] . '" c_status="' . $value['c_status'] . '"><span class="slider round"></span></label></a>';
                unset($value['c_id']);
                unset($value['c_type']);
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

    function get_footer_details() { // Contact Us - footer Details - for datatable 
        $this->data1 = array();
        $data = array();
        $select = 'c_id, c_footer_content, c_type, c_status ';
        $from = $this->contacts_table;
        $where = array('c_deleted' => 0, 'c_type' => 3, 'c_footer_content<>' => '');
        $orderby = "c_id";

        $contactitems = $this->contact_model->getData($select, $from, $where, $orderby);

        if (isset($contactitems) && !empty($contactitems)) {
            foreach ($contactitems as $key => $value) {
                $value['c_footer_content'] = '<div class="dt_footer_content">' . $value['c_footer_content'] . '</div>';
                $value['action'] = '<a onclick="getContactDetails($(this));" c_id="' . $value['c_id'] . '" c_type="' . $value['c_type'] . '" class="edit_contactitems btn"><i class="fa fa-pencil"></i></a>' . '<a onclick="delContactItems($(this));" class="btn open_popup_modal" c_id=' . $value['c_id'] . '  data-toggle="modal" data-target="#modal-delete_contactitems"><i class="fa fa-trash-o"></i></a>';
                $value['c_status'] = '<a class="dt_action_switch"><label class="switch"><input type="checkbox" ' . ($value['c_status'] == 1 ? ' checked' : '') . ' onclick="change_dt_contact_status($(this));" c_id="' . $value['c_id'] . '" c_status="' . $value['c_status'] . '"><span class="slider round"></span></label></a>';
                unset($value['c_id']);
                unset($value['c_type']);
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

    function update_contact() { // update functionality for contact  - form_submit()
        $inserted = 0;
        $date = new DateTime();
        $foldername = 'Contacts';
        $actual_contactContent_image = $contactContent_image = $contact_image = $contact_sideimage = $contactItem_image = $contactItems = $iscontactItemExists = '';

        if (!empty($_FILES['c_icon']['name'])) {
            $info = new SplFileInfo($_FILES['c_icon']['name']);
            $c_image = $date->getTimestamp() . 'contactus_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('c_icon', $c_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $contactItem_image = 'uploads/' . $upd_foldername . $c_image;
                } else {
                    $contactItem_image = 'uploads/' . $c_image;
                }
            }
        }

        $contactItems = array(
            'c_name' => $this->input->post('c_name'),
            'c_content' => $this->input->post('c_content'),
            'c_footer_content' => $this->input->post('c_footer_content'),
            'c_social_name' => $this->input->post('c_social_name'),
            'c_social_link' => $this->input->post('c_social_link'),
            'c_type' => $this->input->post('c_type')
        );

        if (isset($contactItem_image) && !empty($contactItem_image)) {
            $contactItems['c_icon'] = cleanurl($contactItem_image);
        }

        $c_id = $this->input->post('c_id');

        if (isset($c_id) && !empty($c_id)) { //update search
            $iscontactItemExists = $this->contact_model->searchContent($this->contacts_table, array('c_id' => $c_id, 'c_deleted' => 0)); //table, where
        } else { //insert search
            $iscontactItemExists = $this->contact_model->searchContent($this->contacts_table, array('c_status' => 1, 'c_deleted' => 0)); //insert - table, where
        }
        if ($iscontactItemExists <> 0 && isset($c_id) && !empty($c_id)) {

            if (isset($contactItems['c_icon']) && !empty($contactItems['c_icon'])) {

                if (isset($iscontactItemExists[0]['c_icon']) && !empty($iscontactItemExists[0]['c_icon'])) {

                    if (file_exists($iscontactItemExists[0]['c_icon'])) {
                        $res = unlink($iscontactItemExists[0]['c_icon']);
                    }
                }
            }
        }

        if (empty($c_id)) {
            $inserted = $this->contact_model->insertData($this->contacts_table, $contactItems);
        } else {

            if (isset($c_id) && !empty($c_id)) { //update
                $inserted = $this->contact_model->updateData($this->contacts_table, $contactItems, array('c_id' => $c_id, 'c_deleted' => 0)); //table, where
            }
        }

        echo $inserted;
    }

    function getContactDetails() { // PracticeArea Item details - ajax request
        $select = 'c_id, c_name, c_icon, c_content,c_footer_content ,c_social_name, c_social_link';
        $from = $this->contacts_table;

        $contactDetails = $this->contact_model->getData($select, $from, array('c_id' => $this->input->post('c_id'), 'c_type' => $this->input->post('c_type')));

        echo json_encode($contactDetails);
    }

    function update_contact_status() {// status change - for contact Details = in datatable
        $c_id = $this->input->post('c_id');
        $c_status = array('c_status' => $this->input->post('c_status'));
        $updated = $this->contact_model->updateData($this->contacts_table, $c_status, array('c_id' => $c_id));

        echo $updated;
    }

    function deleteContactDetail() {
        $deleted = 0;
        $id = $this->input->post('c_id');
        if (isset($id) && !empty($id)) {
            $from = $this->contacts_table;
            $where = array('c_id' => $id);
            $update_value = array('c_deleted' => 1);
            $deleted = $this->contact_model->deleteData($from, $where, $update_value);
        }

        echo $deleted;
    }

    function update_gmap_entry() { // update functionality for Google Map Entry  - form_submit()
        $inserted = 0;
        $date = new DateTime();
        $foldername = 'GoogleMaps';
        $gmarker_image = $map_marker_image = $gmapItemExists = '';

        if (!empty($_FILES['map_marker_image']['name'])) {
            $info = new SplFileInfo($_FILES['map_marker_image']['name']);
            $map_marker_image = $date->getTimestamp() . 'map_marker_image.' . $info->getExtension();

            if ($this->fileupload->uploadfile('map_marker_image', $map_marker_image, $foldername)) {
                if (isset($foldername) && !empty($foldername)) {
                    $upd_foldername = $foldername . '/';
                    $gmarker_image = 'uploads/' . $upd_foldername . $map_marker_image;
                } else {
                    $gmarker_image = 'uploads/' . $map_marker_image;
                }
            }
        }

        $GMapItems = array(
            'map_long' => $this->input->post('map_long'),
            'map_lat' => $this->input->post('map_lat'),
            'map_key' => $this->input->post('map_key')
        );

        if (isset($gmarker_image) && !empty($gmarker_image)) {
            $GMapItems['map_marker_image'] = cleanurl($gmarker_image);
        }


        $gmapItemExists = $this->contact_model->searchContent($this->map_table, array('map_status' => 1, 'map_deleted' => 0));

        if ($gmapItemExists <> 0) {
            if (isset($GMapItems['map_marker_image']) && !empty($GMapItems['map_marker_image'])) {
                if (isset($gmapItemExists[0]['map_marker_image']) && !empty($gmapItemExists[0]['map_marker_image'])) {
                    if (file_exists($gmapItemExists[0]['map_marker_image'])) {
                        $res = unlink($gmapItemExists[0]['map_marker_image']);
                    }
                }
            }
        }

        if ($gmapItemExists == 0) {
            $inserted = $this->contact_model->insertData($this->map_table, $GMapItems);
        } else {
            if (isset($GMapItems) && !empty($GMapItems)) { //update
                $inserted = $this->contact_model->updateData($this->map_table, $GMapItems, array('map_status' => 1, 'map_deleted' => 0)); //table, where
            }
        }

        echo $inserted;
    }

    function sendmail() {
        $message = $this->input->post('message');
        $name = $this->input->post('name');
        $mail = $this->input->post('mail');
        $data1['admin_data'] = array(
            'from' => $mail,
            'name' => $name,
            'to' => 'murali.zt91emp24@gmail.com',
            'message' => $message
        );
        $data1['user_data'] = array(
            'from' => 'murali.zt91emp24@gmail.com',
            'name' => $name,
            'to' => $mail,
            'message' => '<br />Thanks for contacting us. We will reach you shortly.<br />'
        );
        $data1['logo_details'] = $this->contact_model->getData('*', $this->logo_table, array('logo_status' => 1, 'logo_deleted' => 0), 'logo_id');

        $returndata['admin_mail'] = $this->load->view('email_template_admin', $data1, true);
        $returndata['user_mail'] = $this->load->view('email_template_user', $data1, true);



//        $admin_message = $this->output
//                        ->set_header("HTTP/1.0 200 OK")
//                        ->set_content_type('application/json')
//                        ->set_output(($returndata));



        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'murali.zt91emp24@gmail.com',
            'smtp_pass' => 'zt91emp24',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );


        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');
        /* mail to admin start */
        $this->email->from('murali.zt91emp24@gmail.com');
        $this->email->to($mail);
        $this->email->subject('You got a mail from a User - Lawyer');
        $this->email->message($returndata['admin_mail']);
        $status = $this->email->send();
        /* mail to admin end */

        /* mail to user start */
        $this->email->from($data1['user_data']['from']);
        $this->email->to($data1['user_data']['to']);
        $this->email->subject('Thanks mail from ZT Lawyer Firm');
        $this->email->message($returndata['user_mail']);
        $status = $this->email->send();
        /* mail to user end */

        if ($status) {
            echo 1;
        } else {
            show_error($this->email->print_debugger());
        }
    }

}
