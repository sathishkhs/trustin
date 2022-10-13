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
        $config['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$config);
        $this->email->set_mailtype("html");
       
        $this->index_model->data = $this->input->post();
        $this->index_model->data['created_date'] = date('y-m-d');
        if($this->index_model->insert('appointments')){
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to('trustinhospital1@gmail.com');
            $list = 'appointment@trustinhospital.com';
            // $this->email->to('sathishds94@gmail.com');
            // $list = 'sathishds2428@gmail.com';
            // $this->email->cc($list);    
            $this->email->subject('Appointment Booking');
            $message = 'New Appointment is recieved.';
            $message .= '<br> The Patient details are as follows';
            $message .= '<br> Name :'.$this->input->post('name');
            $message .= '<br> Email :'.$this->input->post('email');
            $message .= '<br> Phone :'.$this->input->post('phone');
            $message .= '<br> speciality :'.$this->db->where('speciality_id',$this->input->post('speciality_id'))->get('specialities')->row()->speciality_name;
            $message .= '<br> Doctor :'.$this->input->post('doctors_id');
            $message .= '<br> appointment Date :'.$this->input->post('appointment_date');
            $message .= '<br> appointment Time :'.$this->input->post('appointment_time');
            $message .= '<br> message :'.$this->input->post('message');
            $message .= '<br> Thanks & Regards';
            $this->email->message($message);
            if($this->email->send()){
               $this->patient_mail();
                $res = 1;
               
            }else{
                $res = 0;
            }
       
            }else{
                $res = 0;
            }
            
            header('content-Type:application/json');
            echo json_encode($res);
            exit;

       
    }
    public function patient_mail(){
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to($this->input->post('email'));
            
            $this->email->subject('Appointment Booking');
            $message = 'Your appointment has been booked. We will call you to confirm your appointment.';
            $message .= '<br> The Patient details are as follows';
            $message .= '<br> Name :'.$this->input->post('name');
            $message .= '<br> Email :'.$this->input->post('email');
            $message .= '<br> Phone :'.$this->input->post('phone');
            $message .= '<br> speciality :'.$this->db->where('speciality_id',$this->input->post('speciality_id'))->get('specialities')->row()->speciality_name;
            $message .= '<br> appointment_date :'.$this->input->post('appointment_date');
            $message .= '<br> appointment_time :'.$this->input->post('appointment_time');
            $message .= '<br> message :'.$this->input->post('message');
            $message .= '<br> Thanks & Regards';
            $this->email->message($message);
            $this->email->send();
            return true;
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
        $config['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$config);

        // $this->email->initialize($config);
       
        $this->index_model->data = $this->input->post();
        $this->index_model->data['created_date'] = date('y-m-d');
        if($this->index_model->insert('contact')){
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to('trustinhospital1@gmail.com');
            // $list = '';
            //  $this->email->to('sathishds94@gmail.com');
            // $list = 'sathishds2428@gmail.com';
            // $this->email->cc($list);
            $this->email->subject('Enquiry or Contact Form Submission');
            $message = 'New Contact Form Submission.';
            $message .= '<br> The Contact details are as follows';
            $message .= '<br> Name :'.$this->input->post('name');
            $message .= '<br> Email :'.$this->input->post('email');
            $message .= '<br> message :'.$this->input->post('message');
            $message .= '<br> Thanks & Regards';
            $this->email->message($message);
            if($this->email->send()){
           
                $res = 1;
            }else{
                $res = 0;
            
            }
            }else{
                $res = 0;
           
            }
           
            header('content-Type:application/json');
            echo json_encode($res);
            exit;

       
    }

    public function career_apply(){
     
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
            $config['wordwrap'] = TRUE; // bool whether to validate email or not     
            $this->load->library('email',$config);
            $this->email->set_mailtype("html");
           
            $this->index_model->data = $this->input->post();
            $this->index_model->data['applied_date'] = date('y-m-d');
            if($this->index_model->insert('careers')){
                $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
                $this->email->to('trustinhospital1@gmail.com');
                $list = 'appointment@trustinhospital.com';
                // $this->email->to('sathishds94@gmail.com');
                // $list = 'sathishds2428@gmail.com';
                // $this->email->cc($list);    
                $this->email->subject('Career Application');
                $message = 'New Career Application is recieved.';
                $message .= '<br> The Application details are as follows';
                $message .= '<br> Name :'.$this->input->post('name');
                $message .= '<br> Email :'.$this->input->post('email');
                $message .= '<br> Phone :'.$this->input->post('phone');
                $message .= '<br> Job Career :'.$this->input->post('job-career');
                $message .= '<br> applied Date :'.$this->input->post('applied_date');
                $message .= '<br> message :'.$this->input->post('message');
                $message .= '<br> Thanks & Regards';
                $this->email->message($message);
               if( $this->email->send()){
                    // $this->db->query("INSERT INTO `admin_users_accesses` SELECT $new_user_id as user_id,menuitem_id FROM `admin_roles_accesses` WHERE role_id=$role_id");
                    $msg = array('type' => 'success', 'icon' => 'icon-ok green', 'txt' => 'Applied Successfully');
                } else {
                    $msg = array('type' => 'danger', 'icon' => 'icon-remove red', 'txt' => 'Sorry! Unable to Apply.');
                }

                
                }
                $this->session->set_flashdata('msg', $msg);
                redirect('/careers/');
                //    $this->patient_mail();
                    // $res = 1;
                   
                // }else{
                    // $res = 0;
                // }
           
                // }else{
                    // $res = 0;
                // }
                
                // header('content-Type:application/json');
                // echo json_encode($res);
                // exit;
    
  
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
    
      public function pinkathon(){
      
        $data = $this->data;
        $data['page_items'] = (object)[];
        $data['view_path'] = 'events/marathon';
        
        $data['scripts'] = array('front/javascripts/index.js','front/javascripts/events.js');
        $data['page_items']->page_slug = 'events';
        $this->load->view('templates/inner_page', $data);
    }

    public function marathon_save(){
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
        $config['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$config);
        $this->email->set_mailtype("html");
       
        $this->index_model->data = $this->input->post();
        $this->index_model->data['register_date'] = date('y-m-d');
        $this->index_model->data['register_time'] = date('h:i:s');
        if($this->index_model->insert('marathon_entries')){
           
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to('trustinhospital1@gmail.com');
            // $this->email->to('sathishds94@gmail.com');
            $list = 'prositk@gmail.com';
            // $list = $this->input->post('email');
            // $list = 'sathishds2428@gmail.com';
            $this->email->bcc($list);    
            $this->email->subject('Trust-in Run Registration');
            $message = 'Trust-in Run Registration';
            $message .= '<br> Details are as follows';
            $message .= '<br> Name :'.$this->input->post('name');
            $message .= '<br> Email :'.$this->input->post('email');
            $message .= '<br> Phone :'.$this->input->post('phone');
            $message .= '<br> Age :'.$this->input->post('age');
            $message .= '<br> Gender :'.$this->input->post('gender');
            $message .= '<br> Tshirt Size :'.$this->input->post('tshirt');
            $message .= '<br> Address :'.$this->input->post('address');
            $this->email->message($message);
            $this->email->send();
            $this->email->clear(TRUE);
            if($this->runner_mail()){
                
                $res = 1;
               
            }else{
                $res = 0;
            }
       
            }else{
                $res = 0;
            }
            
            header('content-Type:application/json');
            echo json_encode($res);
            exit;
    }
      public function runner_mail(){
           $new_conf['protocol']    = 'mail';
        $new_conf['smtp_host']    = 'mail.trustinhospital.com';
        $new_conf['smtp_port']    = '465';
        $new_conf['smtp_timeout'] = '7';
        $new_conf['smtp_user']    = 'appointment@trustinhospital.com';
        $new_conf['smtp_pass']    = 'Q!W@E#r4t5y6';
        $new_conf['charset']    = 'utf-8';
        $new_conf['newline']    = "\r\n";
        $new_conf['mailtype'] = 'html'; // or html
        $new_conf['validation'] = TRUE; // bool whether to validate email or not 
        $new_conf['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$new_conf);
        $this->email->clear(TRUE);
        $this->email->set_mailtype("html");
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to($this->input->post('email'));
             $this->email->subject('Trust-in Run Registration');
            $message = 'Thank you for registering for Trust-in Run. Your participation will certainly help in creating awareness about breast cancer. We look forward to running together on Sunday, 14th November 2021 at 7:00 a.m. Together, let’s make a difference! For any queries or added information, please call us at 080 45174949.';
            $message .= '<br> Your details are as follows';
            $message .= '<br> Name :'.$this->input->post('name');
            $message .= '<br> Email :'.$this->input->post('email');
            $message .= '<br> Phone :'.$this->input->post('phone');
            $message .= '<br> Age :'.$this->input->post('age');
           
            $message .= '<br> Gender :'.$this->input->post('gender');
            $message .= '<br> Tshirt Size :'.$this->input->post('tshirt');
            $message .= '<br> Address :'.$this->input->post('address');
          
            $this->email->message($message);
            $this->email->send();
            return true;
    }
      public function health_check_up(){
      
        $data = $this->data;
        $data['page_items'] = (object)[];
        $data['view_path'] = 'events/health_check_up';
        
        $data['scripts'] = array('front/javascripts/index.js','front/javascripts/heart_check.js');
        $data['page_items']->page_slug = 'heart_check_up';
        $this->load->view('templates/inner_page', $data);
    }
    
     public function heart_check_save(){
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
        $config['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$config);
        $this->email->set_mailtype("html");
       
        $this->index_model->data = $this->input->post();
        $this->index_model->data['added_date'] = date('y-m-d');
        if($this->index_model->insert('heart_checkup')){
           
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to('trustinhospital1@gmail.com');
            // $this->email->to('sathishds94@gmail.com');
            $list = 'prositk@gmail.com';
            // $list = $this->input->post('email');
            // $list = 'sathishds2428@gmail.com';
            $this->email->bcc($list);    
            $this->email->subject('Heart check up appointment booking ');
            $message = 'Heart check up appointment booking ';
            $message .= '<br> Details are as follows';
            $message .= '<br> Name :'.$this->input->post('name');
            $message .= '<br> Email :'.$this->input->post('email');
            $message .= '<br> Phone :'.$this->input->post('phone');
            $message .= '<br> Age :'.$this->input->post('age');
            $message .= '<br> Gender :'.$this->input->post('gender');
            $message .= '<br> Appointment Date :'.$this->input->post('appointment_date');
            $message .= '<br> Message :'.$this->input->post('message');
            $this->email->message($message);
            $this->email->send();
            $this->email->clear(TRUE);
            if($this->booker_mail()){
                
                $res = 1;
               
            }else{
                $res = 0;
            }
       
            }else{
                $res = 0;
            }
            
            header('content-Type:application/json');
            echo json_encode($res);
            exit;
    }
     public function booker_mail(){
           $new_conf['protocol']    = 'mail';
        $new_conf['smtp_host']    = 'mail.trustinhospital.com';
        $new_conf['smtp_port']    = '465';
        $new_conf['smtp_timeout'] = '7';
        $new_conf['smtp_user']    = 'appointment@trustinhospital.com';
        $new_conf['smtp_pass']    = 'Q!W@E#r4t5y6';
        $new_conf['charset']    = 'utf-8';
        $new_conf['newline']    = "\r\n";
        $new_conf['mailtype'] = 'html'; // or html
        $new_conf['validation'] = TRUE; // bool whether to validate email or not 
        $new_conf['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$new_conf);
        $this->email->clear(TRUE);
        $this->email->set_mailtype("html");
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to($this->input->post('email'));
             $this->email->subject('Appointment booking');
            $message = 'Thank you for appointment for heart check-up.';
            $message .= '<br> Your details are as follows';
            $message .= '<br> Name :'.$this->input->post('name');
            $message .= '<br> Email :'.$this->input->post('email');
            $message .= '<br> Phone :'.$this->input->post('phone');
            $message .= '<br> Age :'.$this->input->post('age');
           
            $message .= '<br> Gender :'.$this->input->post('gender');
            $message .= '<br> Appointment Date :'.$this->input->post('appointment_date');
            $message .= '<br> Message :'.$this->input->post('message');
          
            $this->email->message($message);
            $this->email->send();
            return true;
    }
    
    
    public function arthritis(){
      
        $data = $this->data;
        $data['page_items'] = (object)[];
        $data['view_path'] = 'events/arthritis';
        
        $data['scripts'] = array('front/javascripts/index.js','front/javascripts/arthritis.js');
        $data['page_items']->page_slug = 'arthritis';
        $this->load->view('templates/inner_page', $data);
    }
    
     public function Arthritis_save(){
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
        $config['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$config);
        $this->email->set_mailtype("html");
       
        $this->index_model->data = $this->input->post();
        $this->index_model->data['added_date'] = date('y-m-d');
        if($this->index_model->insert('arthritis')){
           
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to('trustinhospital1@gmail.com');
            // $this->email->to('sathishds94@gmail.com');
            $list = 'prositk@gmail.com';
            // $list = $this->input->post('email');
            // $list = 'sathishds2428@gmail.com';
            $this->email->bcc($list);    
            $this->email->subject('Arthritis appointment booking ');
            $message = 'Arthritis appointment booking ';
            $message .= '<br> Details are as follows';
            $message .= '<br> Name :'.$this->input->post('name');
            $message .= '<br> Email :'.$this->input->post('email');
            $message .= '<br> Phone :'.$this->input->post('phone');
            $message .= '<br> Age :'.$this->input->post('age');
            $message .= '<br> Gender :'.$this->input->post('gender');
            $message .= '<br> Appointment Date :'.$this->input->post('appointment_date');
            $message .= '<br> Message :'.$this->input->post('message');
            $this->email->message($message);
            $this->email->send();
            $this->email->clear(TRUE);
            if($this->arthritis_mail()){
                
                $res = 1;
               
            }else{
                $res = 0;
            }
       
            }else{
                $res = 0;
            }
            
            header('content-Type:application/json');
            echo json_encode($res);
            exit;
    }
     public function arthritis_mail(){
           $new_conf['protocol']    = 'mail';
        $new_conf['smtp_host']    = 'mail.trustinhospital.com';
        $new_conf['smtp_port']    = '465';
        $new_conf['smtp_timeout'] = '7';
        $new_conf['smtp_user']    = 'appointment@trustinhospital.com';
        $new_conf['smtp_pass']    = 'Q!W@E#r4t5y6';
        $new_conf['charset']    = 'utf-8';
        $new_conf['newline']    = "\r\n";
        $new_conf['mailtype'] = 'html'; // or html
        $new_conf['validation'] = TRUE; // bool whether to validate email or not 
        $new_conf['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$new_conf);
        $this->email->clear(TRUE);
        $this->email->set_mailtype("html");
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to($this->input->post('email'));
             $this->email->subject('Appointment booking');
            $message = 'Thank you for appointment for Arthritis.';
            $message .= '<br> Your details are as follows';
            $message .= '<br> Name :'.$this->input->post('name');
            $message .= '<br> Email :'.$this->input->post('email');
           
            $message .= '<br> Phone :'.$this->input->post('phone');
            $message .= '<br> Age :'.$this->input->post('age');
           
            $message .= '<br> Gender :'.$this->input->post('gender');
            $message .= '<br> Appointment Date :'.$this->input->post('appointment_date');
            $message .= '<br> Message :'.$this->input->post('message');
          
            $this->email->message($message);
            $this->email->send();
            return true;
    }
    
     public function blood_donation_camp(){
      
        $data = $this->data;
        $data['page_items'] = (object)[];
        $data['view_path'] = 'events/blood_donation_camp';
        
        $data['scripts'] = array('front/javascripts/index.js','front/javascripts/blood_donation_camp.js');
        $data['page_items']->page_slug = 'blood_donation_camp';
        $this->load->view('templates/inner_page', $data);
    }
    
     public function blood_donation_save(){
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
        $config['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$config);
        $this->email->set_mailtype("html");
       
        $this->index_model->data = $this->input->post();
        $this->index_model->data['added_date'] = date('y-m-d');
        if($this->index_model->insert('blood_donation_camp')){
           
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to('trustinhospital1@gmail.com');
            // $this->email->to('sathishds94@gmail.com');
            $list = 'prositk@gmail.com';
            // $list = $this->input->post('email');
            // $list = 'sathishds2428@gmail.com';
            $this->email->bcc($list);    
            $this->email->subject('Blood donation camp registration ');
            $message = 'Blood donation camp registration ';
            $message .= '<br> Details are as follows';
            $message .= '<br> Name :'.$this->input->post('name');
            $message .= '<br> Email :'.$this->input->post('email');
             $message .= '<br> Blood Group :'.$this->input->post('blood_group');
            $message .= '<br> Phone :'.$this->input->post('phone');
            $message .= '<br> Age :'.$this->input->post('age');
            $message .= '<br> Gender :'.$this->input->post('gender');
            $message .= '<br> Participation Date :'.$this->input->post('appointment_date');
            $message .= '<br> Message :'.$this->input->post('message');
            $this->email->message($message);
            $this->email->send();
            $this->email->clear(TRUE);
            if($this->blood_donation_mail()){
                
                $res = 1;
               
            }else{
                $res = 0;
            }
       
            }else{
                $res = 0;
            }
            
            header('content-Type:application/json');
            echo json_encode($res);
            exit;
    }
     public function blood_donation_mail(){
           $new_conf['protocol']    = 'mail';
        $new_conf['smtp_host']    = 'mail.trustinhospital.com';
        $new_conf['smtp_port']    = '465';
        $new_conf['smtp_timeout'] = '7';
        $new_conf['smtp_user']    = 'appointment@trustinhospital.com';
        $new_conf['smtp_pass']    = 'Q!W@E#r4t5y6';
        $new_conf['charset']    = 'utf-8';
        $new_conf['newline']    = "\r\n";
        $new_conf['mailtype'] = 'html'; // or html
        $new_conf['validation'] = TRUE; // bool whether to validate email or not 
        $new_conf['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$new_conf);
        $this->email->clear(TRUE);
        $this->email->set_mailtype("html");
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to($this->input->post('email'));
             $this->email->subject('Blood donation camp Registration');
            $message = 'Thank you for participating in Blood donation camp.';
            $message .= '<br> Your details are as follows';
            $message .= '<br> Name :'.$this->input->post('name');
            $message .= '<br> Email :'.$this->input->post('email');
             $message .= '<br> Blood Group :'.$this->input->post('blood_group');
            $message .= '<br> Phone :'.$this->input->post('phone');
            $message .= '<br> Age :'.$this->input->post('age');
           
            $message .= '<br> Gender :'.$this->input->post('gender');
            $message .= '<br> Participation Date :'.$this->input->post('appointment_date');
            $message .= '<br> Message :'.$this->input->post('message');
          
            $this->email->message($message);
            $this->email->send();
             $this->email->clear(TRUE);
            return true;
    }
    
    
     public function surgical_camp(){
      
        $data = $this->data;
        $data['page_items'] = (object)[];
        $data['view_path'] = 'events/surgical_camp';
        
        $data['scripts'] = array('front/javascripts/index.js','front/javascripts/surgical_camp.js');
        $data['page_items']->page_slug = 'surgical_camp';
        $this->load->view('templates/inner_page', $data);
    }
    
     public function surgical_camp_save(){
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
        $config['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$config);
        $this->email->set_mailtype("html");
       
        $this->index_model->data = $this->input->post();
        $this->index_model->data['added_date'] = date('y-m-d');
        if($this->index_model->insert('surgical_camp')){
           
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to('trustinhospital1@gmail.com');
            // $this->email->to('sathishds94@gmail.com');
            $list = 'prositk@gmail.com';
            // $list = $this->input->post('email');
            // $list = 'sathishds2428@gmail.com';
            $this->email->bcc($list);    
            $this->email->subject('Surgical camp registration ');
            $message = 'Surgical camp registration ';
            $message .= '<br> Details are as follows';
            $message .= '<br> Name :'.$this->input->post('name');
            $message .= '<br> Email :'.$this->input->post('email');
            //  $message .= '<br> Blood Group :'.$this->input->post('blood_group');
            $message .= '<br> Phone :'.$this->input->post('phone');
            $message .= '<br> Age :'.$this->input->post('age');
            $message .= '<br> Gender :'.$this->input->post('gender');
            $message .= '<br> Participation Date :'.$this->input->post('appointment_date');
            $message .= '<br> Message :'.$this->input->post('message');
            $this->email->message($message);
            $this->email->send();
            $this->email->clear(TRUE);
            if($this->surgical_mail()){
                
                $res = 1;
               
            }else{
                $res = 0;
            }
       
            }else{
                $res = 0;
            }
            
            header('content-Type:application/json');
            echo json_encode($res);
            exit;
    }
     public function surgical_mail(){
           $new_conf['protocol']    = 'mail';
        $new_conf['smtp_host']    = 'mail.trustinhospital.com';
        $new_conf['smtp_port']    = '465';
        $new_conf['smtp_timeout'] = '7';
        $new_conf['smtp_user']    = 'appointment@trustinhospital.com';
        $new_conf['smtp_pass']    = 'Q!W@E#r4t5y6';
        $new_conf['charset']    = 'utf-8';
        $new_conf['newline']    = "\r\n";
        $new_conf['mailtype'] = 'html'; // or html
        $new_conf['validation'] = TRUE; // bool whether to validate email or not 
        $new_conf['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$new_conf);
        $this->email->clear(TRUE);
        $this->email->set_mailtype("html");
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to($this->input->post('email'));
             $this->email->subject('Surgical camp Registration');
            $message = 'Thank you for participating in Surgical camp.';
            $message .= '<br> Your details are as follows';
            $message .= '<br> Name :'.$this->input->post('name');
            $message .= '<br> Email :'.$this->input->post('email');
            $message .= '<br> Phone :'.$this->input->post('phone');
            $message .= '<br> Age :'.$this->input->post('age');
           
            $message .= '<br> Gender :'.$this->input->post('gender');
            $message .= '<br> Participation Date :'.$this->input->post('appointment_date');
            $message .= '<br> Message :'.$this->input->post('message');
          
            $this->email->message($message);
            $this->email->send();
             $this->email->clear(TRUE);
            return true;
    }
    
    
    public function women_health_camp(){
      
        $data = $this->data;
        $data['page_items'] = (object)[];
        $data['view_path'] = 'events/women_health_camp';
        
        $data['scripts'] = array('front/javascripts/index.js','front/javascripts/women_health_camp.js');
        $data['page_items']->page_slug = 'women_health_camp';
        $this->load->view('templates/inner_page', $data);
    }
    
     public function women_health_camp_save(){
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
        $config['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$config);
        $this->email->set_mailtype("html");
       
        $this->index_model->data = $this->input->post();
        $this->index_model->data['added_date'] = date('y-m-d');
        if($this->index_model->insert('women_health_camp')){
           
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to('trustinhospital1@gmail.com');
            // $this->email->to('sathishds94@gmail.com');
            $list = 'prositk@gmail.com';
            // $list = $this->input->post('email');
            // $list = 'sathishds2428@gmail.com';
            $this->email->bcc($list);    
            $this->email->subject('Women Health camp registration ');
            $message = 'Women Health camp registration ';
            $message .= '<br> Details are as follows';
            $message .= '<br> Name :'.$this->input->post('name');
            $message .= '<br> Email :'.$this->input->post('email');
            //  $message .= '<br> Blood Group :'.$this->input->post('blood_group');
            $message .= '<br> Phone :'.$this->input->post('phone');
            $message .= '<br> Age :'.$this->input->post('age');
            $message .= '<br> Gender :'.$this->input->post('gender');
            $message .= '<br> Participation Date :'.$this->input->post('appointment_date');
            $message .= '<br> Message :'.$this->input->post('message');
            $this->email->message($message);
            $this->email->send();
            $this->email->clear(TRUE);
            if($this->women_health_mail()){
                
                $res = 1;
               
            }else{
                $res = 0;
            }
       
            }else{
                $res = 0;
            }
            
            header('content-Type:application/json');
            echo json_encode($res);
            exit;
    }
     public function women_health_mail(){
           $new_conf['protocol']    = 'mail';
        $new_conf['smtp_host']    = 'mail.trustinhospital.com';
        $new_conf['smtp_port']    = '465';
        $new_conf['smtp_timeout'] = '7';
        $new_conf['smtp_user']    = 'appointment@trustinhospital.com';
        $new_conf['smtp_pass']    = 'Q!W@E#r4t5y6';
        $new_conf['charset']    = 'utf-8';
        $new_conf['newline']    = "\r\n";
        $new_conf['mailtype'] = 'html'; // or html
        $new_conf['validation'] = TRUE; // bool whether to validate email or not 
        $new_conf['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$new_conf);
        $this->email->clear(TRUE);
        $this->email->set_mailtype("html");
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to($this->input->post('email'));
             $this->email->subject('Women Health camp Registration');
            $message = 'Thank you for participating in Women Health camp.';
            $message .= '<br> Your details are as follows';
            $message .= '<br> Name :'.$this->input->post('name');
            $message .= '<br> Email :'.$this->input->post('email');
            $message .= '<br> Phone :'.$this->input->post('phone');
            $message .= '<br> Age :'.$this->input->post('age');
           
            $message .= '<br> Gender :'.$this->input->post('gender');
            $message .= '<br> Participation Date :'.$this->input->post('appointment_date');
            $message .= '<br> Message :'.$this->input->post('message');
          
            $this->email->message($message);
            $this->email->send();
             $this->email->clear(TRUE);
            return true;
    }
    public function independence_day(){
      
        $data = $this->data;
        $data['page_items'] = (object)[];
        $data['view_path'] = 'events/independence_day';
        
        $data['scripts'] = array('front/javascripts/index.js','front/javascripts/independence_day.js');
        $data['page_items']->page_slug = 'women_health_camp';
        $this->load->view('templates/inner_page', $data);
    }
    
     public function independence_day_save(){
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
        $config['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$config);
        $this->email->set_mailtype("html");
       
        $this->index_model->data = $this->input->post();
        $this->index_model->data['added_date'] = date('y-m-d');
        if($this->index_model->insert('independence_day')){
           
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to('trustinhospital1@gmail.com');
            // $this->email->to('sathishds94@gmail.com');
            $list = 'prositk@gmail.com';
            // $list = $this->input->post('email');
            // $list = 'sathishds2428@gmail.com';
            $this->email->bcc($list);    
            $this->email->subject('Indendence Day registration ');
            $message = 'Independence Day registration ';
            $message .= '<br> Details are as follows';
            $message .= '<br> Name :'.$this->input->post('name');
            $message .= '<br> Email :'.$this->input->post('email');
            //  $message .= '<br> Blood Group :'.$this->input->post('blood_group');
            $message .= '<br> Phone :'.$this->input->post('phone');
            $message .= '<br> Age :'.$this->input->post('age');
            $message .= '<br> Gender :'.$this->input->post('gender');
            $message .= '<br> Participation Date :'.$this->input->post('appointment_date');
            $message .= '<br> Message :'.$this->input->post('message');
            $this->email->message($message);
            $this->email->send();
            $this->email->clear(TRUE);
            if($this->independence_day_mail()){
                
                $res = 1;
               
            }else{
                $res = 0;
            }
       
            }else{
                $res = 0;
            }
            
            header('content-Type:application/json');
            echo json_encode($res);
            exit;
    }
     public function independence_day_mail(){
           $new_conf['protocol']    = 'mail';
        $new_conf['smtp_host']    = 'mail.trustinhospital.com';
        $new_conf['smtp_port']    = '465';
        $new_conf['smtp_timeout'] = '7';
        $new_conf['smtp_user']    = 'appointment@trustinhospital.com';
        $new_conf['smtp_pass']    = 'Q!W@E#r4t5y6';
        $new_conf['charset']    = 'utf-8';
        $new_conf['newline']    = "\r\n";
        $new_conf['mailtype'] = 'html'; // or html
        $new_conf['validation'] = TRUE; // bool whether to validate email or not 
        $new_conf['wordwrap'] = TRUE; // bool whether to validate email or not     
        $this->load->library('email',$new_conf);
        $this->email->clear(TRUE);
        $this->email->set_mailtype("html");
            $this->email->from('appointment@trustinhospital.com','Trust-in Hospital');
            $this->email->to($this->input->post('email'));
             $this->email->subject('Independence Day Registration');
            $message = 'Thank you for participating in Independence Day.';
            $message .= '<br> Your details are as follows';
            $message .= '<br> Name :'.$this->input->post('name');
            $message .= '<br> Email :'.$this->input->post('email');
            $message .= '<br> Phone :'.$this->input->post('phone');
            $message .= '<br> Age :'.$this->input->post('age');
           
            $message .= '<br> Gender :'.$this->input->post('gender');
            $message .= '<br> Participation Date :'.$this->input->post('appointment_date');
            $message .= '<br> Message :'.$this->input->post('message');
          
            $this->email->message($message);
            $this->email->send();
             $this->email->clear(TRUE);
            return true;
    }
    
}
