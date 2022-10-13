<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    private $image_upload_config;
    private $icon_image_upload_config;
    public $class_name;
    private $linkid = 3;

    public function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->classname = ucfirst($this->class_name);
        $this->class = "Pages";
        $this->randoms = mt_rand(125, 854) . '.' . mt_rand(346, 889);
        /* these are the default modules to load in all controller */
        $this->load->model('Admin_users_model');
        $this->load->model('Admin_menuitems_model');
        $this->load->model('Admin_users_accesses_model');
        /* these are the default modules to load in all controller */
        $this->load->model('Pages_model');
        $this->load->model('Page_types_model');
        $this->load->model('Templates_model');
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
        $this->image_upload_config = array('upload_path' => PAGES_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
    }

    public function index() {
        $msg = array();
        $data['query'] = $this->Pages_model->view();
//echo "<pre/>"; print_r( $data['query']); die;
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
            $data['templates'] = $this->Templates_model->view();
            $data['page_type'] = $this->Page_types_model->page_type();
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

    public function edit($page_id) {
        if ($this->permission[1] > 0) {
            if (!empty($page_id)) {
                $this->Pages_model->primary_key = array('page_id' => $page_id);
                $data['query'] = $this->Pages_model->get_row();
                //echo "<pre/>"; print_r( $data['query']); die;
                $data['templates'] = $this->Templates_model->view();
                $data['page_type'] = $this->Page_types_model->page_type();
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
            $page_id = $this->input->post('page_id', true);
            $msg = array();
            $data['form_danger']['page_path'] = '';
            $this->form_validation->set_rules('type_id', 'Page Type', 'required');
            $this->form_validation->set_rules('page_title', 'Page Title', 'required');
            $this->form_validation->set_rules('template_id', 'Template', 'required');
            if ($this->input->post('canonical_index') == 1) {
                $this->form_validation->set_rules('canonical_url', 'Canonical Url', 'required');
            }
            $this->form_validation->set_rules('page_slug', 'Page Slug', 'required|callback_check_duplicate_slug');

            if (!empty($_FILES['page_path']['name'])) {
                $this->form_validation->set_rules('page_path', 'Page Image', 'callback_check_image_width_height');
            }
            if ($this->form_validation->run() == true) {
                $this->Pages_model->data = $this->input->post();
                $title = ucwords(strtolower($this->input->post('page_title', TRUE)));
//==========imgage upload code begins here ========
                if (!empty($_FILES['page_path']['name']) && $this->security->xss_clean($_FILES['page_path']['name'], TRUE)) {
                    $this->upload->initialize($this->image_upload_config);
                    if ($this->upload->do_upload('page_path')) {
                        $upload_data = $this->upload->data();
                        $this->Pages_model->data['page_path'] = $upload_data['file_name'];
                        $this->createthumbs(array($upload_data['file_name']));
                        $this->createthumbs_2(array($upload_data['file_name']));
                    } else {
                        $data['form_danger']['page_path'] = $this->upload->display_dangers();
                    }
                }
//========imgage upload code end here ======
                if (empty($page_id)) { // ADD case
                    $this->Pages_model->data['created_date'] = date("Y-m-d H:i:s");
                    $this->Pages_model->data['created_by'] = $this->session->userdata('user_id');
                    $this->Pages_model->data['last_modified_date'] = date("Y-m-d H:i:s");
                    $this->Pages_model->data['last_modified_by'] = $this->session->userdata('user_id');
                    $insert_id = $this->Pages_model->insert();
                    if (!empty($insert_id)) {
                        $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Record added successfully.');
                    } else {
                        $msg = array('type' => 'danger', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to save.');
                    }
                } else { // EDIT case
                    $this->Pages_model->data['last_modified_date'] = date("Y-m-d H:i:s");
                    $this->Pages_model->data['last_modified_by'] = $this->session->userdata('user_id');
                    $this->Pages_model->primary_key = array('page_id' => $page_id);
                    if ($this->Pages_model->update()) {
                        $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Record updated successfully.');
                    } else {
                        $msg = array('type' => 'danger', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Update.');
                    }
                }
                $this->session->set_flashdata('msg', $msg);
                redirect("/$this->class_name/");
            } else {
                $data['page_type'] = $this->Page_types_model->page_type();
                $data['templates'] = $this->Templates_model->view();
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

    public function delete($page_id) {
        $msg = array();
        if (!empty($page_id) && $this->permission[2] > 0) {
            $this->Pages_model->primary_key = array('page_id' => $page_id);
            if ($this->Pages_model->delete()) {
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

    public function check_image_width_height() {
        if (!empty($_FILES['page_path']['name'])) {
            $upload_file = $this->upload->data();
            $img_size = getimagesize($_FILES['page_path']['tmp_name']);
            $imgwidth = $img_size[0];
            $imgheight = $img_size[1];
            if ($imgwidth == 1350 and $imgheight == 330) {
                return true;
            } else {
                $this->form_validation->set_message('check_image_width_height', 'Sorry! Story Image Size Should be 1350px width and 330px height.');
                return false;
            }
        }
    }

    public function createthumbs($files = array()) {
        if (count($files) == 0) {
            $files = scandir(PAGES_UPLOAD_PATH);
        }
        foreach ($files as $file) {
            if (is_file(PAGES_UPLOAD_PATH . $file)) {
////Start of Resize image code
                $img_size = getimagesize(PAGES_UPLOAD_PATH . $file);
                $ratio_height = ($img_size[1] * 480 / $img_size[0]); //$img_size[0] //get image width and $img_size[1] //get image height
                $image_config['image_library'] = 'gd2';
                $image_config['source_image'] = PAGES_UPLOAD_PATH . $file;
                $image_config['new_image'] = PAGES_UPLOAD_PATH_THUMB . $file;
                $image_config['maintain_ratio'] = FALSE;
                $image_config['width'] = 480;
                $image_config['height'] = round($ratio_height);
                $image_config['x_axis'] = '100';
                $image_config['y_axis'] = '100';
                $this->image_lib->clear();
                $this->image_lib->initialize($image_config);
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_dangers();
                }
//Resize image code end
//thumbs-slider code end here
            }
        }
    }

    public function createthumbs_2($files = array()) {
        if (count($files) == 0) {
            $files = scandir(PAGES_UPLOAD_PATH);
        }
        foreach ($files as $file) {
            if (is_file(PAGES_UPLOAD_PATH . $file)) {
////Start of Resize image code
                $img_size = getimagesize(PAGES_UPLOAD_PATH . $file);
                $ratio_height = ($img_size[1] * 360 / $img_size[0]); //$img_size[0] //get image width and $img_size[1] //get image height
                $image_config['image_library'] = 'gd2';
                $image_config['source_image'] = PAGES_UPLOAD_PATH . $file;
                $image_config['new_image'] = PAGES_UPLOAD_PATH_THUMB_2 . $file;
                $image_config['maintain_ratio'] = FALSE;
                $image_config['width'] = 360;
                $image_config['height'] = round($ratio_height);
                $image_config['x_axis'] = '100';
                $image_config['y_axis'] = '100';
                $this->image_lib->clear();
                $this->image_lib->initialize($image_config);
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_dangers();
                }
//Resize image code end
//thumbs-slider code end here
            }
        }
    }

    public function check_duplicate_slug() {
        $page_slug = $this->input->post('page_slug');
        $page_id = $this->input->post('page_id');
        $page_id = (!empty($page_id)) ? $this->input->post('page_id') : 0;
        if ($this->Pages_model->check_duplicate_slug('page_slug', $page_slug, $page_id)) {
            $this->form_validation->set_message('check_duplicate_slug', 'Sorry! Page Slug aready exist.');
            return false;
        }
        return true;
    }

}
