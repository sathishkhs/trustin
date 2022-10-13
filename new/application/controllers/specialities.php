<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Specialities extends MY_Controller {
    public $class_name;
    function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        $this->load->model('specialities_model');
        $this->load->model('facilities_model');
    }

    public function index($slug, $speciality_slug) {
        $template_path = $this->pagewisecontent($slug);
        $data = $this->data;
        $data['page_heading'] = 'Specialities Profile';
        $data['breadcrumb'] = '<span><a href="">Home</a> - </span> <span><a href="'.$this->class_name .'">'.ucfirst($this->class_name).'</a> - </span>Doctor Profile';
        $this->specialities_model->primary_key = array('speciality_slug' => $speciality_slug);
        $data['specialities'] = $this->specialities_model->get_row();
        if(!empty($data['specialities']->facilities_id)){
            $data['facilities'] = $this->facilities_model->view($data['specialities']->facilities_id);
            $this->doctors_model->primary_key = array('speciality_id' => $data['specialities']->speciality_id);
            $data['speciality_doctors'] = $this->doctors_model->getdata('doctors');
            //echo "<pre/>"; print_r($data['specialities']); die;
            $data['page_items']->page_title = $data['specialities']->speciality_name;
            $data['page_items']->page_slug = $data['specialities']->speciality_content;
            $data['page_items'] = (object) array_merge((array) $data['page_items'], (array) $data['specialities']);
        }else{
            redirect('');
        }
        $data['scripts'] = array('front/javascripts/index.js?v=' . $this->data['ver_radom'],'front/javascripts/specialities.js?v=' . $this->data['ver_radom']);
        $this->load->view($template_path, $data);
        // $data = $this->data;
        // $data['doctors'] = $this->doctors_model->view_data('doctors');
        // $data['categories'] = $this->gallery_model->view_data('gallery_category');
        // $data['view'] = 'gallery/gallery';
        // $data['scripts'] = array('assets/javascripts/specialities.js');
        // $this->load->view('templates/home', $data);
    }
    // public function doctor_details($slug){
       
     
    // }
}