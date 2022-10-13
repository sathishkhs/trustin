<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Adminusers extends CI_Controller {

    public $class_name;
    private $linkid = 1;

    public function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->classname = ucfirst($this->class_name);
        $this->class = "Admin User";
        $this->randoms = mt_rand(125, 854) . '.' . mt_rand(346, 889);
        /* these are the default modules to load in all controller */
        $this->load->model('Admin_roles_model');
        $this->load->model('Admin_users_model');
        $this->load->model('Admin_menuitems_model');
        $this->load->model('Admin_users_accesses_model');
        /* these are the default modules to load in all controller */
        $this->load->model('Pages_model');
        $this->load->model('Menuitems_model');
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
        $msg = array();
        $data['view'] = $this->class_name . '/users_list';
        $data['query'] = $this->Admin_users_model->view();
        $data['title'] = $this->classname . ' Page - ' . SITE_TITLE;
        $data['page_heading'] = $this->class . ' List';
        $data['breadcrumb'] = $this->class . " List";
        $data['scripts'] = array('javascripts/' . $this->class_name . '.js?v=' . $this->randoms, 'javascripts/dashboard.js?v=' . $this->randoms);
        $this->load->view('templates/dashboard', $data);
    }

    public function add() {
        $role_id = $this->session->userdata('role_id');
        if ($this->permission[0] > 0 && $role_id == 1) {
            $msg = array();
            $data['roles'] = $this->Admin_roles_model->view_roles();
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

    public function edit($admin_user_id) {
        if ($this->permission[1] > 0) {
            if (!empty($admin_user_id)) {
                $this->Admin_users_model->primary_key = array('user_id' => $admin_user_id);
                $data['query'] = $this->Admin_users_model->get_row();
                $data['roles'] = $this->Admin_roles_model->view_roles();
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
            $admin_user_id = $this->input->post('user_id');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_duplicate_email');
            //$this->form_validation->set_rules('mobile', 'Contact', 'required|min_length[10]|max_length[12]');
            $this->form_validation->set_rules('role_id', 'User Role', 'required');
           // $this->form_validation->set_rules('access_type_id', 'Page Access User Type', 'required');
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
                } else {
                    $this->Admin_users_model->data['username'] = $this->input->post('email');
                    $this->Admin_users_model->data['password'] = md5($this->input->post('password'));
                    $this->Admin_users_model->data['created_date'] = date('Y-m-d : H:i:s');
                    $this->Admin_users_model->data['created_by'] = $this->session->userdata('user_id');
                    $insert_id = $this->Admin_users_model->insert();
                    if (!empty($insert_id)) {
                        $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Added Successfully');
                        redirect("/$this->class_name/access/$insert_id");
                    } else {
                        $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Add Record.');
                    }
                }
                //echo "<pre>"; print_r($_POST); die;
                $this->session->set_flashdata('msg', $msg);
                redirect("/$this->class_name/");
            } else {
                $data['roles'] = $this->Admin_roles_model->view_roles();
                $data['query'] = (object) $this->input->post();
                $data['view'] = $this->class_name . '/form';
                $data['title'] = 'Add New ' . $this->class . ' - ' . SITE_TITLE;
                $data['breadcrumb'] = '<a href=' . $this->class_name . '>' . $this->class . ' List</a> &nbsp;&nbsp; / &nbsp;&nbsp; Add New ' . $this->class;
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

    public function delete($user_id) {
        if (!empty($user_id) && $this->permission[2] > 0) {
            $this->Admin_users_model->primary_key = array('user_id' => $user_id);
            $page = $this->Admin_users_model->get_row();
            $this->Admin_users_model->data['status_ind'] = 3;
            $this->Admin_users_model->data['modified_date'] = date('Y-m-d H:i:s');
            $this->Admin_users_model->data['modified_by'] = $this->session->userdata('user_id');
            $this->Admin_users_model->primary_key = array('user_id' => $user_id);
            if ($this->Admin_users_model->update()) {
                /* USER LOG DETAILS CODE BEGINS HERE */
                $this->userlog($this->classname, USER_LOG_4, $user_id, $page->first_name);
                /* USER LOG DETAILS CODE END HERE */
                $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Deleted Successfully');
            } else {
                $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Add Record.');
            }
        } else {
            $msg = array();
            $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! You do not have the permission.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect("/$this->class_name/");
    }

    public function userlog($classname, $opr_det, $pages_id, $link = 'adminusers', $view_type = 2) {
        $this->load->model('User_logs_model');
        $this->User_logs_model->insert($classname, $opr_det, $pages_id, $link, $view_type);
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

//USER MENU PERMISSION VIEW ACCESS CODE BEGINS HERE
    public function access($user_id) {
        if (!empty($user_id) && ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2)) {
            $accesses = array();
            $data['query'] = $this->Admin_menuitems_model->view();

            $menu_id = 1;
            $menuitems = $this->Menuitems_model->get_menuitems($menu_id, null);
            for ($i = 0; $i < count($menuitems); $i++) {
                $menuitems[$i]->submenu = $this->Menuitems_model->get_menuitems($menu_id, $menuitems[$i]->menuitem_id);
                for ($j = 0; $j < count($menuitems[$i]->submenu); $j++) {
                    $menuitems[$i]->submenu[$j]->submenu = $this->Menuitems_model->get_menuitems($menu_id, $menuitems[$i]->submenu[$j]->menuitem_id);
                }
            }
            $data['menuitems'] = $menuitems;
            //echo "<pre>"; print_r($data['menuitems']); die;
            // $menuitems_2 = $this->Menuitems_model->get_menuitems_2($menu_id, null, $this->session->userdata('lang_id'));
            //$data['menuitems_2'] = $menuitems_2;
            // $data['menuitems'] = array_merge($data["menuitems1"], $data['menuitems_2']);
            $roles_accesses = $this->Admin_users_accesses_model->view($user_id);
            foreach ($roles_accesses as $row) {
                $accesses[] = $row->menuitem_id;
            }
            $this->Admin_users_model->primary_key = array('user_id' => $user_id);
            $data['users'] = $this->Admin_users_model->get_row();
            $data['user_id'] = $user_id;
            $data['admin_users_accesses'] = $accesses;
            $data['view'] = $this->class_name . '/accessform';
            $data['title'] = $this->class . ' Access - ' . SITE_TITLE;
            $data['page_heading'] = $this->class . ' Access';
            $data['breadcrumb'] = $this->class . ' Access';
            $data['scripts'] = array('javascripts/' . $this->class_name . '.js?v=' . $this->randoms, 'javascripts/dashboard.js?v=' . $this->randoms);
            $this->load->view('templates/dashboard', $data);
        } else {
            $msg = array();
            $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! You do not have the permission.');
            $this->session->set_flashdata('msg', $msg);
            redirect("/$this->class_name/");
        }
    }

//USER MENU PERMISSION VIEW ACCESS CODE END HERE
//USER PERMISSION ACCESS FOR ADD/EDIT OR DELETE CODE BEGINS HERE
    public function permission($user_id) {
        if (!empty($user_id) && ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2)) {
            $accesses = array();
            //$data['query'] = $this->admin_menuitems_model->view();
            $roles_accesses = $this->Admin_users_accesses_model->view_access($user_id);
            foreach ($roles_accesses as $row) {
                $accesses[] = $row->menuitem_id;
            }
            $this->Admin_users_model->primary_key = array('user_id' => $user_id);
            $data['users'] = $this->Admin_users_model->get_row();
            $data['user_id'] = $user_id;
            $data['query'] = $roles_accesses; //$_SESSION['sidebar_menuitems'];
            $data['view'] = $this->class_name . '/permissionform';
            $data['title'] = $this->class . ' Access - ' . SITE_TITLE;
            $data['page_heading'] = $this->class . ' Access';
            $data['breadcrumb'] = $this->class . ' Access';
            $data['scripts'] = array('javascripts/' . $this->class_name . '.js?v=' . $this->randoms, 'javascripts/dashboard.js?v=' . $this->randoms);
            $this->load->view('templates/dashboard', $data);
        } else {
            $msg = array();
            $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! You do not have the permission.');
            $this->session->set_flashdata('msg', $msg);
            redirect("/$this->class_name/");
        }
    }

//USER PERMISSION ACCESS FOR ADD/EDIT OR DELETE CODE BEGINS HERE
//USER MENU PERMISSION ACCESS SAVE ACTION CODE BEGINS HERE
    public function saveaccess() {
        if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2) {
            $user_id = $this->input->post('user_id');
            $this->Admin_users_model->primary_key = array('user_id' => $user_id);
            $users = $this->Admin_users_model->get_row();
            $this->Admin_users_accesses_model->primary_key = array('user_id' => $user_id);
            if ($this->Admin_users_accesses_model->delete()) {
                $status = 1;
                foreach ($this->input->post('menuitem_id') as $menuitem_id) {
                    $this->Admin_users_accesses_model->data = array('menuitem_id' => $menuitem_id, 'add_permission' => 1, 'edit_permission' => 1, 'delete_permission' => 1, 'user_id' => $user_id);
                    if ($this->Admin_users_accesses_model->insert()) {
                        $status = 1;
                    }
                }
            }
            if ($status == 1) {
                $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Successfully Assigned the menu to user');
                $this->session->set_flashdata('msg', $msg);
                //redirect("/$this->class_name/permission/$user_id");
            } else {
                $msg = array('type' => 'danger', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Assigned the menu to user. please try again.');
            }
        } else {
            $msg = array();
            $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! You do not have the permission.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect("/$this->class_name/");
    }

//USER MENU PERMISSION ACCESS SAVE ACTION CODE END HERE
//USER MENU PERMISSION ACCESS FOR ADD/EDIT OR DELETE SAVE ACTION CODE BEGINS HERE
    public function savepermission() {
        if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2) {
            $status = true;
            $user_id = $this->input->post('user_id');
            $menuitem_ids = $this->input->post('menuitem_id');
            $i = 0;
            foreach ($menuitem_ids as $menuitem_id) {
                $add_permission = $this->input->post('add_permission');
                if (!empty($add_permission[$i])) {
                    $add_permission = $add_permission[$i];
                } else {
                    $add_permission = 0;
                }
                if (!empty($this->input->post('edit_permission')[$i])) {
                    $edit_permission = $this->input->post('edit_permission')[$i];
                } else {
                    $edit_permission = 0;
                }
                if (!empty($this->input->post('delete_permission')[$i])) {
                    $delete_permission = $this->input->post('delete_permission')[$i];
                } else {
                    $delete_permission = 0;
                }
                /* if (!empty($this->input->post('view_permission')[$i])) {
                  $view_permission = $this->input->post('view_permission')[$i];
                  } else {
                  $view_permission = 0;
                  } */
                $this->Admin_users_accesses_model->data = array('add_permission' => $add_permission, 'edit_permission' => $edit_permission, 'delete_permission' => $delete_permission);
                $this->Admin_users_accesses_model->primary_key = array('menuitem_id' => $menuitem_id, 'user_id' => $user_id);
                if ($this->Admin_users_accesses_model->update()) {
                    $status = true;
                }
                $i++;
            }
            if ($status) {
                $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Save Changes Updated Successfully');
            } else {
                $msg = array('type' => 'danger', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Delete.');
            }
        } else {
            $msg = array();
            $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! You do not have the permission.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect("/$this->class_name/");
    }

//USER MENU PERMISSION ACCESS FOR ADD/EDIT OR DELETE SAVE ACTION CODE END HERE
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
        $user_id = (!empty($user_id)) ? $user_id : 0;
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

    public function createthumbs_2($files = array()) {
        if (count($files) == 0) {
            $files = scandir(USER_PHOTO_UPLOAD_PATH);
        }
        foreach ($files as $file) {
            if (is_file(USER_PHOTO_UPLOAD_PATH . $file)) {
                //Start of Resize image code
                $image_config['image_library'] = 'gd2';
                $image_config['source_image'] = USER_PHOTO_UPLOAD_PATH . $file;
                $image_config['new_image'] = USER_PHOTO_UPLOAD_PATH_THUMB_2 . $file;
                $image_config['maintain_ratio'] = FALSE;
                $image_config['width'] = 496;
                $image_config['height'] = 260;
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
