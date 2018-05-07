<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Attorney_model extends CI_Model {

    public $aboutAttorney_table = 'attorney';
    public $attorney_items = 'attorney_items';
    public $attorney_social_table = 'attorney_social';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getData($select, $from, $where = false, $order_by = false, $limit = false) {
        $query = '';
        $this->db->select($select);

        if (isset($order_by) && !empty($order_by)) {
            $this->db->order_by($order_by, "desc");
        }
        if (isset($limit) && !empty($limit)) {
            $this->db->limit($limit);
        }
        if (isset($where) && !empty($where)) {
            $query = $this->db->get_where($from, $where);
        } else {
            $this->db->from($from);
            $query = $this->db->get();
        }
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    function getAttorneyData() {

        $array = array();
        $menu_id = array();
        $query = $this->db->query('select * from attorney_items where attyItem_status = 1 and attyItem_deleted = 0 order by attyItem_id asc');
        $result['attorney'] = $query->result_array();

        foreach ($result['attorney'] as $key => $value) {

            $sql1 = "SELECT * FROM `attorney_social` 
                join social on social.social_id = attorney_social.social_id 
                 join attorney_items on attorney_items.attyItem_id = attorney_social.attyItem_id  
                where attorney_social.attySocial_status =1 and attorney_social.attySocial_deleted = 0 and 
                social.social_status = 1 and social.social_deleted = 0 and attorney_social.attyItem_id = " . $value['attyItem_id'];

            $query1 = $this->db->query($sql1);
            $result1 = $query1->result_array();
            $result['attorney'][$key]['social'] = $result1;
        }



        return $result;
    }

}
