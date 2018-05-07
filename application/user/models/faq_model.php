<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faq_model extends CI_Model {

    public $faq_category = 'question_category';
    public $faq_categoryDetails = 'qc_detail';

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

    function insertData($tablename, $array) {
        return $this->db->insert($tablename, $array);
    }

    function updateData($tablename, $array, $where) {
        $this->db->where($where);
        return $this->db->update($tablename, $array);
    }

    function deleteData($from, $where, $array) {
        $this->db->where($where);
        return $this->db->update($from, $array);
    }

    function getData($select, $from, $where = false, $order_by = false, $limit = false, $sort_by = false) {
        $query = '';
        $this->db->select('*');
        if (isset($order_by) && !empty($order_by) && empty($sort_by)) {
            $this->db->order_by($order_by, "desc");
        } else if (isset($sort_by) && !empty($sort_by)) {
            $this->db->order_by($order_by, $sort_by);
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

    function get_qd_consolidated() {
        $data['question_details'] = array();

        $this->db->select('question_category.qc_id, question_category.qc_name');
        $this->db->from('question_category');
        $this->db->where(array('question_category.qc_status' => 1, 'question_category.qc_deleted' => 0));
        $query_cat = $this->db->get();
        if ($query_cat->num_rows() > 0) {
            $data['question_details'] = $query_cat->result_array();
            //echo '<pre>'; print_r($key_qc);echo '</pre>';die;
            foreach ($data['question_details'] as $key_qc => $value_qc) {
                $data['question_details'][$key_qc]['category_id'] = $value_qc['qc_id'];
                $data['question_details'][$key_qc]['qcategory'] = $value_qc['qc_name'];
                $array =  $this->get_questionDetails($value_qc['qc_id']); 
                $data['question_details'][$key_qc]['qd_count'] = sizeof($array);
                $data['question_details'][$key_qc]['question_details'] = $array;
                unset($data['question_details'][$key_qc]['category_id']);
                unset($data['question_details'][$key_qc]['qcategory']);
            }
        } else {
            return false;
        }
        //echo '<pre>question_details:';print_r($data['question_details']);die;
        return $data['question_details'];
    }

    function get_questionDetails($qc_id = false) {
        $this->db->select('qc_detail.qc_id, qc_detail.qd_id, qc_detail.qd_question, qc_detail.qd_answer');
        $this->db->from('qc_detail');
        $this->db->where(array('qc_detail.qc_id' => $qc_id));
        $this->db->where(array('qc_detail.qd_deleted' => 0, 'qc_detail.qd_status' => 1));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $res = $query->result_array();
            //echo '<pre>';print_r($res);die;
            return $res;
        } else {
            return false;
        }
    }

    function get_qc_qd_join_data($qc_id = false, $qd_id = false) {
        $this->db->select('question_category.qc_id, question_category.qc_name, qc_detail.qc_id, qc_detail.qd_id, qc_detail.qd_question, qc_detail.qd_answer, qc_detail.qd_status');
        $this->db->from('question_category');
        $this->db->join('qc_detail', 'question_category.qc_id = qc_detail.qc_id');
        if (isset($qc_id) && !empty($qc_id)) {
            $this->db->where(array('qc_detail.qc_id' => $qc_id));
        }
        if (isset($qd_id) && !empty($qd_id)) {
            $this->db->where(array('qc_detail.qd_id' => $qd_id));
        }
        $this->db->where(array('question_category.qc_deleted' => 0, 'qc_detail.qd_deleted' => 0));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

}
