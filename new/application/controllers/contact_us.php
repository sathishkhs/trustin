 <?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact_us extends MY_Controller {
    public $class_name;
    function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());
        // $this->load->model('master_model');
    }

   
    public function index() {
        $data = $this->data;
        $data['view'] = 'contact_us/contact_us';
        $data['scripts'] = array('assets/javascripts/contact_us.js');
        $this->load->view('templates/home', $data);
    }
}