<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Facilities extends CI_Controller {
    public $class_name;
    public function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->load->model('languages_model');
        $this->load->model('admin_users_model');
        $this->load->model('admin_roles_model');
        $this->load->model('admin_users_accesses_model');
        $this->load->model('admin_menuitems_model');        
        $this->load->model('facilities_model');        
        $this->load->model('master_model');        
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
            redirect('');
        } else {
            $_SESSION['languages'] = (!empty($_SESSION['languages'])) ? $_SESSION['languages'] : $this->languages_model->view();
            $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $this->admin_users_accesses_model->get_user_access($this->session->userdata('user_id'));
        }
    }
    public function index() {
        if ($this->session->userdata('user_id') != 1) {
            redirect('');
        }
        $data['query'] = $this->facilities_model->view();
        $data['view'] = 'facilities/facilities_list';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Facilities List';
        $data['scripts'] = array('javascripts/facilities.js');
        $this->load->view('templates/dashboard', $data);
    }
    public function add_facilities() {
       
        $data['query'] = $this->facilities_model->view();
        $data['view'] = 'facilities/facilities_form';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Add Facility';
        $data['scripts'] = array('javascripts/facilities.js');
        $this->load->view('templates/dashboard', $data);
    }
    public function edit($facilities_id) {
       
        $this->facilities_model->primary_key = array('facilities_id' => $facilities_id);
        $data['query'] = $this->facilities_model->get_row();
        $data['view'] = 'facilities/facilities_form';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Edit Facility';
        $data['scripts'] = array('javascripts/facilities.js');
        $this->load->view('templates/dashboard', $data);
    }
   
    public function save() {
        $user_id = $this->session->userdata('user_id');
        if ($user_id != 1) {
            redirect('');
        }
        $msg = array();
            $facilities_id = $this->input->post('facilities_id');
             $this->facilities_model->data = $this->input->post();
           
            $this->wall_photos_upload_config = array('upload_path' => FACILITIES_ICON_UPLOAD_PATH, 'allowed_types' => 'jpg|jpeg|gif|png');
            $this->upload->initialize($this->wall_photos_upload_config);
           
            if (!empty($_FILES['icon_image']['name']) && $this->upload->do_upload('icon_image')) {
                $upload_data = $this->upload->data();
                              
                $file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
                $gen_filename = "icon_image".rand ( 1000000 , 9999999 ).".".$file_Ext;
                rename($upload_data['full_path'],$upload_data['file_path'].$gen_filename);
                
                $this->facilities_model->data['icon_image'] = $gen_filename;
            }
           
           
                unset($this->facilities_model->data['facilities_id']);
            if (empty($facilities_id)) { // ADD case
                $this->facilities_model->data['created_date'] = date("Y-m-d");
                $this->facilities_model->data['created_by'] = $this->session->userdata('user_id');
                $this->facilities_model->data['modified_date'] = date("Y-m-d");
                if ($this->facilities_model->insert()) {
                    // $this->db->query("INSERT INTO `admin_users_accesses` SELECT $new_user_id as user_id,menuitem_id FROM `admin_roles_accesses` WHERE role_id=$role_id");
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Facility Successfully Created.');
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to save.');
                }
            } else { // EDIT case
                $this->facilities_model->data['modified_date'] = date("Y-m-d H:i:s");
                $this->facilities_model->primary_key = array('facilities_id' => $facilities_id);
                if ($this->facilities_model->update()) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'User updated successfully.');
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Update.');
                }
            }
            $this->session->set_flashdata('msg', $msg);
            redirect('/facilities/');
       
    }
   
    public function delete($doctors_id) {
        $msg = array();
        $this->doctors_model->primary_key = array('doctors_id' => $doctors_id);
        if ($this->doctors_model->delete()) {
            $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'User deleted successfully');
        } else {
            $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Delete.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect('/doctors/');
    }
  
}