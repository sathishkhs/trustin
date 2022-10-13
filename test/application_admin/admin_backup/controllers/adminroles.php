<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminroles extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('languages_model');
        $this->load->model('admin_menuitems_model');
        $this->load->model('admin_roles_model');
        $this->load->model('admin_roles_accesses_model');
        $this->load->model('admin_users_accesses_model');
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id) || $this->session->userdata('user_id') != 1) {
            redirect('');
        } else {
            $_SESSION['languages'] = (!empty($_SESSION['languages'])) ? $_SESSION['languages'] : $this->languages_model->view();
            $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $this->admin_users_accesses_model->get_user_access($this->session->userdata('user_id'));
        }
    }

    public function access($role_id = 1) {
        $accesses = array();
         $acc_query = $this->admin_menuitems_model->view();
          $data['admin_roles'] = $this->admin_roles_model->view();
        $acc_data = array();
        foreach ($acc_query as $acc) {
            if(!empty($acc->parent_menuitem_id)){
                $acc_data[$acc->parent_menuitem_id]['child'][] = $acc;
            } else {
                $acc_data[$acc->menuitem_id]['parent'] = $acc;
            }
        }
        $data['query'] = $acc_data;
        $roles_accesses = $this->admin_roles_accesses_model->view($role_id);
        foreach ($roles_accesses as $row) {
            $accesses[] = $row->menuitem_id;
        }
        $data['role_id'] = $role_id;
        $data['admin_roles_accesses'] = $accesses;
        $data['view'] = 'admin_roles/access-form';
        $data['title'] = 'Administrator Dashboard - Tour Hog Admin';
        $data['page_heading'] = 'Admin Roles';
        $data['scripts'] = array('javascripts/adminusers.js');
        $this->load->view('templates/dashboard', $data);
    }
   /* public function access($role_id = 1) {
        $accesses = array();
         $acc_query=$data['query'] = $this->admin_menuitems_model->view();
        $data['admin_roles'] = $this->admin_roles_model->view();
        $roles_accesses = $this->admin_roles_accesses_model->view($role_id);
        foreach ($roles_accesses as $row) {
            $accesses[] = $row->menuitem_id;
        }
        $data['role_id'] = $role_id;
        $data['admin_roles_accesses'] = $accesses;
        $data['view'] = 'admin_roles/access-form';
        $data['title'] = 'Administrator Dashboard - Tour Hog Admin';
        $data['page_heading'] = 'Admin Roles';
        $data['scripts'] = array('javascripts/adminroles.js');
        $this->load->view('templates/dashboard', $data);
    }*/
