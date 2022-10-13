<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Specialities_icons_model extends CI_Model {

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
        //$this->db->where('menu_id',1);
        //$this->db->select('a.*,m.menu_id,m.menuitem_id as menuitemid,m.parent_menuitem_id,m.menuitem_text,m.display_order as menu_order_number, m.status_ind as menu_status_ind');
        $this->db->select('a.*');
        $this->db->from($this->table.' as a');
        //$this->db->join('menuitems as m','a.clubs_committees_id = m.pages_id and m.menu_type=3 and m.menu_id=1','left');
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
   
    public function insert() {
        $this->db->insert($this->table, $this->data);
        $this->reset();
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