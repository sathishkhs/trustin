<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Adminusers extends CI_Controller {



    public function __construct() {

        parent::__construct();

        $this->load->model('languages_model');

        $this->load->model('admin_users_model');

        $this->load->model('admin_roles_model');

        $this->load->model('admin_users_accesses_model');

        $this->load->model('admin_menuitems_model');        

        

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



        $data['query'] = $this->admin_users_model->view();

        $data['view'] = 'admin_users/list';

        $data['title'] = 'Administrator Dashboard - Life In Goa';

        $data['page_heading'] = 'Admin Users List';

        $data['scripts'] = array('js/adminusers.js','js/pages/dashboard2.js');

        $this->load->view('templates/dashboard', $data);

    }



    public function add() {

        if ($this->session->userdata('user_id') != 1) {

            redirect('');

        }

        $data['query'] = $this->admin_users_model->view();

        $data['usersrole'] = $this->admin_roles_model->view();

        $data['view'] = 'admin_users/form';

        $data['title'] = 'Administrator Dashboard - Life In Goa';

        $data['page_heading'] = 'Add Admin Users';

        $data['scripts'] = array('javascripts/adminusers.js');

        $this->load->view('templates/dashboard', $data);

    }



    public function edit($user_id) {

        if ($this->session->userdata('user_id') != 1) {

            redirect('');

        }

        $this->admin_users_model->primary_key = array('user_id' => $user_id);

        $data['query'] = $this->admin_users_model->get_row();

        $data['usersrole'] = $this->admin_roles_model->view();

        $data['view'] = 'admin_users/form';

        $data['title'] = 'Administrator Dashboard - Life In Goa';

        $data['page_heading'] = 'Edit User';

        $data['scripts'] = array('javascripts/adminusers.js');

        $this->load->view('templates/dashboard', $data);

    }



    public function profile() {

        $msg = array();

        $this->form_validation->set_rules('first_name', 'First Name', 'required');

        $this->form_validation->set_rules('last_name', 'Last Name', 'required');

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[20]|matches[confirm_password]');

        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');



        if ($this->form_validation->run() == true) {

            $this->admin_users_model->data = $this->input->post();

            unset($this->admin_users_model->data['confirm_password']);

            $this->admin_users_model->data['modified_date'] = date("Y-m-d H:i:s");

            $this->admin_users_model->data['last_modified_by'] = $this->session->userdata('user_id');

            $this->admin_users_model->primary_key = array('user_id' => $this->input->post('user_id'));

            if ($this->admin_users_model->update()) {

                $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Record updated successfully.');

            } else {

                $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Update.');

            }

            $this->session->set_flashdata('msg', $msg);

            redirect('/profile/');

        }



        $this->admin_users_model->primary_key = array('user_id' => $this->session->userdata('user_id'));

        $data['query'] = $this->admin_users_model->get_row();

        $data['view'] = 'admin_users/profile';

        $data['title'] = 'Administrator Dashboard - Life In Goa';

        $data['page_heading'] = 'Edit Profile';

        $data['scripts'] = array('javascripts/adminusers.js');

        $this->load->view('templates/dashboard', $data);

    }



    public function save() {



        $user_id = $this->session->userdata('user_id');

        if ($user_id != 1) {

            redirect('');

        }

        $msg = array();

        $this->form_validation->set_rules('first_name', 'First Name', 'required');

        $this->form_validation->set_rules('last_name', 'Last Name', 'required');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_duplicate_email');

        $this->form_validation->set_rules('role_id', 'User Role', 'required');

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|callback_check_duplicate_username');



        $role_id = $this->input->post('role_id');

        $user_id = $this->input->post('user_id');

        $new_user_id = $this->admin_users_model->get_max_value('user_id') + 1;



        if (!empty($user_id)) {

			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[20]|matches[confirm_password]');

			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');

        } else {

            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[12]|matches[confirm_password]');

            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');

        }



        if ($this->form_validation->run() == true) {

            $this->admin_users_model->data = $this->input->post();

            unset($this->admin_users_model->data['confirm_password']);



            if (empty($user_id)) { // ADD case

                $this->admin_users_model->data['user_id'] = $new_user_id;

                $this->admin_users_model->data['created_date'] = date("Y-m-d H:i:s");

                $this->admin_users_model->data['created_by'] = $this->session->userdata('user_id');

                $this->admin_users_model->data['modified_date'] = date("Y-m-d H:i:s");

                $this->admin_users_model->data['last_modified_by'] = $this->session->userdata('user_id');

                

                $username = $this->input->post('username');

                $password = $this->input->post('password');

                $to = $this->input->post('email');

                $first_name = $this->input->post('first_name');

                $base_url = base_url();



                if ($this->admin_users_model->insert()) {

                    $this->db->query("INSERT INTO `admin_users_accesses` SELECT $new_user_id as user_id,menuitem_id FROM `admin_roles_accesses` WHERE role_id=$role_id");

                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'User Successfully Sreated.');

                } else {

                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to save.');

                }

            } else { // EDIT case

                $this->admin_users_model->data['modified_date'] = date("Y-m-d H:i:s");

                $this->admin_users_model->data['last_modified_by'] = $this->session->userdata('user_id');

                $this->admin_users_model->primary_key = array('user_id' => $this->input->post('user_id'));

                if ($this->admin_users_model->update()) {

                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'User updated successfully.');

                } else {

                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Update.');

                }

            }

            $this->session->set_flashdata('msg', $msg);

            redirect('/admin-users/');

        } else {

            $data['msg'] = $msg;

            $user_id = $this->input->post('user_id');

            if (!empty($user_id)) {

                $this->admin_users_model->primary_key = array('user_id' => $this->input->post('user_id'));

                $data['query'] = $this->admin_users_model->get_row();

            }

            $data['query'] = (object) $this->input->post();

            $data['view'] = 'admin_users/form';

            $data['title'] = 'Administrator Dashboard - Life In Goa';

            $data['page_heading'] = 'Add/Edit User';

            $data['usersrole'] = $this->admin_roles_model->view();

            $data['scripts'] = array('javascripts/adminusers.js');

            $this->load->view('templates/dashboard', $data);

        }

    }



    public function check_duplicate_email() {

        $email = $this->input->post('email');

        $user_id = $this->input->post('user_id');

        $user_id = (!empty($user_id)) ? $this->input->post('user_id') : 0;

        if ($this->admin_users_model->check_duplicate('email', $email, $user_id)) {

            $this->form_validation->set_message('check_duplicate_email', 'Sorry! Email aready exist.');

            return false;

        }

        return true;

    }



    public function check_duplicate_username() {

        $username = $this->input->post('username');

        $user_id = $this->input->post('user_id');

        $user_id = (!empty($user_id)) ? $this->input->post('user_id') : 0;

        if ($this->admin_users_model->check_duplicate('username', $username, $user_id)) {

            $this->form_validation->set_message('check_duplicate_username', 'Sorry! Username aready exist.');

            return false;

        }

        return true;

    }



    public function delete($user_id) {

        $msg = array();

        $this->admin_users_model->primary_key = array('user_id' => $user_id);

        if ($this->admin_users_model->delete()) {

            $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'User deleted successfully');

        } else {

            $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Delete.');

        }

        $this->session->set_flashdata('msg', $msg);

        redirect('/admin-users/');

    }



    public function access($user_id) {

        $accesses = array();

        $data['query'] = $this->admin_menuitems_model->view();

        $roles_accesses = $this->admin_users_accesses_model->view($user_id);

        foreach ($roles_accesses as $row) {

            $accesses[] = $row->menuitem_id;

        }

        $data['user_id'] = $user_id;

        $data['admin_users_accesses'] = $accesses;

        $data['view'] = 'admin_users/accessform';

        $data['title'] = 'Administrator Dashboard - Life In Goa';

        $data['page_heading'] = 'Users Roles';

        $data['scripts'] = array('javascripts/adminusers.js');

        $this->load->view('templates/dashboard', $data);

    }



    public function saveaccess() {

        $status = true;

      $user_id = $this->input->post('user_id'); 

        $this->admin_users_accesses_model->primary_key = array('user_id' => $user_id);

        if ($this->admin_users_accesses_model->delete()) {

            foreach ($this->input->post('menuitem_id') as $menuitem_id) {

                $this->admin_users_accesses_model->data = array('menuitem_id' => $menuitem_id, 'user_id' => $user_id);

                if ($this->admin_users_accesses_model->insert()) {

                    $status = true;

                }

            }

        }



        if ($status) {

            $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Save Changes Updated Successfully');

        } else {

            $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Delete.');

        }

        $this->session->set_flashdata('msg', $msg);

        redirect('/admin-users/');

    }



}