<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Facilities_model extends CI_Model {

    private $table;
    public $primary_key;
    public $data;

    function __construct() {
        parent::__construct();
        $this->table = substr(strtolower(get_class($this)), 0, -6);
        $this->primary_key = array();
        $this->data = array();
    }

    private function reset() {
        $this->primary_key = array();
        $this->data = array();
    }

    private function reset_pk() {
        $this->primary_key = array();
    }

    private function reset_data() {
        $this->data = array();
    }
    public function get_row($preview = "") {
        if ($preview != "yes") {
            $this->db->where('status_ind', '1');
        }
        $this->db->where($this->primary_key);
        $query = $this->db->get($this->table);
        $row = $query->row();
        $this->reset_pk();
        //echo $this->db->last_query(); exit;
        return $row;
    }

    public function view($facilities_id=null){
        if(!empty($facilities_id)){
            $facilities_ids = explode(',',$facilities_id);
            $ids = implode("','",$facilities_ids);
            $this->db->where("facilities_id IN('$ids')");
        }
        $this->db->where('status_ind', '1');
        $this->db->select('*');
        $q = $this->db->get($this->table);
        return $q->result();
    }
}
