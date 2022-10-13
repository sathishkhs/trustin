<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Specialities extends CI_Controller {

    private $image_upload_config;
    private $icon_image_upload_config;

    public function __construct() {
        parent::__construct();
        $this->load->model('languages_model');
        $this->load->model('admin_roles_model');
        $this->load->model('admin_users_accesses_model');
        $this->load->model('admin_menuitems_model');
        $this->load->model('specialities_model');
        $this->load->model('specialities_icons_model');
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
            redirect('');
        } else {
            $_SESSION['languages'] = (!empty($_SESSION['languages'])) ? $_SESSION['languages'] : $this->languages_model->view();
            $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $this->admin_users_accesses_model->get_user_access($this->session->userdata('user_id'));
        }
        $this->image_upload_config = array('upload_path' => SPECIALITIES_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg|pdf');
        // $this->icon_image_upload_config = array('upload_path' => SPECIALITIES_ICON_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
    }

    public function index() {
       
        $data['query'] = $this->specialities_model->view();
        $data['view'] = 'specialities/list';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Specialities List';
        $data['scripts'] = array('javascripts/specialities.js');
        $this->load->view('templates/dashboard', $data);
    }

    public function add() {
       
        $data['query'] = $this->specialities_model->view();
        $data['facilities'] = $this->specialities_model->viewdata('facilities');
        $data['view'] = 'specialities/form';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Add Specialities';
        $data['scripts'] = array('javascripts/specialities.js');
        $this->load->view('templates/dashboard', $data);
    }

    public function edit($speciality_id) {
     
      //echo base_url().SPECIALITIES_ICON_UPLOAD_PATH;die;
        $this->specialities_model->primary_key = array('speciality_id' => $speciality_id);
        $specialities = $this->specialities_model->get_row();
        $specialities->facilities_id = explode(',',$specialities->facilities_id);
        $data['query'] = $specialities;
        $data['facilities'] = $this->specialities_model->viewdata('facilities');
        $data['view'] = 'specialities/form';
        $data['title'] = 'Administrator Dashboard';
        $data['page_heading'] = 'Edit User';
        $data['scripts'] = array('javascripts/specialities.js');
        $this->load->view('templates/dashboard', $data);
    }

    public function save() {
        
        $user_id = $this->session->userdata('user_id');
        if ($user_id != 1) {
            redirect('');
        }
        $msg = array();
        $this->form_validation->set_rules('speciality_name', 'Speciality Name', 'required');
        $this->form_validation->set_rules('speciality_content', 'Speciality Content', 'required');
         if(!empty($speciality_id)){
        $this->form_validation->set_rules('speciality_slug', 'Speciality Slug', 'required|callback_check_duplicate_slug');
        }
        if (!empty($_FILES['image_path']['name'])) {
                $this->form_validation->set_rules('image_path', 'Speciality Image', 'callback_check_image_width_height');
            }
        if ($this->form_validation->run() == true) {
            $this->specialities_model->data = $this->input->post();            
            $image_path = $_FILES['image_path']['name'];
            $this->upload->initialize($this->image_upload_config);
            if (!empty($image_path) && $this->upload->do_upload('image_path')) {
                $upload_data = $this->upload->data();
                $this->specialities_model->data['image_path'] = $upload_data['file_name'];
                $this->createthumbs(array($upload_data['file_name']));
            } else {
                $data['form_error']['image_path'] = $this->upload->display_errors();
            }
            $speciality_id = $this->input->post('speciality_id');
            $facilities = $this->input->post('facilities_id');
            $this->specialities_model->data['facilities_id'] = implode(',',$facilities);
            if (empty($speciality_id)) {// ADD case
                $this->specialities_model->data['created_date'] = date("Y-m-d H:i:s");
                $this->specialities_model->data['created_by'] = $this->session->userdata('user_id');
                $this->specialities_model->data['modified_date'] = date("Y-m-d H:i:s");
                $this->specialities_model->data['modified_by'] = $this->session->userdata('user_id');
                $insert_id = $this->specialities_model->insert();
                if (!empty($insert_id)) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Successfully Created.');
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to save.');
                }
            } else { // EDIT case
                $this->specialities_model->data['modified_date'] = date("Y-m-d H:i:s");
                $this->specialities_model->data['modified_by'] = $this->session->userdata('user_id');
                $this->specialities_model->primary_key = array('speciality_id' => $speciality_id);
                if ($this->specialities_model->update()) {
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'updated successfully.');
                } else {
                    $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Update.');
                }
            }
            $this->session->set_flashdata('msg', $msg);
            redirect('/specialities/');
        } else {
            $data['msg'] = $msg;
            $speciality_id = $this->input->post('speciality_id');       
            if (!empty($speciality_id)) {
                $this->specialities_model->primary_key = array('speciality_id' => $this->input->post('speciality_id'));
                $data['query'] = $this->specialities_model->get_row();
                //echo "<pre/>"; print_r($data['query']); die;
            }else {
                $data['query'] = (object) $this->input->post();
            }
            $data['view'] = 'specialities/form';
            $data['title'] = 'Administrator Dashboard';
            $data['page_heading'] = 'Add/Edit';
            $data['usersrole'] = $this->admin_roles_model->view();
            $data['scripts'] = array('javascripts/specialities.js');
            $this->load->view('templates/dashboard', $data);
        }
    }

    public function delete($speciality_id) {
        $msg = array();
        $this->specialities_model->primary_key = array('speciality_id' => $speciality_id);
        if ($this->specialities_model->delete()) {
            $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'deleted successfully');
        } else {
            $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Delete.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect('/specialities/');
    }

    public function check_duplicate_slug() {
        $speciality_slug = $this->input->post('speciality_slug');
        $speciality_id = $this->input->post('speciality_id');
        $speciality_id = (!empty($speciality_id)) ? $this->input->post('speciality_id') : 0;
        if ($this->specialities_model->check_duplicate_slug('speciality_slug', $speciality_slug, $speciality_id)) {
            $this->form_validation->set_message('check_duplicate_slug', 'Sorry! Speciality Slug aready exist.');
            return false;
        }
        return true;
    }

    public function check_image_width_height() {
        if (!empty($_FILES['image_path']['name'])) {
            $upload_file = $this->upload->data();
            $img_size = getimagesize($_FILES['image_path']['tmp_name']);
            $imgwidth = $img_size[0];
            $imgheight = $img_size[1];
            if ($imgwidth == 1350 and $imgheight == 300) {
                return true;
            } else {
                $this->form_validation->set_message('check_image_width_height', 'Sorry! Story Image Size Should be 1350px width and 300px height.');
                return false;
            }
        }
    }

    public function createthumbs($files = array()) {
        if (count($files) == 0) {
            $files = scandir(SPECIALITIES_UPLOAD_PATH);
        }
        foreach ($files as $file) {
            if (is_file(SPECIALITIES_UPLOAD_PATH . $file)) {
////Start of Resize image code
                $img_size = getimagesize(SPECIALITIES_UPLOAD_PATH . $file);
                $ratio_height = ($img_size[1] * 500 / $img_size[0]); //$img_size[0] //get image width and $img_size[1] //get image height
                $image_config['image_library'] = 'gd2';
                $image_config['source_image'] = SPECIALITIES_UPLOAD_PATH . $file;
                $image_config['new_image'] = SPECIALITIES_UPLOAD_PATH_THUMB . $file;
                $image_config['maintain_ratio'] = FALSE;
                $image_config['width'] = 500;
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

}