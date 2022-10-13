<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Index extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('languages_model');
        $this->load->model('admin_users_model');
        $this->load->model('admin_users_accesses_model');
        $this->load->model('email_templates_model');
    }
    public function index() {
        $msg = array();
        $user_id = $this->session->userdata('user_id');
        if (!empty($user_id)) {
            redirect('dashboard');
        }
        $this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
        if ($this->form_validation->run()) {
            $login_status = (array) $this->admin_users_model->login($this->input->post());
            if (count($login_status) == 0) {
                $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Invalid Username and Password!');
                $this->session->set_flashdata('msg', $msg);
                redirect('');
            } else {
                $login_status['lang_id'] = 1;
                $this->session->set_userdata($login_status);
                $_SESSION['languages'] = (!empty($_SESSION['languages'])) ? $_SESSION['languages'] : $this->languages_model->view();
                $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $this->admin_users_accesses_model->get_user_access($this->session->userdata('user_id'));
                $member = $this->input->post('remember');
                if (!empty($member)) {
                    $this->input->set_cookie('username', $this->input->post('username'), 3600 * 24 * 365, $_SERVER['HTTP_HOST'], '/');
                    $this->input->set_cookie('password', $this->input->post('password'), 3600 * 24 * 365, $_SERVER['HTTP_HOST'], '/');
                }
                redirect('dashboard');
            }
        }
        $data['view'] = 'index/index';
        $data['title'] = 'Login Page Trust-in Hospital';
        $data['scripts'] = array('');
        $this->load->view('templates/default', $data);
    }
    public function dashboard() {
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
            redirect('');
        }else{
            $_SESSION['languages'] = (!empty($_SESSION['languages'])) ? $_SESSION['languages'] : $this->languages_model->view();
            $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $this->admin_users_accesses_model->get_user_access($this->session->userdata('user_id'));
        }
        $data['view'] = 'index/dashboard';
        $data['title'] = 'Administrator Dashboard - Trust-in Hospital';
        $data['page_heading'] = 'Welcome to Administrative Panel';
        $data['scripts'] = array('js/pages/dashboard2.js');
        $this->load->view('templates/dashboard', $data);
    }
    public function forgotpassword() {
        $msg = array();
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run()) {
            $valid_email = $this->admin_users_model->is_exist($this->input->post());
            if (count($valid_email) == 0) {
                $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Invalid email! Please try again.');
            } else {
                $new_password = random_string('alnum', 8);
                $this->admin_users_model->data = array('password' => $new_password);
                $this->admin_users_model->primary_key = array('user_id' => $valid_email->user_id);
                if ($this->admin_users_model->update()) {
                    //IMP to add this two line for sending html email
                    $email_setting = array('mailtype' => 'html');
                    $this->email->initialize($email_setting);
                    //IMP
                    $this->email->to($valid_email->email);
                    $this->email->from('admin@akshayapatra.com');
                    //$this->email->subject('Password Reminder');
                    $this->email_templates_model->primary_key = array('template_id' => 3);
                    $emailtemplate = $this->email_templates_model->get_row();
                    $this->email->subject($emailtemplate->template_title);
                    $emailmsg = $emailtemplate->template_content;
                    $emailmsg = str_replace('##USERNAME##', $valid_email->username, $emailmsg);
                    $emailmsg = str_replace('##PASSWORD##', $new_password, $emailmsg);
                    $emailmsg = str_replace('##LOGIN_LINK##', base_url(), $emailmsg);
                    $this->email->message($emailmsg);
                    if ($this->email->send()) {
                        $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Password sent to your email.');
                    } else {
                        $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to send email.');
                    }
                }
            }
            $this->session->set_flashdata('msg', $msg);
            redirect('forgot-password');
        }
        $data['view'] = 'index/forgot_password';
        $data['title'] = 'Admin Forgot Password - Trust-in Hospital';
        $data['page_heading'] = 'Admin Forgot Password';
        $data['scripts'] = array('js/index.js');
        $this->load->view('templates/default', $data);
    }
    public function logout() {
        $this->session->sess_destroy();
        session_destroy();
        redirect('');
    }
    public function changelanguage() {
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
            redirect('');
        }else{
            $_SESSION['languages'] = (!empty($_SESSION['languages'])) ? $_SESSION['languages'] : $this->languages_model->view();
            $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $this->admin_users_accesses_model->get_user_access($this->session->userdata('user_id'));
        }
        $redirect_page = $this->input->post('redirectPage');
        $default_language = array('lang_id' => $this->input->post('defaultLanguage'));
        $this->session->set_userdata($default_language);
        redirect($redirect_page);
    }
	public function register(){
        $this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
        if ($this->form_validation->run()) {
            $login_status = (array) $this->admin_users_model->login($this->input->post());
            if (count($login_status) == 0) {
                $msg = array('type' => 'error', 'icon' => 'icon-remove red', 'txt' => 'Invalid Username and Password!');
                $this->session->set_flashdata('msg', $msg);
                redirect('');
            } else {
                redirect('dashboard');
            }
        }
        $data['view'] = 'index/register';
        $data['title'] = 'Login Page - Trust-in Hospital'; 
        $data['scripts'] = array('');
        $this->load->view('templates/default', $data);
	}
}