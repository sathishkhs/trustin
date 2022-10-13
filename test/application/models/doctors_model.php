<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doctors_Model extends CI_Model {

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

    public function get_donation_page() {
        $type_id = 5;
        $this->db->where('type_id', $type_id);
        $this->db->select('page_id,page_title,page_slug');
        $this->db->from($this->table);
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        return $query->result();
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

    public function get_widgetcontent() {
        $this->db->where($this->primary_key);
        $this->db->where('p.status_ind', '1');
        $this->db->select('p.page_id,p.page_title,p.page_path,p.alt_title,p.page_slug,p.page_content,p.page_short_description,p.nofollow_ind');
        $this->db->from($this->table . ' as p');
        $query = $this->db->get();
        $row = $query->row();
        $this->reset_pk();
        return $row;
    }
    public function getdata($table){
        $this->db->select('*');
        $this->db->where('status_ind', '1');
        $this->db->where($this->primary_key);
        $this->db->order_by('sort_order','asc');
        $q = $this->db->get($table);
        $this->reset_pk();
        return $q->result();
    }
    public function view_rowdata($table){
        $this->db->select('*');
        $this->db->where('status_ind', '1');
        $this->db->where($this->primary_key);
        $q = $this->db->get($table);
        $this->reset_pk();
        return $q->row();
    }
    public function view_data($table){
        $this->db->select('*');
        $this->db->where('status_ind', '1');
        
        $q = $this->db->get($table);
        return $q->result();
    }
    
    public function view(){
        $this->db->where('status_ind',1);
        $this->db->select('*');
        $q = $this->db->get($this->table);
        return $q->result();
    }
    public function get_doctors(){
        $this->db->where('status_ind',1);
        $this->db->order_by('sort_order','asc');
        $this->db->select('*');
        $q = $this->db->get($this->table);
        return $q->result();
    }
     public function search_doctor($doctor_name,$table){
        $sql = "SELECT * FROM ".$table." WHERE doctor_name LIKE '%".$doctor_name."%' AND status_ind = 1 ORDER BY doctors_id ASC"; 
        $q = $this->db->query($sql)->result();

        foreach($q as $row ){
            $response[] = array("value"=>$row->page_slug,"label"=>$row->doctor_name);
         }
         return $response;
    }
}
