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


    public function view() {
        $query = $this->db->select('*')
                ->from($this->table)
                ->get();
        return $query->result();
    }

    public function get_row() {
        $this->db->where($this->primary_key);
        $query = $this->db->get($this->table);
        $row = $query->row();
       
        $this->reset_pk();
        return $row;
    }

    public function get_specialities_icons($speciality_id) {
        $this->db->order_by('speciality_icon_id ASC');
        $this->db->where('status_ind', '1');
        $this->db->where('speciality_id', $speciality_id);
        $this->db->select('speciality_icon_id,icon_image,icon_url,icon_text');
        $this->db->from('specialities_icons');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert() {
        $this->db->insert($this->table, $this->data);
        $this->reset_data();
        return true;
    }

    public function update() {
        $this->db->update($this->table, $this->data, $this->primary_key);
        $this->reset();
        return true;
    }

    public function delete() {
        $this->db->where($this->primary_key);
        $this->db->delete($this->table);
        $this->reset_pk();
        return true;
    }

    public function check_duplicate_slug($field_name, $field_value, $speciality_id, $lang_id = 1) {
        $this->db->where($field_name, $field_value);
        if (!empty($speciality_id)) {
            $this->db->where('speciality_id !=', $speciality_id);
        }
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

}
