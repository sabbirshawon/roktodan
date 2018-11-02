<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Settings_model extends CI_Model {
		function __construct(){
          // Call the Model constructor
          parent::__construct();
		  
			
		}
		

		function get_users_profile(){
			
			
			$this->db->select('*');
			$query = $this->db->get_where('tbl_users', array('user_id' => $this->session->userdata('user_id')));
			return $query->result_array();
		}
		
		function editSettings(){
			$userID = $this->session->userdata('user_id');
			$insert_data= array(
					'user_email' => $this->input->post('user_email'),
					'user_password' => md5($this->input->post('user_password'))
					);
			$this->db->where('user_id', $userID);
			$this->db->update('tbl_users', $insert_data); 

		}
		
		function get_profile($userID){
			$query= $this->db->select('*')
							->from('tbl_users')
							->where('tbl_users.user_id',$userID)
							->get();
			$data = $query->row_array();
			return $data;
		}
	}
?>