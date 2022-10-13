<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doctors extends MY_Controller {
    public $class_name;
    function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        // $this->load->model('master_model');
           
    }

   
    public function index($slug) {
        $template_path = $this->doctorwisecontent($slug);
        $data = $this->data;

        $data['page_heading'] = 'Doctor Profile';
        $data['breadcrumb'] = '<span><a href="">Home</a> - </span> <span><a href="'.$this->class_name .'">'.ucfirst($this->class_name).'</a> - </span>Doctor Profile';
        $data['scripts'] = array('front/javascripts/index.js');
        $this->load->view($template_path, $data);
        // $data = $this->data;
        // $data['doctors'] = $this->doctors_model->view_data('doctors');
        // $data['categories'] = $this->gallery_model->view_data('gallery_category');
        // $data['view'] = 'gallery/gallery';
        // $data['scripts'] = array('assets/javascripts/gallery.js');
        // $this->load->view('templates/home', $data);
    }
    public function filter_doctors($speciality_id){
        $html ='';
    //    $speciality_id = $this->input->post('speciality_id');
       $this->doctors_model->primary_key = array('speciality_id'=>$speciality_id,'status_ind'=>1);
       $doctors = $this->doctors_model->getdata('doctors'); 
      
    if($doctors > 0 && !empty($doctors)){
       foreach($doctors as $doctor){
            $html    .=  '<div class="team-block-two col-lg-4 col-md-6 col-sm-12">';
			$html   .=  '<div class="inner-box">';
			$html   .=  '<div class="image-box">';
			$html	.=  '<figure class="image"><a href="doctors/'.$doctor->page_slug.'"><img src="'.DOCTOR_IMAGE_PATH.$doctor->doctor_image.'" alt=""></a></figure>';
			$html	.=	'<ul class="social-links">';
			$html	.=	'<li><a target="_blank" href="'. $doctor->facebook_link .'"><span class="fab fa-facebook-f"></span></a></li>';
			$html	.=	'<li><a target="_blank" href="'.$doctor->twitter_link.'"><span class="fab fa-twitter"></span></a></li>';
			$html	.=	'<li><a target="_blank" href="'.$doctor->instagram_link.'"><span class="fab fa-instagram"></span></a></li>';
			$html	.=	'<li><a target="_blank" href="'.$doctor->linkedin_link.'"><span class="fab fa-linkedin-in"></span></a></li>';
			$html	.=	'</ul>';
			$html	.=	'</div>';
			$html	.=	'<div class="info-box">';
			$html	.=	'<h5 class="name"><a href="#">'.$doctor->doctor_name.'</a></h5>';
			$html	.=	'<span class="designation"><b>'.$doctor->doctor_role.'</b></span>';
			$html	.=	'<span class="designation">'.$doctor->doctor_qualification.'</span>';
			$html	.=	'</div>';
			$html	.=	'</div>';
			$html	.=  '</div>';
        
        }
    }
        else{
            $html    =  '<div class="team-block-two col-lg-12 col-md-12 col-sm-12">';
            $html	.=	'<div class="info-box">';
			$html   .= '<h5 class="name"><a>Sorry No Doctors are in selected Speciality. </a></h5> ';
			$html	.=	'</div>';
			$html	.=	'</div>';
            
        }
        $output = $html;

       header("Content-Type:application/json");
        echo json_encode($output);
        
    }   

    public function search_doctor(){
        $searchTerm = $_GET['term'];
       
        $output = $this->doctors_model->search_doctor($searchTerm,'doctors');
        // $output = [ "PHP", "Python", "Ruby", "JavaScript", "MySQL", "Oracle" ];
        echo json_encode($output);
        
    }
}