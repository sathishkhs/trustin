<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages extends MY_Controller {
        public $class_name;
    function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->load->model('doctors_model');
    }

    public function index($slug) {
    $template_path = $this->pagewisecontent($slug);
    $data = $this->data;
    $data['page_heading'] = $data['page_items']->page_title;
    $data['breadcrumb'] = '<span><a href="">Home</a> - </span>'.$data['page_items']->page_title ;
    if($slug == 'doctors'){
        $data['doctors'] = $this->doctors_model->view_data('doctors');
        $data['specialities'] = $this->doctors_model->view_data('specialities');
    }
    if($slug == 'about-us'){
       $page_facility = explode(',',$data['page_items']->facilities_id);
        $facilities = $this->doctors_model->view_data('facilities');
        foreach($facilities as $facility){
            if(in_array($facility->facilities_id,$page_facility)){
                $faciliti[] = $facility; 
            }
        }
       
        $data['facilities'] = $faciliti;
        }
    
    $data['scripts'] = array('front/javascripts/index.js','front/javascripts/'.$slug.'.js');
    // $data['breadcrumb'] = $data['page_items']->page_title;
    $this->load->view($template_path, $data);
    }
}