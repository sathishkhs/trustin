<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->randoms = mt_rand(125, 854) . '.' . mt_rand(346, 889);
        $this->load->model('Admin_users_model');
        $this->load->model('Admin_users_accesses_model');
        $this->load->model('Admin_users_session_model');
        $this->load->model('Email_templates_model');
    }

    public function index() {
        $msg = array();
        $user_id = $this->session->userdata('user_id');
        if (!empty($user_id)) {
            redirect('dashboard');
        }
        if (!empty($_POST)) {
            $this->form_validation->set_rules('username', 'Email Address', 'trim|required|valid_email|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
            if ($this->form_validation->run() == true) {
                $login_detail = (array) $this->Admin_users_model->login($this->security->xss_clean($this->input->post(), TRUE));
                if (!empty($login_detail)) {
                    $user_session_id = md5(mt_rand(1236597485, mt_getrandmax()));
                    //$new_otp = $this->generateRandomString(6);
                    /* $this->Admin_users_model->primary_key = array('sessions_id' => $user_session_id);
                      $user_details = $this->Admin_users_model->get_user(); */
                    $this->Admin_users_model->data['sessions_id'] = $user_session_id;
                    $this->Admin_users_model->data['last_login'] = date('Y-m-d H:i:s');
                    $this->Admin_users_model->primary_key = array('user_id' => $login_detail['user_id']);
                    $this->Admin_users_model->update();
                    $login_status['lang_id'] = 1;
                    $this->session->set_userdata($login_status);
                    $_SESSION['login_status'] = $login_status;
                    $this->session->set_userdata($login_detail);
                    $member = $this->input->post('remember');
                    if (!empty($member)) {
                        $this->input->set_cookie('username', $this->input->post('username'), 3600 * 24 * 365, $_SERVER['HTTP_HOST'], '/');
                        $this->input->set_cookie('password', $this->input->post('password'), 3600 * 24 * 365, $_SERVER['HTTP_HOST'], '/');
                    }
                    redirect('dashboard');
                } else {
                    $msg = array('txt' => 'Invalid Email Address and Password!');
                    $this->session->set_flashdata('msg', $msg);
                    redirect('');
                }
            }
        }
        $data['view'] = 'index/index';
        $data['title'] = 'Login Page - ' . SITE_TITLE;
        $this->load->view('templates/default', $data);
    }

    public function forgot_password() {
        $msg = array();
        $user_id = $this->session->userdata('user_id');
        if (!empty($user_id)) {
            redirect('dashboard');
        }
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email|xss_clean');
        if ($this->form_validation->run() == true) {
            $email_address = $this->input->post('email_address', TRUE);
            if ($this->Admin_users_model->forgot_password()) {
                //$new_password = $this->generateRandomString(6);
                $new_password = $this->get_random_password();
                $this->Admin_users_model->data['password'] = md5($new_password);
                $this->Admin_users_model->data['modified_date'] = date('Y-m-d H:i:s');
                $this->Admin_users_model->primary_key = array('email' => $email_address);
                $this->Admin_users_model->update();
                //IMP to add this two line for sending html email
                $email_setting = array('mailtype' => 'html');
                $this->email->initialize($email_setting);
                //IMP
                $this->Email_templates_model->primary_key = array('template_id' => 1);
                $emailtemplate = $this->Email_templates_model->get_row();
                $this->email->to($email_address);
                $this->email->cc($emailtemplate->cc);
                $this->email->bcc($emailtemplate->bcc);
                $this->email->from($emailtemplate->from);
                $this->email->subject($emailtemplate->template_title);
                $emailmsg = $emailtemplate->template_content;
                $emailmsg = str_replace('##EMAIL##', $email_address, $emailmsg);
                $emailmsg = str_replace('##PASSWORD##', $new_password, $emailmsg);
                $this->email->message($emailmsg);
                $this->email->send();
                $msg = array('type' => 'success', 'txt' => 'Password sent to your email id!');
                $this->session->set_flashdata('msg', $msg);
                redirect('forgot-password');
            } else {
                $msg = array('type' => 'danger', 'txt' => 'Invalid Email Address');
                $this->session->set_flashdata('msg', $msg);
                redirect('forgot-password');
            }
        }
        $data['view'] = 'index/forgot_password';
        $data['title'] = 'Login Page - ' . SITE_TITLE;
        $this->load->view('templates/default', $data);
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function get_random_password($chars_min = 10, $chars_max = 12, $use_upper_case = true, $include_numbers = true, $include_special_chars = true) {
        $length = rand($chars_min, $chars_max);
        $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
        if ($include_numbers) {
            $selection .= "1234567890";
        }
        if ($include_special_chars) {
            $selection .= "!@#$%&";
        }

        $password = "";
        for ($i = 0; $i < $length; $i++) {
            $current_letter = $use_upper_case ? (rand(0, 1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];
            $password .= $current_letter;
        }

        return $password;
    }

    public function dashboard() {
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id))
            redirect('logout');
        //echo "<pre>"; print_r($data['users_log'] ); die;
        $this->Admin_users_model->primary_key = array('user_id' => $user_id);
        $user_session_id = $this->Admin_users_model->session_id();
        if (empty($user_id) && $this->session->userdata['logged_session_id'] != $user_session_id) {
            redirect('');
        } else {
            $_SESSION['sidebar_menuitems'] = (!empty($_SESSION['sidebar_menuitems'])) ? $_SESSION['sidebar_menuitems'] : $this->Admin_users_accesses_model->get_user_access($user_id);
        }
        //echo "<pre/>";print_r($data['donations']); die;
        $data['post_data'] = (object) $this->input->post();
        $data['view'] = 'dashboard/index';
        $data['title'] = 'Administrator Dashboard -' . SITE_TITLE;
        $data['page_heading'] = 'Welcome to Administrative';
        $data['sub_heading'] = 'Control panel';
        $data['breadcrumb'] = "Dashboard";
        $data['scripts'] = array('javascripts/dashboard.js?v=' . $this->randoms, 'javascripts/admin_index.js?v=' . $this->randoms);
        $this->load->view('templates/dashboard', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        //session_destroy();
        redirect('');
    }

}
