<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Adminusers_Profile extends CI_Controller {

    public $class_name;

    public function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->classname = ucfirst($this->class_name);
        $this->class = "Admin User Profile";
        $this->randoms = mt_rand(125, 854) . '.' . mt_rand(346, 889);
        /* these are the default modules to load in all controller */
        $this->load->model('Admin_roles_model');
        $this->load->model('Admin_users_model');
        $this->load->model('Admin_menuitems_model');
        $this->load->model('Admin_users_accesses_model');
        /* these are the default modules to load in all controller */
        $this->load->model('Access_type_model');
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id))
            redirect('logout');
        $this->Admin_users_model->primary_key = array('user_id' => $user_id);
        $user_session_id = $this->Admin_users_model->session_id();
        if ((empty($user_id) && $this->session->userdata['logged_session_id'] != $user_session_id)) {
            redirect('logout');
        } else {
            $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $this->Admin_users_accesses_model->get_user_access($this->session->userdata('user_id'));
        }
    }

    public function index($admin_user_id) {
        if (!empty($admin_user_id)) {
            $this->Admin_users_model->primary_key = array('user_id' => $this->session->userdata('user_id'));
            $data['query'] = $this->Admin_users_model->get_row();
            $data['roles'] = $this->Admin_roles_model->view_roles();
            $data['view'] = 'adminusers/profile_form';
            $data['title'] = 'Edit ' . $this->class . ' Profile - ' . SITE_TITLE;
            $data['breadcrumb'] = 'Edit ' . $this->class;
            $data['page_heading'] = 'Edit ' . $this->class;
            $data['scripts'] = array('javascripts/' . $this->class_name . '.js?v=' . $this->randoms, 'javascripts/dashboard.js?v=' . $this->randoms);
            $this->load->view('templates/dashboard', $data);
        } else {
            $msg = array();
            $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! You do not have the permission.');
            $this->session->set_flashdata('msg', $msg);
            redirect("/$this->class_name/");
        }
    }

    public function save($admin_user_id) {
        $admin_user_id = $this->input->post('user_id');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_duplicate_email');
        //$this->form_validation->set_rules('mobile', 'Contact', 'required|min_length[10]|max_length[12]');
        $this->form_validation->set_rules('role_id', 'User Role', 'required');
        $this->form_validation->set_rules('access_type_id', 'Page Access User Type', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[12]|callback_valid_password');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[6]|max_length[12]');

        if ($this->form_validation->run() == true) {
            $email = $this->input->post('email', true);
            $this->Admin_users_model->data = $this->input->post();
            /* $user_photo = $_FILES['user_photo']['name'];
              if (!empty($user_photo) && $this->upload->do_upload('user_photo')) {
              $upload_data = $this->upload->data();
              $this->Admin_users_model->data['user_photo'] = $upload_data['file_name'];
              $this->createthumbs(array($upload_data['file_name']));
              $this->createthumbs_2(array($upload_data['file_name']));
              } else {
              $data['form_danger']['user_photo'] = $this->upload->display_dangers();
              } */
            unset($this->Admin_users_model->data['confirm_password']);
            if (!empty($admin_user_id)) {
                $this->Admin_users_model->data['username'] = $this->input->post('email', true);
                $this->Admin_users_model->data['password'] = md5($this->input->post('password'));
                $this->Admin_users_model->data['modified_date'] = date('Y-m-d : H:i:s');
                $this->Admin_users_model->data['modified_by'] = $this->session->userdata('user_id');
                $this->Admin_users_model->primary_key = array('user_id' => $admin_user_id);
                if ($this->Admin_users_model->update()) {
                    $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
                } else {
                    $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
                }
            }
            $this->session->set_flashdata('msg', $msg);
            redirect("/$this->class_name/index/$admin_user_id");
        } else {
            $data['query'] = (object) $this->input->post();
            //echo "<pre/>"; print_r( $data['query']); die;
            $data['roles'] = $this->Admin_roles_model->view_roles();
            $data['view'] = 'adminusers/profile_form';
            $data['title'] = 'Edit ' . $this->class . ' Profile - ' . SITE_TITLE;
            $data['breadcrumb'] = 'Edit ' . $this->class;
            $data['page_heading'] = 'Add New ' . $this->class;
            $data['scripts'] = array('javascripts/' . $this->class_name . '.js?v=' . $this->randoms, 'javascripts/dashboard.js?v=' . $this->randoms);
            $this->load->view('templates/dashboard', $data);
        }
    }

    public function password_check() {
        $userid = $this->input->post('user_id');
        $old_password = $this->input->post('old_password');
        $this->Admin_users_model->primary_key = array('user_id' => $userid);
        $user = $this->Admin_users_model->get_row();
        if ($user->password !== md5($old_password)) {
            $this->form_validation->set_message('password_check', 'Incorrect Old Password');
            return false;
        }
        return true;
    }

    public function userlog($classname, $opr_det, $pages_id, $link='users-profile',$view_type=2) {
        $this->load->model('User_logs_model');
        $this->User_logs_model->insert($classname, $opr_det, $pages_id,$link ,$view_type);
    }


    public function profile() {
        $msg = array();
        $data['view'] = $this->class_name . '/profile';
        $this->Admin_users_model->primary_key = array('user_id' => $this->session->userdata('user_id'));
        $data['query'] = $this->Admin_users_model->get_row();
        $data['title'] = $this->class . ' Profile - ' . SITE_TITLE;
        $data['page_heading'] = $this->class . ' Profile';
        $data['breadcrumb'] = $this->class . ' Profile';
        $data['scripts'] = array('javascripts/' . $this->class_name . '.js?v=' . $this->randoms, 'javascripts/dashboard.js?v=' . $this->randoms);
        $this->load->view('templates/dashboard', $data);
    }

    public function createthumbs($files = array()) {
        if (count($files) == 0) {
            $files = scandir(USER_PHOTO_UPLOAD_PATH);
        }
        foreach ($files as $file) {
            if (is_file(USER_PHOTO_UPLOAD_PATH . $file)) {
                //Start of Resize image code
                $image_config['image_library'] = 'gd2';
                $image_config['source_image'] = USER_PHOTO_UPLOAD_PATH . $file;
                $image_config['new_image'] = USER_PHOTO_UPLOAD_PATH_THUMB . $file;
                $image_config['maintain_ratio'] = FALSE;
                $image_config['width'] = 496;
                $image_config['height'] = 200;
                $image_config['x_axis'] = '100';
                $image_config['y_axis'] = '100';

                $this->image_lib->clear();
                $this->image_lib->initialize($image_config);

                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_dangers();
                }
                //Resize image code end
            }
        }
    }

    public function check_duplicate_email() {
        $email = $this->input->post('email');
        $user_id = $this->input->post('user_id');
        $user_id = (!empty($user_id)) ? $this->input->post('user_id') : 0;
        if ($this->Admin_users_model->check_duplicate('email', $email, $user_id)) {
            $this->form_validation->set_message('check_duplicate_email', 'Sorry! Email aready exist.');
            return false;
        }
        return true;
    }

    public function check_duplicate_username() {
        $username = $this->input->post('username');
        $user_id = $this->input->post('user_id');
        $user_id = (!empty($user_id)) ? $this->input->post('user_id') : 0;
        if ($this->Admin_users_model->check_duplicate('username', $username, $user_id)) {
            $this->form_validation->set_message('check_duplicate_username', 'Sorry! Username aready exist.');
            return false;
        }
        return true;
    }

    public function valid_password($password = '') {
        $password = trim($password);
        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';
        if (empty($password)) {
            $this->form_validation->set_message('valid_password', 'The {field} field is required.');
            return FALSE;
        }
        if (preg_match_all($regex_lowercase, $password) < 1) {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_uppercase, $password) < 1) {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_number, $password) < 1) {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');
            return FALSE;
        }
        if (preg_match_all($regex_special, $password) < 1) {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
            return FALSE;
        }
        if (strlen($password) < 6) {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');
            return FALSE;
        }
        if (strlen($password) > 12) {
            $this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');
            return FALSE;
        }
        return TRUE;
    }

}
