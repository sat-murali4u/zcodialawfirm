<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aboutus_model extends CI_Model {

    public $aboutus_table = 'aboutus';
    public $aboutusitems_table = 'aboutus_items';
    public $timeline_table = 'aboutus_timeline';
    public $timelineitems_table = 'aboutus_timeline_items';

    function __construct() {
        parent::__construct();
        $ci = & get_instance();
    }

    function searchContent($tablename, $where = false) {
        $this->db->select('*');
        $this->db->from($tablename);
        if (isset($where) && !empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return 0;
        }
    }

    function deleteData($from, $where, $array) {
        $this->db->where($where);
        $res = $this->db->update($from, $array);
        //print_r($this->db->last_query());die;
        return $res;
    }

    function insertData($tablename, $array) {
        return $this->db->insert($tablename, $array);
    }

    function updateData($tablename, $array, $where) {
        $this->db->where($where);
        return $this->db->update($tablename, $array);
    }

    function getData($select, $from, $where = false, $order_by = false, $order_type = false) {
        $query = '';
        $this->db->select($select);
        if (isset($order_by) && !empty($order_by)) {
            if (isset($order_type) && !empty($order_type)) {
                $this->db->order_by($order_by, $order_type);
            } else {
                $this->db->order_by($order_by, "desc");
            }
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
