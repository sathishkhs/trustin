<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Index extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('index_model');
    }
    public function index($slug = 'home') {
        $data = $this->data;
        $data['scripts'] = array('front/javascripts/index.js');
        $this->load->view('templates/home', $data);
    }
    public function appointment(){
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'mail.trustinhospital.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'appointment@trustinhospital.com';
        $config['smtp_pass']    = 'Q!W@E#r4t5y6';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      
        $this->load->library('email',$config);

        // $this->email->initialize($config);
        $this->index_model->data = $this->input->post();
        $this->index_model->data['created_date'] = date('y-m-d');
        if($this->index_model->insert('appointments')){
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Appointment Booking');
            $message = 'New Appointment is recieved.';
            $message .= '<br> The Patient details are as follows';
            $message .= '<br>/n Name :'.$this->input->post('name');
            $message .= '<br>/n Email :'.$this->input->post('email');
            $message .= '<br>/n Phone :'.$this->input->post('phone');
            $message .= '<br>/n speciality :'.$this->input->post('speciality_id');
            $message .= '<br>/n appointment_date :'.$this->input->post('appointment_date');
            $message .= '<br>/n appointment_time :'.$this->input->post('appointment_time');
            $message .= '<br>/n message :'.$this->input->post('message');
            $message .= '<br>/n Thanks & Regards';
            $this->email->message($message);
            if($this->email->send()){
                $res = 1;
            }else{
                $res = 0;
            }
            }else{
                $res = 0;
            }
            // echo $this->email->print_debugger();
            header('content-Type:application/json');
            echo json_encode($res);
            exit;

       
    }
    
     public function contact(){
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'mail.trustinhospital.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'appointment@trustinhospital.com';
        $config['smtp_pass']    = 'Q!W@E#r4t5y6';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      
        $this->load->library('email',$config);

        // $this->email->initialize($config);
        // $this->index_model->data['name'] = 'sathish';
        // $this->index_model->data['name'] = 'sathish@gmail.com';
        // $this->index_model->data['message'] = 'message';
        $this->index_model->data = $this->input->post();
        $this->index_model->data['created_date'] = date('y-m-d');
        if($this->index_model->insert('contact')){
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Enquiry or Contact Form Submission');
            $message = 'New Contact Form Submission.';
            $message .= '<br> The Contact details are as follows';
            $message .= '<br>/n Name :'.$this->input->post('name');
            $message .= '<br>/n Email :'.$this->input->post('email');
            $message .= '<br>/n message :'.$this->input->post('message');
            $message .= '<br>/n Thanks & Regards';
            $this->email->message($message);
            if($this->email->send()){
           
                $res = 1;
            }else{
                $res = 0;
            echo $this->email->print_debugger();
            }
            }else{
                $res = 0;
           
            }
           
            header('content-Type:application/json');
            echo json_encode($res);
            exit;

       
    }
    
    public function get_doctors($id){
        $this->index_model->primary_key = array('speciality_id'=>$id);
        $doctors = $this->index_model->view_data('doctors');
        $html = '<option>Select Doctor</option>';
        foreach($doctors as $doctor){
            $html .= '<option value="'.$doctor->doctors_id.'" >'.$doctor->doctor_name .'</option>';
        }
        
        header('content-Type:application/json');
        echo json_encode($html);
    }
    
}
