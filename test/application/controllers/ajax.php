<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('widget_areas_model');
        //$this->load->model('feedbacks_model');
        $this->load->model('states_model');
        $this->load->model('users_model');
        $this->load->model('settings_model');
        $this->load->model('email_templates_model');
        //$this->load->model('newsletter_subscribers_model');
        $this->load->model('email_templates_model');
       // $this->load->model('subdomains_model');
        $this->load->model('phrases_model');
        $this->settings = $this->settings_model->view($this->session->userdata('app_lang_id'));
        $this->phrases = $this->phrases_model->view($this->session->userdata('app_lang_id'));
    }

    public function index() {
        //echo "No direct access....";
        echo $this->phrases->USERS['NO_DIRECT_ACCESS'];
    }

    /*public function newslettersubscribe() {
        $this->newsletter_subscribers_model->data = $this->input->post();
        $this->newsletter_subscribers_model->data['created_date'] = date("Y-m-d H:i:s");
        $this->newsletter_subscribers_model->data['modified_date'] = date("Y-m-d H:i:s");
        $this->newsletter_subscribers_model->data['ip_address'] = $_SERVER['HTTP_HOST'];
        $email_id = $this->input->post('email');
        $is_subscribed = count($this->newsletter_subscribers_model->check_duplicate('email', $email_id));
        if (!empty($is_subscribed)) {
            //echo "Already Subscriber!";
            echo $this->phrases->USERS['ALREADY_SUBSCRIBER'];
        } else {
            if ($this->newsletter_subscribers_model->insert()) {
                //echo "Thanks for Subscription!";
                echo $this->phrases->USERS['THANKS_FOR_SUBSCRIPTION'];
            } else {
                //echo "Failed to Subscribe!";
                echo $this->phrases->USERS['FAILED_TO_SUBSCRIBER'];
            }
        }
    }*/

    public function validatecaptcha() {
        if ($this->input->post('captcha_image') == $_SESSION['captcha_image']) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function getstates($country_id = 103) {
        $states = $this->states_model->get_states($country_id);
		//echo "<pre>";print_r($states);
        header('Content-Type: application/json');
        echo json_encode($states);
    }
	
	public function getitemcategory($item_adv_type) {
        $item_category_id = $this->cls_item_category_model->get_item_category($item_adv_type);
        header('Content-Type: application/json');
        echo json_encode($item_category_id);
    }

    /*public function sharefeedback() {
        //echo "herer";die();
        //print_r($_POST); die();
        $this->feedbacks_model->data = $this->input->post();
        $this->feedbacks_model->data['lang_id'] = $this->session->userdata('app_lang_id');
        $this->feedbacks_model->data['created_date'] = date("Y-m-d H:i:s");
        $this->feedbacks_model->data['modified_date'] = date("Y-m-d H:i:s");
        $this->feedbacks_model->data['ip_address'] = $_SERVER['HTTP_HOST'];

        $email = $this->input->post('email');
        $idea_description = $this->input->post('idea_description');
        $idea_title = $this->input->post('idea_title');
        unset($this->feedbacks_model->data['submit']);
        if ($this->feedbacks_model->insert()) {

            //IMP to add this 2 line for sending html email configuration
            $email_setting = array('mailtype' => 'html');
            $this->email->initialize($email_setting);
            //IMP
            //mail sending to admin email by dynamic id code begins here
            $to_emailid = $this->settings->DONATION_EMAIL_ID;
            //mail sending to admin email by dynamic id code end here

            $this->email_templates_model->primary_key = array('template_id' => 23);
            $emailtemplate = $this->email_templates_model->get_row();
            $this->email->subject($emailtemplate->template_title);
            $this->email->to($to_emailid);
            $this->email->cc($emailtemplate->cc);
            $this->email->bcc($emailtemplate->bcc);
            $this->email->from($emailtemplate->from);
            $emailmsg = $emailtemplate->template_content;

            $emailmsg = str_replace('##TITLE##', $idea_title, $emailmsg);
            $emailmsg = str_replace('##EMAIL##', $email, $emailmsg);
            $emailmsg = str_replace('##DESCRIPTION##', $idea_description, $emailmsg);

            $this->email->message($emailmsg);
            $this->email->send();

            echo $this->phrases->ENUIRIES['THANKS_MSG_FEEDBACK'];
        }
    }*/

    public function sharethispage() {
        $flug = false;
        $response = array();
        $emailid = $this->input->post('emailid');
        $emailids = (!empty($emailid)) ? explode(',', $emailid) : array();
        $url_id = $this->input->post('url_id');
        $description = $this->input->post('page_description');
        $from_email = $this->input->post('from_email');

        $email_setting = array('mailtype' => 'html'); //IMP to add this 2 line for sending html email configuration

        $this->email_templates_model->primary_key = array('template_id' => 14);
        $emailtemplate = $this->email_templates_model->get_row();
        $emailsub = $emailtemplate->template_title;
        $emailmsg = $emailtemplate->template_content;
        $emailmsg = str_replace('##REFERRAL_EMAIL##', $from_email, $emailmsg);
        $emailmsg = str_replace('##REFERRAL_URL##', $url_id, $emailmsg);
        $emailmsg = str_replace('##DESCRIPTION##', $description, $emailmsg);

        foreach ($emailids as $emailid) {
            $to_email = $emailid;
            if (filter_var($to_email, FILTER_VALIDATE_EMAIL) && filter_var($from_email, FILTER_VALIDATE_EMAIL) && $description != "") { // this line checks that we have a valid email address
                $this->email->clear();
                $this->email->initialize($email_setting);
                $this->email->from('admin@akshayapatra.com');
                $this->email->to($to_email);
                $this->email->subject($emailsub);
                $this->email->message($emailmsg);
                $this->email->send();
                $flug = true;
            }
        }

        if ($flug) {
            echo $this->phrases->USERS['SHARED_LINK'];
        } else {
            echo $this->phrases->ENUIRIES['INVALID_EMAIL'];
        }

        /* header('Content-Type: application/json');
          echo json_encode($response); */
    }

    public function currency_convesion($currency_code, $donation_amount) {
        $response = array();
        $result_string = array();
        $status = "";
        $amount = "";
        $temp = 'http://devel.farebookings.com/api/curconversor/INR/' . $currency_code . '/' . $donation_amount . '/';
        $response = file_get_contents($temp);
        //$result_string = substr($response, 3);
        if ($response) {
            $result_strings = substr($response, 3) . "<br/>";
            $result_string = round($result_strings, 2);
            $result_string = array("status" => 1, "amount" => $result_string);
        } else {
            $result_string = array("status" => 0, "amount" => 0.00);
        }
        //echo $result_string;
        header('Content-Type: application/json');
        echo json_encode($result_string);
    }

    public function loginpage() {
        $result_string = array();
        $redirect_url = $this->input->post('direction_path');
        $login_user = (array) $this->users_model->login($this->input->post());
        if (count($login_user) == 0) {
            $result_string = array("status" => 0, "msg" => $this->phrases->USERS['INVALID_DETAILS']);
        } else {
            $this->session->set_userdata($login_user);
            $result_string = array("status" => 1, "url" => $redirect_url);
        }
        header('Content-Type: application/json');
        echo json_encode($result_string);
    }

    /*public function get_subdomain($state_code='') {
        $result_string = array();
        $field_name = 'state_code';
        $field_value = $state_code;
        $subdomain = $this->subdomains_model->get_details($field_name, $field_value);
        if(!empty($subdomain->subdomain_url) && !empty($subdomain->ip_redirect_ind)){
            $result_string = array("status" => 1, "url" => "http://".$subdomain->subdomain_url);
        }else{
            $default_language = array('app_lang_id' => 1);
            $this->session->set_userdata($default_language);
            $result_string = array("status" => 0, "url" => $this->config->item('base_url'));
        }
        header('Content-Type: application/json');
        echo json_encode($result_string);
    }*/

    public function get_captcha() {
        $result_string = array();
        
        //captcha code start here
        $words = rand('12345', '56789');
        $_SESSION['captcha_image'] = $words;
        $vals = array(
            'word' => $words,
            'img_path' => './captcha/',
            'img_url' => 'captcha/',
            'img_width' => '150',
            'img_height' => 30,
            'expiration' => 720
        );
        $cap = create_captcha($vals);
        $image = $cap['image'];
        //captcha code end here
        
        $result_string = array("status" => 1, "image" => $image);        
        header('Content-Type: application/json');
        echo json_encode($result_string);
    }
}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */