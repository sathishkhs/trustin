<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_users_session_model extends CI_Model {

    private $table;
    public $primary_key;
    public $data;

    function __construct() {
        parent::__construct();
        $this->table = substr(strtolower(get_class($this)), 0, -6);
        $this->primary_key = array();
        $this->date = array();
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
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    public function active_row(){
        $this->db->where($this->primary_key);
        $this->db->where('success_otp',0);
        $query = $this->db->get($this->table);
        $row = $query->row();
        return $row;
    }
    
    public function get_row(){
        $this->db->order_by('user_session_id','DESC');
        $this->db->where($this->primary_key);
        $query = $this->db->get($this->table);
        $row = $query->row();
        return $row;
    }

    public function update() {
        $this->db->update($this->table, $this->data, $this->primary_key);
        $this->reset();
        return true;
    }

    public function insert() {
        $this->db->insert($this->table, $this->data);
        $this->reset();
        return true;
    }

    public function delete() {
        $this->db->delete($this->table, $this->primary_key);
        $this->reset();
        return true;
    }    

    public function check_otp_validation($otplogin,$session_id) {
        $this->db->where('login_otp', $otplogin);
        $this->db->where('sessions_id', $session_id);
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

}