<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages_Model extends CI_Model {

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

    public function get_max_value($field) {
        $this->db->select_max($field);
        $query = $this->db->get($this->table);
        $row = $query->row();
        return $row->$field;
    }

    public function get_slug($key, $field) {
        //creating slug code here
        $slug = preg_replace('~[^\\pL\d]+~u', '-', $key); // replace non letter or digits by
        $slug = trim($slug, '-'); // trim
        $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug); // transliterate
        $slug = strtolower($slug); // lowercase
        $slug = preg_replace('~[^-\w]+~', '', $slug); // remove unwanted characters

        if (!empty($slug)) {
            $this->db->select('count(*) as counter');
            $this->db->like($field, $slug, 'after');
            $query = $this->db->get($this->table);
            $counter = $query->row()->counter;
            $slug = (!empty($counter)) ? $slug . '-' . (++$counter) : $slug;
        }

        return $slug;
    }

    public function get_row() {
        $this->db->where($this->primary_key);
        //$this->db->where('menu_id',1);
        $this->db->select('a.*');
        $this->db->from($this->table . ' as a');
        $query = $this->db->get();
        $row = $query->row();
        $this->reset_pk();
        return $row;
    }

    public function is_exist() {
        $this->db->where($this->primary_key);
        $this->db->select('COUNT(*) as counter');
        $query = $this->db->get($this->table);
        $row = $query->row();
        return $row->counter;
    }

    public function view() {
        $template_id = $this->input->post('template_id');
        if (!empty($template_id)) {
            $this->db->where('template_id', $template_id);
        }
        $this->db->order_by('p.page_id DESC');
        $this->db->select('p.*,pt.type_name,u.username as last_modified_user,au.username as created_user');
        $this->db->from($this->table . ' as p');
        $this->db->join('page_types as pt', 'p.type_id = pt.type_id', 'left');
        $this->db->join('admin_users as u', 'p.last_modified_by = u.user_id', 'left');
        $this->db->join('admin_users as au', 'p.created_by = au.user_id', 'left');
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 1) {
            $user_id = $this->session->userdata('user_id');
            $this->db->where('ua.user_id', $user_id);
            $this->db->join('admin_users_page_accesses as ua', 'p.page_id = ua.page_id', 'left');
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function view_menu_permission() {
        $this->db->order_by('page_title ASC');
        $this->db->select('page_id,page_title');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    public function view_widgets() {
        $this->db->order_by('p.page_id DESC');
        $this->db->where('p.status_ind', '1');
        $this->db->select('p.*,pt.type_name,u.username as last_modified_user,au.username as created_user');
        $this->db->from($this->table . ' as p');
        $this->db->join('page_types as pt', 'p.type_id = pt.type_id', 'left');
        $this->db->join('admin_users as u', 'p.last_modified_by = u.user_id', 'left');
        $this->db->join('admin_users as au', 'p.created_by = au.user_id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert() {
        $this->db->insert($this->table, $this->data);
        //$this->reset_data();
        return $this->db->insert_id();
    }

    public function update() {
        $this->db->update($this->table, $this->data, $this->primary_key);
        //$this->reset();
        return true;
    }

    public function delete() {
        $this->db->delete($this->table, $this->primary_key);
        $this->reset_pk();
        return true;
    }

    public function check_duplicate_slug($field_name, $field_value, $page_id) {
        $this->db->where($field_name, $field_value);
        $this->db->where('status_ind', 1);
        if (!empty($page_id)) {
            $this->db->where('page_id !=', $page_id);
            $this->db->where('status_ind', 1);
        }
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }
}
