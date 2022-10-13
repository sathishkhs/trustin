<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doctors_model extends CI_Model {

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
    public function viewdata($table) {
        $this->db->select('*');
        $this->db->where($this->primary_key);
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }
	public function get_row() {
        $this->db->where($this->primary_key);
        $query = $this->db
        			  ->get($this->table);
        $row = $query->row();
        $this->reset_pk();
        return $row;
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
	
	public function delete(){
		$this->db->where($this->primary_key);
		$this->db->delete($this->table);
		$this->reset_pk();
		return true;
	}
	
	public function get_categories(){
		$query = $this->db->select('faq_category_id, category_name')
						  ->get('faq_category');
		return $query->result();
	}
    public function get_slug($key, $field, $lang_id = 1) {
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
}