public function access2($role_id = 1) {
        $accesses = array();
        $data['query'] = $this->admin_menuitems_model->view();
        $data['admin_roles'] = $this->admin_roles_model->view();
        $roles_accesses = $this->admin_roles_accesses_model->view($role_id);
        foreach ($roles_accesses as $row) {
            $accesses[] = $row->menuitem_id;
        }
        $data['role_id'] = $role_id;
        $data['admin_roles_accesses'] = $accesses;
        $data['view'] = 'admin_roles/access-form';
        $data['title'] = 'Administrator Dashboard - MIS';
        $data['page_heading'] = 'Admin Roles';
        $data['scripts'] = array('javascripts/adminroles.js');
        $this->load->view('templates/dashboard', $data);
    }
    public function access1($user_id) {
        $accesses = array();
        $acc_query = $this->admin_menuitems_model->view();
        $acc_data = array();
        foreach ($acc_query as $acc) {

            if(!empty($acc->parent_menuitem_id)){
                $acc_data[$acc->parent_menuitem_id]['child'][] = $acc;
            } else {
                $acc_data[$acc->menuitem_id]['parent'] = $acc;
            }
        }
        $data['query'] = $acc_data;
        $roles_accesses = $this->admin_users_accesses_model->view($user_id);
        foreach ($roles_accesses as $row) {
            $accesses[] = $row->menuitem_id;
        }

        $data['user_id'] = $user_id;
        $data['admin_users_accesses'] = $accesses;
        $data['view'] = 'admin_users/accessform';
        $data['title'] = 'Administrator Dashboard - MIS';
        $data['page_heading'] = 'Users Roles';
        $data['scripts'] = array('javascripts/adminusers.js');
        $this->load->view('templates/dashboard', $data);
    }


    public function index() {
        $data['query'] = $this->admin_roles_model->view();
        $data['admin_roles'] = $this->admin_roles_model->view();
        $data['view'] = 'admin_roles/list';
        $data['title'] = 'Administrator Dashboard - Tour Hog Admin';
        $data['page_heading'] = 'Admin Roles List';        
		$data['scripts'] = array('js/jquery.dataTables.min.js','js/adminroles.js');
		$data['styles'] = array('css/jquery.dataTables.min.css');
        $this->load->view('templates/dashboard', $data);
    }

    public function add() {
        $data['view'] = 'admin_roles/form';
        $data['title'] = 'Administrator Dashboard - Tour Hog Admin';
        $data['page_heading'] = 'Add Admin Roles';
        $data['scripts'] = array('javascripts/adminroles.js');
        $this->load->view('templates/dashboard', $data);
    }

    public function edit($role_id) {
        $this->admin_roles_model->primary_key = array('role_id' => $role_id);
        $data['query'] = $this->admin_roles_model->get_row();
        $data['view'] = 'admin_roles/form';
        $data['title'] = 'Administrator Dashboard - Tour Hog Admin';
        $data['page_heading'] = 'Edit Admin Roles';
        $data['scripts'] = array('javascripts/adminroles.js');
        $this->load->view('templates/dashboard', $data);
    }

    public function save() {
        $msg = array();
        $this->form_validation->set_rules('role_name', 'Admin Role Name', 'required');
        $role_id = $this->input->post('role_id');
        $qq=$this->input->post('admin_disp');
        $new_role_id = $this->admin_roles_model->get_max_value('role_id') + 1;
        $this->admin_roles_model->data = $this->input->post();

        if ($this->form_validation->run() == true) {
            if (empty($role_id)) { // ADD case
                $this->admin_roles_model->data['role_id'] = $new_role_id;
                $this->admin_roles_model->data['created_date'] = date("Y-m-d H:i:s");
                $this->admin_roles_model->data['created_by'] = $this->session->userdata('user_id');
                $this->admin_roles_model->data['modified_date'] = date("Y-m-d H:i:s");
                $this->admin_roles_model->data['last_modified_by'] = $this->session->userdata('user_id');
                $this->admin_roles_model->data['admin_disp'] = $qq;
                
                if ($this->admin_roles_model->insert()) {

                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Record added successfully.');
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to save.');
                }
            } else { // EDIT case
                $this->admin_roles_model->primary_key = array('role_id' => $this->input->post('role_id'));
                $this->honor_rolls_model->data['modified_date'] = date("Y-m-d H:i:s");
                $this->honor_rolls_model->data['last_modified_by'] = $this->session->userdata('user_id');
                $this->admin_roles_model->data['admin_disp'] = $qq;
                if ($this->admin_roles_model->update()) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Record updated successfully.');
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Update.');
                }
            }
            $this->session->set_flashdata('msg', $msg);
            redirect('/admin-roles/');
        } else {
            $role_id = $this->input->post('role_id');
            if (!empty($role_id)) {
                $this->admin_roles_model->primary_key = array('role_id' => $this->input->post('role_id'));
                $data['query'] = $this->admin_roles_model->get_row();
            }
            $data['query'] = (object) $this->input->post();
            $data['view'] = 'admin_roles/form';
            $data['title'] = 'Administrator Dashboard - Tour Hog Admin';
            $data['page_heading'] = 'Add/Edit Admin Roles';
            $data['scripts'] = array('javascripts/adminroles.js');
            $this->load->view('templates/dashboard', $data);
        }
    }

    public function delete($role_id) {
        $msg = array();
        $this->admin_roles_model->primary_key = array('role_id' => $role_id);
        if ($this->admin_roles_model->delete()) {
            $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Record deleted successfully');
        } else {
            $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Delete.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect('/admin-roles/');
    }

    public function update() {
        $status = true;
        $role_id = $this->input->post('role_id');
        $this->admin_roles_accesses_model->primary_key = array('role_id' => $role_id);
        if ($this->admin_roles_accesses_model->delete()) {
            foreach ($this->input->post('menuitem_id') as $menuitem_id) {
                $this->admin_roles_accesses_model->data = array('menuitem_id' => $menuitem_id, 'role_id' => $role_id);
                if ($this->admin_roles_accesses_model->insert()) {
                    $status = TRUE;
                }
            }
        }

        if ($status) {
            $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Save Changes Updated Successfully');
        } else {
            $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Delete.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect('/admin-roles/');
    }

}