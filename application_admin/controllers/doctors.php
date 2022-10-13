<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Doctors extends CI_Controller {
    public $class_name;
    public function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->load->model('languages_model');
        $this->load->model('admin_users_model');
        $this->load->model('admin_roles_model');
        $this->load->model('admin_users_accesses_model');
        $this->load->model('admin_menuitems_model');        
        $this->load->model('doctors_model');        
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
        $data['query'] = $this->doctors_model->view();
        $data['view'] = 'doctors/doctors_list';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Doctors List';
        $data['scripts'] = array('javascripts/doctors.js');
        $this->load->view('templates/dashboard', $data);
    }
    public function add_doctors() {
        if ($this->session->userdata('user_id') != 1) {
            redirect('');
        }
        $data['query'] = $this->doctors_model->view();
        $data['specialities'] = $this->doctors_model->viewdata('specialities');
        $data['usersrole'] = $this->admin_roles_model->view();
        $data['page_type'] = $this->master_model->page_type();
        $data['templates'] = $this->master_model->view('templates');
        $data['view'] = 'doctors/doctor_form';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Add Doctor';
        $data['scripts'] = array('javascripts/doctors.js');
        $this->load->view('templates/dashboard', $data);
    }
    public function edit($doctors_id) {
        
        $this->doctors_model->primary_key = array('doctors_id' => $doctors_id);
        $data['query'] = $this->doctors_model->get_row();
        $data['specialities'] = $this->doctors_model->viewdata('specialities');
        $data['usersrole'] = $this->admin_roles_model->view();
        $data['page_type'] = $this->master_model->page_type();
        $data['templates'] = $this->master_model->view('templates');
        $data['view'] = 'doctors/doctor_form';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Edit Doctor';
        $data['scripts'] = array('javascripts/doctors.js');
        $this->load->view('templates/dashboard', $data);
    }
   
    public function save() {
        $user_id = $this->session->userdata('user_id');
        if ($user_id != 1) {
            redirect('');
        }
        $msg = array();
            $doctors_id = $this->input->post('doctors_id');
             $this->doctors_model->data = $this->input->post();
           
            $this->doctor_image = array('upload_path' => DOCTOR_IMAGE_PATH, 'allowed_types' => 'jpg|jpeg|gif|png');
            $this->upload->initialize($this->doctor_image);
           
            if (!empty($_FILES['doctor_image']['name']) && $this->upload->do_upload('doctor_image')) {
                $upload_data = $this->upload->data();
                print_r($upload_data);
                
                $file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
                $gen_filename = "doctor_image_".rand ( 1000000 , 9999999 ).".".$file_Ext;
                rename($upload_data['full_path'],$upload_data['file_path'].$gen_filename);
                
                $this->doctors_model->data['doctor_image'] = $gen_filename;
            }
            $this->banner_image = array('upload_path' => BANNER_IMAGE_PATH, 'allowed_types' => 'jpg|jpeg|gif|png');
            $this->upload->initialize($this->banner_image);
           
            if (!empty($_FILES['banner_image']['name']) && $this->upload->do_upload('banner_image')) {
                $upload_data = $this->upload->data();
                print_r($upload_data);
                $file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
                $gen_filename = "banner_image_".rand ( 1000000 , 9999999 ).".".$file_Ext;
                rename($upload_data['full_path'],$upload_data['file_path'].$gen_filename);
                
                $this->doctors_model->data['banner_image'] = $gen_filename;
            }
           
                unset($this->doctors_model->data['doctors_id']);
            if (!empty($doctors_id)) { // edit case
                $this->doctors_model->data['modified_date'] = date("Y-m-d H:i:s");
                $this->doctors_model->primary_key = array('doctors_id' => $doctors_id);
                if ($this->doctors_model->update()) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'User updated successfully.');
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Update.');
                }
            } else { // add case
                $this->doctors_model->data['created_date'] = date("Y-m-d");
                $this->doctors_model->data['created_by'] = $this->session->userdata('user_id');
                $this->doctors_model->data['modified_date'] = date("Y-m-d");
                if ($this->doctors_model->insert()) {
                    // $this->db->query("INSERT INTO `admin_users_accesses` SELECT $new_user_id as user_id,menuitem_id FROM `admin_roles_accesses` WHERE role_id=$role_id");
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'User Successfully Sreated.');
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to save.');
                }

                
            }
            $this->session->set_flashdata('msg', $msg);
            redirect('/doctors/');
       
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