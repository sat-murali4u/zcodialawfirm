<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logo_model extends CI_Model {

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
        return $res;
    }

    function insertData($tablename, $array) {
        return $this->db->insert($tablename, $array);
    }

    function updateData($tablename, $array, $where) {
        $this->db->where($where);
        $result = $this->db->update($tablename, $array);
        return $result;
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

    function getMenuData() {
        $array = array();
        $result_array = array();
        $menu_id = array();
        $query = $this->db->query('select * from main_menu where menu_deleted = 0 and menu_status = 1 and parent_id != menu_id order by menu_id asc');
        $result = $query->result_array();

        foreach ($result as $key => $value) {
            $parent_id = $value['menu_id']; //submenu id
            $sql1 = 'select menu_id, menu_text, parent_id,url from main_menu where menu_deleted = 0 and menu_status = 1 and parent_id != menu_id and parent_id = ' . $parent_id;
            $query1 = $this->db->query($sql1);
            $result1 = $query1->result_array();
            $result_array['result'][$key] = array('menu_id' => $value['menu_id'], 'menu_text' => $value['menu_text'], 'parent_id' => $value['parent_id'],
                'url' => $value['url']);
            foreach ($result1 as $key1 => $value1) {
                $result_array['result'][$key]['List'][] = array('menu_id' => $value1['menu_id'], 'menu_text' => $value1['menu_text'], 'parent_id' => $value1['parent_id'], 'url' => $value1['url']);
            }
        }
        $new_array = array();
        $md_array = array();
        foreach ($result_array as $key2 => $value2){
            foreach ($value2 as $key3 => $value3){
               if ($value3['parent_id'] == 0){
                   $md_array[] = $key3;
               }
            }
             
        }
           foreach ($md_array as $key){
               $new_array[$key] = $result_array['result'][$key];
           }
        $result = array_values($new_array);
        
        return $result;
    }

}
