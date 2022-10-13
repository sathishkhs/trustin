<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    public $class_name;

    public function __construct() {
        parent::__construct();
        $this->class_name = strtolower(get_class());  
        $this->load->model('Page_types_model');
        $this->load->model('Menuitems_model');
        $this->load->model('Widget_areas_model');
    }

    public function getslug($model, $field, $text) {
        $this->load->model($model);
        $slug = $this->$model->get_slug(urldecode($text), $field);
        $result = array('field_id' => $field, 'field_val' => $slug);
        header('Content-Type: application/json');
        echo json_encode($result);
    }
    
    public function menuitems($menu_id = 1) {
        $menuitems = $this->Menuitems_model->get_menuitems($menu_id, null);
        //echo "<pre>"; print_r($menuitems);
        for ($i = 0; $i < count($menuitems); $i++) {
            $menuitems[$i]->submenu = $this->Menuitems_model->get_menuitems($menu_id, $menuitems[$i]->menuitem_id);
        }
        //echo "<pre>"; print_r($menuitems); die();
        header('Content-Type: application/json');
        echo json_encode($menuitems);
    }
}