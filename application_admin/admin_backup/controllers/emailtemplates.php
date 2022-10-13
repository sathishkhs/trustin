<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class EmailTemplates extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('languages_model');
        $this->load->model('email_templates_model');
        $this->load->model('admin_users_accesses_model');

        $user_id = $this->session->userdata('user_id');
		
		if (empty($user_id)){
            redirect('');
        } else {
            $_SESSION['languages'] = (!empty($_SESSION['languages'])) ? $_SESSION['languages'] : $this->languages_model->view();
            $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $this->admin_users_accesses_model->get_user_access($this->session->userdata('user_id'));
        }
    }

    public function index() {
		$copy = $this->input->post('copy');
		if(!empty($copy)){
            $this->copy_multiple();
        }
		
		if($this->uri->segment(3)){
						
			$page = ($this->uri->segment(3)) ;
			}
			else{
			$page = 1;
		}
			
        //$data['query'] = $this->email_templates_model->view($this->session->userdata('lang_id'));
        $total_rows = $this->email_templates_model->rows_count();
		$per_page = $limit = 50;
		
        $data['query'] = $this->pagination('emailtemplates/index', $total_rows, $per_page, $this->email_templates_model->fetch_data(($page-1)*$limit,$limit), ($this->session->userdata('lang_id')));
        $data['view'] = 'email_templates/list';
        $data['title'] = 'Administrator Dashboard - Tour Hog Admin';
        $data['page_heading'] = 'Email Templates List';
		$data['scripts'] = array('js/jquery.dataTables.min.js','js/emailtemplates.js');
		$data['styles'] = array('css/jquery.dataTables.min.css');
        $this->load->view('templates/dashboard', $data);
    }

    public function add() {
        $data['view'] = 'email_templates/form';
        $data['title'] = 'Administrator Dashboard - Tour Hog Admin';
        $data['page_heading'] = 'Add Email Templates';
        $data['scripts'] = array('javascripts/emailtemplate.js','js/ckeditor/ckeditor.js');
        $this->load->view('templates/dashboard', $data);
    }

    public function edit($template_id) {
        $this->email_templates_model->primary_key = array('template_id' => $template_id, 'lang_id' => $this->session->userdata('lang_id'));
        $data['query'] = $this->email_templates_model->get_row();
		
        $data['view'] = 'email_templates/form';
        $data['title'] = 'Administrator Dashboard - Tour Hog Admin';
        $data['page_heading'] = 'Edit Email Templates';
        $data['scripts'] = array('javascripts/emailtemplate.js','js/ckeditor/ckeditor.js');
        $this->load->view('templates/dashboard', $data);
    }

    public function save() {
        $msg = array();
        $this->form_validation->set_rules('template_title', 'Template Title', 'required');
        $this->form_validation->set_rules('template_content', 'Template Content', 'required');
        $template_id = $this->input->post('template_id');
        $new_template_id = $this->email_templates_model->get_max_value('template_id') + 1;
        $this->email_templates_model->data = $this->input->post();
        //mutlti-language is starting..
        //$languages = $this->input->post('languages');
        //unset($this->email_templates_model->data['languages']);

        if ($this->form_validation->run() == true) {

          //  foreach ($languages as $lang_id) {
                if (empty($template_id)) { // ADD case
                    $this->email_templates_model->data['template_id'] = $new_template_id;
                    $this->email_templates_model->data['lang_id'] = 1;
                    $this->email_templates_model->data['created_date'] = date("Y-m-d H:i:s");
                    $this->email_templates_model->data['created_by'] = $this->session->userdata('user_id');
                    $this->email_templates_model->data['last_modified_date'] = date("Y-m-d H:i:s");
                    $this->email_templates_model->data['last_modified_by'] = $this->session->userdata('user_id');

                    if ($this->email_templates_model->insert()) {
                        $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Record updated successfully.');
                    } else {
                        $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Update.');
                    }
                } else { // EDIT case
                    $this->email_templates_model->data['last_modified_date'] = date("Y-m-d H:i:s");
                    $this->email_templates_model->data['last_modified_by'] = $this->session->userdata('user_id');

                    $this->email_templates_model->primary_key = array('template_id' => $this->input->post('template_id'));
                    if ($this->email_templates_model->is_exist()) {
                        unset($this->email_templates_model->data['template_id']);
                        unset($this->email_templates_model->data['lang_id']);
                        if ($this->email_templates_model->update()) {
                            $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Record updated successfully.');
                        } else {
                            $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Update.');
                        }
                    } else {
                        $this->email_templates_model->data['template_id'] = $this->input->post('template_id');
                        $this->email_templates_model->data['lang_id'] = $lang_id;
                        $this->email_templates_model->data['created_date'] = date("Y-m-d H:i:s");
                        $this->email_templates_model->data['created_by'] = $this->session->userdata('user_id');
                        $this->email_templates_model->insert();
                    }
                }
           //}
            $this->session->set_flashdata('msg', $msg);
            redirect('/email-templates/');
        } else {
            $template_id = $this->input->post('template_id');
            if (!empty($template_id)) {
                $this->email_templates_model->primary_key = array('template_id' => $this->input->post('template_id'), 'lang_id' => $this->session->userdata('lang_id'));
                $data['query'] = $this->email_templates_model->get_row();
            }
            $data['query'] = (object) $this->input->post();
            $data['view'] = 'email_templates/form';
            $data['title'] = 'Administrator Dashboard - Tour Hog Admin';
            $data['page_heading'] = 'Add/Edit Email Templates';
            $data['scripts'] = array('javascripts/emailtemplates.js');
            $this->load->view('templates/dashboard', $data);
        }
    }

    public function delete($template_id) {
        $msg = array();
        $this->email_templates_model->primary_key = array('template_id' => $template_id, 'lang_id' => $this->session->userdata('lang_id'));
        if ($this->email_templates_model->delete()) {
            $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Record deleted successfully');
        } else {
            $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Delete.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect('/email-templates/');
    }
	
	public function copy_multiple() {
        $template_ids = $this->input->post('template_ids');
        $copy_lang_id_to = $this->input->post('copy_lang_id_to');
        $msg = array();
        if ($this->email_templates_model->copy_multiple($template_ids, $this->session->userdata('lang_id'), $copy_lang_id_to)) {
            $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Record copied successfully');
        } else {
            $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to copied.');
        }
        $this->session->set_flashdata('msg', $msg);
        redirect('/email-templates/');
    }
	
	public function pagination($path, $count, $per_page, $fetch_query){
		//pagination
		$this->load->library('pagination');

		$config['base_url'] = base_url().$path;
		$config['total_rows'] = $count;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
			$config['use_page_numbers'] = TRUE;
		
		$config['full_tag_open'] = "<div class='pagination pagination-sm no-margin'>";
		$config['full_tag_close'] = "</div>";
		
		$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = "<li><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
		
		$this->pagination->initialize($config);
		//echo $this->pagination->create_links(); 
		//$this->admin_users_model->fetch_data( ($page-1) * $config["per_page"], $config["per_page"])
		$data = $fetch_query;	
		
		return $data;
	}
}