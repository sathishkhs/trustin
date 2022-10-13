<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menuitems_Model extends CI_Model {

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

    public function get_row() {
        $this->db->where($this->primary_key);
        $query = $this->db->get($this->table);
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
        $this->db->where('i.status_ind !=3');
        $this->db->order_by('i.created_date DESC');
        //$this->db->where('i.status_ind', 1);
        $this->db->select('i.*,m.menu_name,u.username as last_modified_user,au.username as created_user');
        $this->db->from($this->table . ' as i');
        $this->db->join('admin_users as u', 'i.last_modified_by = u.user_id', 'left');
        $this->db->join('admin_users as au', 'i.created_by = au.user_id', 'left');
        $this->db->join('menus as m', 'i.menu_id = m.menu_id', 'left');
        $this->db->order_by('m.menu_name,i.display_order,i.menuitem_text');
        $query = $this->db->get();
        return $query->result();
    }

    public function menu_view() {
        $this->db->where('parent_menuitem_id IS NULL');
        $this->db->where('menu_id', '2');
        $this->db->select('menuitem_id,parent_menuitem_id,menuitem_text,');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function submenu_view($menu_id) {
        $this->db->where('parent_menuitem_id IS NOT NULL');
        $this->db->where('parent_menuitem_id', $menu_id);
        $this->db->select('menuitem_id,parent_menuitem_id,menuitem_text,');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function menu_view1($menu_id) {
        $this->db->where('parent_menuitem_id IS NULL');
        $this->db->where('menu_id', $menu_id);
        $this->db->select('menuitem_id,parent_menuitem_id,menuitem_text,');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_menuitems($menu_id, $parent_menuitem_id = null) {
        $this->db->order_by('display_order ASC');
        $this->db->group_by('menuitem_link');
        if (empty($parent_menuitem_id)) {
            $this->db->where('parent_menuitem_id IS NULL');
        } else {
            $this->db->where('parent_menuitem_id', $parent_menuitem_id);
        }
        $this->db->where('status_ind',1);
        //$this->db->where('menu_id', $menu_id);
        $this->db->where_in('menu_id', array('1'));
        $this->db->select('menuitem_id,menuitem_link,menuitem_text');
        $query = $this->db->get($this->table);
        //echo $this->db->last_query();
        return $query->result();
    }

    public function get_menuitems_2($menu_id, $parent_menuitem_id = null) {
        $this->db->order_by('display_order ASC');
        $this->db->where('parent_menuitem_id IS NULL');
        $this->db->where('status_ind !=3');
        $this->db->where_in('menu_id', array('4', '5'));
        $this->db->select('menuitem_id,menuitem_text,menu_type,pages_id');
        $query = $this->db->get($this->table);
        //echo $this->db->last_query();
        return $query->result();
    }

    //this function for view main menu list in creating new page
    public function get_left_parent_menu($menu_id = 4) {
        $this->db->where('parent_menuitem_id IS NULL');
        $this->db->where('menu_id', $menu_id);
        $this->db->where('status_ind', 1);
        $this->db->select('menuitem_id,menuitem_text');
        $query = $this->db->get($this->table);
        //echo $this->db->last_query();
        return $query->result();
    }

    public function update_parent_menu($menuitem_id) {
        //$this->db->update($this->table, $this->data, $this->primary_key);
        $this->db->query("UPDATE `menuitems` SET  `parent_menuitem_id` = NULL WHERE  `menuitems`.`menuitem_id` =" . $menuitem_id . "");
        $this->db->last_query();
        $this->reset_pk();
        return true;
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

}