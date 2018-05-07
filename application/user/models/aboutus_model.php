<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aboutus_model extends CI_Model {

    public $aboutus_table = 'aboutus';

    function __construct() {
        parent::__construct();

        $this->load->database();
    }

    function get_AboutMyself() {

        $this->db->select('*');
        $this->db->order_by("au_id", "desc");
        $query = $this->db->get_where($this->aboutus_table, array('au_status' => 1));

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    function getData($select, $from, $where = false, $order_by = false) {
        $query = '';
        $this->db->select($select);
        if (isset($order_by) && !empty($order_by)) {
            $this->db->order_by($order_by, "desc");
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

}
