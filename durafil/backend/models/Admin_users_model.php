<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_Users_Model extends CI_Model {

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
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1) {
            $this->db->where('u.user_id', $this->session->userdata('user_id'));
        }
        $this->db->order_by('u.first_name ASC');
        $this->db->where('u.status_ind != 3');
        $this->db->select('u.*,ur.role_name');
        $this->db->from($this->table . ' as u');
        $this->db->join('admin_roles as ur', 'u.role_id=ur.role_id', 'left');
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }

    public function login($data) {
        $this->db->where('a.username', $data['username']);
        //$this->db->where('a.password',password_hash($data['password'], PASSWORD_BCRYPT));
        $this->db->where('a.password', md5($data['password']));
        $this->db->where('a.status_ind', '1');
        $this->db->from($this->table . ' as a');
        $this->db->join('admin_roles as ar', 'a.role_id=ar.role_id', 'left');
        $query = $this->db->get();
        $row = $query->row();
        //echo $this->db->last_query();exit;
        return $row;
    }

    public function get_row() {
        $this->db->where($this->primary_key);
        //$this->db->where('u.status_ind', '1');
        $this->db->select('u.*,r.role_name');
        $this->db->from($this->table . ' as u');
        $this->db->join('admin_roles as r', 'u.role_id=r.role_id', 'left');
        $query = $this->db->get();
        $row = $query->row();
        return $row;
    }

    public function session_id() {
        $this->db->where($this->primary_key);
        $this->db->where('status_ind', '1');
        $query = $this->db->get($this->table);
        $row = $query->row();
        return $row->sessions_id;
    }

    public function forgot_password() {
        $email = $this->input->post('email_address', TRUE);
        $this->db->where('email', $email);
        $this->db->where('status_ind', '1');
        $query = $this->db->get($this->table);
        $row = $query->row();
        return $row;
    }

    public function check_duplicate($field_name, $field_value, $user_id) {
        $this->db->where($field_name, $field_value);
        if (!empty($user_id)) {
            $this->db->where('user_id !=', $user_id);
        }
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function update() {
        $this->db->update($this->table, $this->data, $this->primary_key);
        $this->reset();
        return true;
    }

    public function insert() {
        $this->db->insert($this->table, $this->data);
        $this->reset();
        return $this->db->insert_id();
    }

    public function delete() {
        $this->db->delete($this->table, $this->primary_key);
        $this->reset();
        return true;
    }

    public function get_user() {
        $this->db->where($this->primary_key);
        $query = $this->db->select('user_id,username,email')->from($this->table)->get();
        return $query->row();
    }

    public function get_usernames() {
        $query = $this->db->select('user_id,username,email')->from($this->table)->get();
        return $query->result();
    }

}
