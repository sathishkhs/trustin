<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menuitems extends CI_Controller {

    public $class_name;
    private $linkid = 5;

    public function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->classname = ucfirst($this->class_name);
        $this->class = "Menuitems";
        $this->randoms = mt_rand(125, 854) . '.' . mt_rand(346, 889);
        /* these are the default modules to load in all controller */
        $this->load->model('Admin_users_model');
        $this->load->model('Admin_menuitems_model');
        $this->load->model('Admin_users_accesses_model');
        /* these are the default modules to load in all controller */
        $this->load->model('Menuitems_model');
        $this->load->model('Menus_model');
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id))
            redirect('logout');
        $this->Admin_users_model->primary_key = array('user_id' => $user_id);
        $user_session_id = $this->Admin_users_model->session_id();
        if ((empty($user_id) && $this->session->userdata['logged_session_id'] != $user_session_id) || (!$this->Admin_users_accesses_model->is_allowed($user_id, $this->linkid))) {
            redirect('logout');
        } else {
            $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $this->Admin_users_accesses_model->get_user_access($this->session->userdata('user_id'));
        }
        $permissions = $this->Admin_users_accesses_model->get_permisions($user_id, $this->linkid);
        $this->permission = array($permissions->add_permission, $permissions->edit_permission, $permissions->delete_permission);
    }

    public function index() {
        $data['query'] = $this->Menuitems_model->view();
        $data['view'] = $this->class_name . '/list';
        $data['title'] = $this->classname . ' Page - ' . SITE_TITLE;
        $data['page_heading'] = $this->class . ' List';
        $data['breadcrumb'] = $this->class . " List";
        $data['scripts'] = array('javascripts/' . $this->class_name . '.js?v=' . $this->randoms, 'javascripts/dashboard.js?v=' . $this->randoms);
        $this->load->view('templates/dashboard', $data);
    }

    public function add() {
        if ($this->permission[0] > 0) {
            $msg = array();
            $data['menu'] = $this->Menus_model->view(1);
            $data['view'] = $this->class_name . '/form';
            $data['title'] = 'Add New ' . $this->class . ' - ' . SITE_TITLE;
            $data['breadcrumb'] = '<a href=' . $this->class_name . '>' . $this->class . '  List</a> &nbsp;&nbsp; / &nbsp;&nbsp; Add New ' . $this->class;
            $data['page_heading'] = 'Add New ' . $this->class;
            $data['scripts'] = array('javascripts/' . $this->class_name . '.js?v=' . $this->randoms, 'javascripts/dashboard.js?v=' . $this->randoms);
            $this->load->view('templates/dashboard', $data);
        } else {
            $msg = array();
            $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! You do not have the permission.');
            $this->session->set_flashdata('msg', $msg);
            redirect("/$this->class_name/");
        }
    }

    public function edit($menuitem_id) {
        if ($this->permission[1] > 0) {
            if (!empty($menuitem_id)) {
                $this->Menuitems_model->primary_key = array('menuitem_id' => $menuitem_id);
                $data['query'] = $this->Menuitems_model->get_row();
                $data['menu'] = $this->Menus_model->view();
                $data['view'] = $this->class_name . '/form';
                $data['title'] = 'Edit ' . $this->class . ' Profile - ' . SITE_TITLE;
                $data['breadcrumb'] = '<a href=' . $this->class_name . '>' . $this->class . ' List</a> &nbsp;&nbsp; / &nbsp;&nbsp; Edit ' . $this->class;
                $data['page_heading'] = 'Edit ' . $this->class;
                $data['scripts'] = array('javascripts/' . $this->class_name . '.js?v=' . $this->randoms, 'javascripts/dashboard.js?v=' . $this->randoms);
                $this->load->view('templates/dashboard', $data);
            }
        } else {
            $msg = array();
            $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! You do not have the permission.');
            $this->session->set_flashdata('msg', $msg);
            redirect("/$this->class_name/");
        }
    }

    public function save() {
        if ($this->permission[0] > 0 || $this->permission[1] > 0) {
            $this->form_validation->set_rules('menu_id', 'Menu Type', 'required');
            $this->form_validation->set_rules('menuitem_text', 'Menu Text', 'required');
            $this->form_validation->set_rules('menuitem_link', 'Menu link', 'required');
            $this->form_validation->set_rules('display_order', 'Display Order', 'required');
            if ($this->form_validation->run() == true) {
                $menuitem_text = $this->input->post('menuitem_text');
                $menuitem_id = $this->input->post('menuitem_id');
                $new_menuitem_id = $this->Menuitems_model->get_max_value('menuitem_id') + 1;
                $this->Menuitems_model->data = $this->input->post();
                if ($this->Menuitems_model->data['parent_menuitem_id'] == '') {
                    unset($this->Menuitems_model->data['parent_menuitem_id']);
                }
                if (empty($menuitem_id)) {  // ADD case
                    $this->Menuitems_model->data['menuitem_id'] = $new_menuitem_id;
                    $this->Menuitems_model->data['created_date'] = date("Y-m-d H:i:s");
                    $this->Menuitems_model->data['created_by'] = $this->session->userdata('user_id');
                    $this->Menuitems_model->data['last_modified_date'] = date("Y-m-d H:i:s");
                    $this->Menuitems_model->data['last_modified_by'] = $this->session->userdata('user_id');
                    $insert_id = $this->Menuitems_model->insert();
                    if (!empty($insert_id)) {
                        $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Record updated successfully.');
                    } else {
                        $msg = array('type' => 'danger', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Update.');
                    }
                } else { // EDIT case
                    $parent_menuitem_id = $this->input->post('parent_menuitem_id');
                    if (empty($parent_menuitem_id)) {
                        $this->Menuitems_model->update_parent_menu($this->input->post('menuitem_id'));
                    }
                    $this->Menuitems_model->data['last_modified_date'] = date("Y-m-d H:i:s");
                    $this->Menuitems_model->data['last_modified_by'] = $this->session->userdata('user_id');
                    $this->Menuitems_model->primary_key = array('menuitem_id' => $menuitem_id);
                    if ($this->Menuitems_model->update()) {
                        $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Record updated successfully.');
                    } else {
                        $msg = array('type' => 'danger', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Update.');
                    }
                }
                $this->session->set_flashdata('msg', $msg);
                redirect("/$this->class_name/");
            } else {
                $data['query'] = (object) $this->input->post();
                $data['menu'] = $this->Menus_model->view();
                $data['view'] = $this->class_name . '/form';
                $data['title'] = 'Add New ' . $this->class . ' - ' . SITE_TITLE;
                $data['breadcrumb'] = '<a href=' . $this->class_name . '>' . $this->class . ' List</a> &nbsp;&nbsp; > &nbsp;&nbsp; Add New ' . $this->class;
                $data['page_heading'] = 'Add New ' . $this->class;
                $data['scripts'] = array('javascripts/' . $this->class_name . '.js?v=' . $this->randoms, 'javascripts/dashboard.js?v=' . $this->randoms);
                $this->load->view('templates/dashboard', $data);
            }
        } else {
            $msg = array();
            $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! You do not have the permission.');
            $this->session->set_flashdata('msg', $msg);
            redirect("/$this->class_name/");
        }
    }

    public function delete($menuitem_id) {
        if (!empty($menuitem_id) && $this->permission[2] > 0) {
            $this->Menuitems_model->primary_key = array('menuitem_id' => $menuitem_id);
            if ($this->Menuitems_model->delete()) {
                $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Deleted Successfully');
            } else {
                $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Add Record.');
            }
        } else {
            $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! You do not have the permission.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect("/$this->class_name/");
    }

    public function userlog($classname, $opr_det, $pages_id, $link = 'Menuitems', $view_type = 2) {
        $this->load->model('User_logs_model');
        $this->User_logs_model->insert($classname, $opr_det, $pages_id, $link, $view_type);
    }

}
