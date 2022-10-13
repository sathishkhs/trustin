<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dyn_widget_model extends CI_Model {

    private $table;
    public $primary_key;
    public $data;

    function __construct() {
        parent::__construct();
        $this->table = substr(strtolower(get_class($this)), 0, -6);
        $this->primary_key = array();
        $this->data = array();
    }

	public function latestQuestion($id) {
		$this->db->order_by('f.created_date DESC');
		$this->db->group_by('forum_id desc');
		$this->db->where('f.forum_category_id',$id);
		$this->db->where('f.status_ind','1');
        $this->db->select('f.*,fca.*,u.first_name as first_name, fc.forum_comment as forum_comment, fc.added_date as added_date,TIMESTAMPDIFF(DAY,`f`.`created_date` , NOW() ) AS NoDAY ,  TIMESTAMPDIFF(HOUR ,`f`.`created_date`, NOW() )-TIMESTAMPDIFF(DAY,`f`.`created_date`, NOW())*24 AS NoHOUR , TIMESTAMPDIFF(MINUTE,`f`.`created_date`, NOW() )-TIMESTAMPDIFF(HOUR,`f`.`created_date`, NOW() )*60 AS NoMINUTE');
        $this->db->from('forum as f');
        $this->db->join('users as u', 'f.forum_owner_user_id = u.user_id', 'left');
        $this->db->join('forum_category as fca', 'f.forum_category_id = fca.forum_category_id', 'left');
        $this->db->join('forum_comment as fc', 'f.forum_id = fc.forum_id', 'left');
        $this->db->limit(7, 0);
        $query = $this->db->get();
        return $query->result();
    }
	
	/*public function latestQuestion($ids) {
		$sql = "SELECT * , 
					(SELECT TIMESTAMPDIFF(DAY,`fm`.`created_date` , NOW() ) FROM forum as fm WHERE f.forum_id = fm.forum_id  LIMIT 1) AS NoDAY  ,
        			(SELECT TIMESTAMPDIFF(HOUR ,`fm`.`created_date`, NOW() )-TIMESTAMPDIFF(DAY,`fm`.`created_date`, NOW())*24 FROM forum as fm WHERE f.forum_id = fm.forum_id LIMIT 1) AS NoHOUR ,
        			(SELECT TIMESTAMPDIFF(MINUTE,`fm`.`created_date`, NOW() )-TIMESTAMPDIFF(HOUR,`fm`.`created_date`, NOW() )*60 FROM forum as fm WHERE f.forum_id = fm.forum_id LIMIT 1) AS NoMINUTE
					FROM forum as f LEFT JOIN forum_category as fca on f.forum_category_id = fca.forum_category_id  WHERE f.status_ind = 1 AND fca.status_ind = 1 ORDER BY f.created_date DESC  LIMIT 0 ,7
			 ";
		$query = $this->db->query($sql);
        return $query->result();
    }*/
    
	public function latestPost() {

		$sql = "SELECT * , 
        			(SELECT u.first_name  FROM forum as fm left join users u on u.user_id=fm.forum_owner_user_id WHERE f.forum_id = fm.forum_id LIMIT 1) as created_by ,
        			(SELECT TIMESTAMPDIFF(DAY,`fm`.`created_date` , NOW() ) FROM forum as fm WHERE f.forum_id = fm.forum_id  LIMIT 1) AS NoDAY  ,
        			(SELECT TIMESTAMPDIFF(HOUR ,`fm`.`created_date`, NOW() )-TIMESTAMPDIFF(DAY,`fm`.`created_date`, NOW())*24 FROM forum as fm WHERE f.forum_id = fm.forum_id LIMIT 1) AS NoHOUR ,
        			(SELECT TIMESTAMPDIFF(MINUTE,`fm`.`created_date`, NOW() )-TIMESTAMPDIFF(HOUR,`fm`.`created_date`, NOW() )*60 FROM forum as fm WHERE f.forum_id = fm.forum_id LIMIT 1) AS NoMINUTE
        			FROM forum as f LEFT JOIN forum_category as fca on f.forum_category_id = fca.forum_category_id  WHERE f.status_ind = 1 AND fca.status_ind = 1 ORDER BY f.created_date DESC  LIMIT 0 ,7
			 ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
	public function latestComment() {

		$sql = "SELECT * , 
        			(SELECT u.first_name  FROM forum_comment as fm left join users u on u.user_id=fm.user_id WHERE f.forum_comment_id = fm.forum_comment_id LIMIT 1) as created_by ,
        			(SELECT TIMESTAMPDIFF(DAY,`fm`.`added_date` , NOW() ) FROM forum_comment as fm WHERE f.forum_comment_id = fm.forum_comment_id LIMIT 1) AS NoDAY  ,
        			(SELECT TIMESTAMPDIFF(HOUR ,`fm`.`added_date`, NOW() )-TIMESTAMPDIFF(DAY,`fm`.`added_date`, NOW())*24 FROM forum_comment as fm WHERE f.forum_comment_id = fm.forum_comment_id LIMIT 1) AS NoHOUR ,
        			(SELECT TIMESTAMPDIFF(MINUTE,`fm`.`added_date`, NOW() )-TIMESTAMPDIFF(HOUR,`fm`.`added_date`, NOW() )*60 FROM forum_comment as fm WHERE f.forum_comment_id = fm.forum_comment_id  LIMIT 1) AS NoMINUTE
        			FROM forum_comment as f LEFT JOIN forum fm on fm.forum_id=f.forum_id LEFT JOIN forum_category as fca on f.forum_category_id = fca.forum_category_id  WHERE f.status_ind = '1' AND fca.status_ind = '1' AND fm.status_ind = '1' ORDER BY f.added_date DESC  LIMIT 0 ,7
			 ";	
        $query = $this->db->query($sql);
        return $query->result();
    }
    
	public function latestGroups() {

		$sql = "SELECT * , 
        			(SELECT u.first_name  FROM groups as gr left join users u on u.user_id=gr.group_owner_user_id WHERE gr.group_id = g.group_id LIMIT 1) as created_by ,
        			(SELECT TIMESTAMPDIFF(DAY,`gr`.`created_date` , NOW() ) FROM groups as gr WHERE gr.group_id = g.group_id LIMIT 1) AS NoDAY  ,
        			(SELECT TIMESTAMPDIFF(HOUR ,`gr`.`created_date`, NOW() )-TIMESTAMPDIFF(DAY,`gr`.`created_date`, NOW())*24 FROM groups as gr WHERE gr.group_id = g.group_id LIMIT 1) AS NoHOUR ,
        			(SELECT TIMESTAMPDIFF(MINUTE,`gr`.`created_date`, NOW() )-TIMESTAMPDIFF(HOUR,`gr`.`created_date`, NOW() )*60 FROM groups as gr WHERE gr.group_id = g.group_id  LIMIT 1) AS NoMINUTE
        			FROM groups as g WHERE g.status_ind = 1 ORDER BY g.created_date DESC  LIMIT 0 ,7
			 ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    
}
