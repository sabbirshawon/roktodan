<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Users_control_model extends CI_Model {
		function __construct(){
          // Call the Model constructor
          parent::__construct();
		}
		
		
	function getUserAdmin(){
		$query= $this->db->select('*')
						->from('tbl_users')
						->where('user_type','Admin')
						->get();
		$data = $query->result_array();
		return $data;
	}	
	
		
	function get_users(){
		$query= $this->db->select('*')
						->from('tbl_users')
						->where('user_type','Donor')
						->get();
		$data = $query->result_array();
		return $data;
	}	
	
	

	 function addUser(){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());

			
			if($this->input->post('user_status')){
				$user_status=1;
			}
			else 
				$user_status=$this->input->post('user_status');
			
			if(!$this->session->userdata('user_id')){
				$user_id = 0;
			}
			else 
				$user_id = $this->session->userdata('user_id');
			
			
			$insert_data= array(
					'user_type' => $this->input->post('user_type'),
					'user_name' => $this->input->post('user_name'),
					'user_email' => $this->input->post('user_email'),
					'user_mobile' => $this->input->post('user_mobile'),
					'user_password' => md5($this->input->post('user_password')),
					'user_doc' => $date,
					'user_status' => $user_status,
					'user_created_by' => $user_id
						);
			if($this->db->insert('tbl_users',$insert_data)){
				$data['status'] = 'success';
				return $this->db->insert_id();
			}
			else{
				$data['status'] = 'error';
				return FALSE;
			}
		}  
		
		
	//edit user start
	
	
	function editUserStatus(){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());
			$userID = $this->input->post('user_id');
			$insert_data= array(
					'user_status' => $this->input->post('user_status'),
					'user_created_by' => $this->session->userdata('user_id')
						);
			$this->db->where('user_id', $userID);
			$this->db->update('tbl_users', $insert_data); 

		}
	function editUser(){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());
			$userID = $this->input->post('user_id');
			$insert_data= array(
					'user_name' => $this->input->post('user_name'),
					'user_email' => $this->input->post('user_email'),
					'user_mobile' => $this->input->post('user_mobile'),
					'user_doc' => $date,
					'user_status' => $this->input->post('user_status'),
					'user_created_by' => $this->session->userdata('user_id')
						);
			$this->db->where('user_id', $userID);
			$this->db->update('tbl_users', $insert_data); 

		}
		
		function get_user_for_edit($userID){
			$query= $this->db->select('*')
							->from('tbl_users')
							->where('tbl_users.user_id',$userID)
							->get();
			$data = $query->row_array();
			return $data;
		}
	
	//edit user end 
		public function login($email, $password, $type){
			$this->db->where("user_email", $email);
			$this->db->where("user_password", $password);
			$this->db->where("user_type", $type);

			$query = $this->db->get("tbl_users");
			if($query->num_rows()>0){
			
				foreach($query->result() as $rows){
				
					//add all data to session
					$newdata = array(
						'user_id'  => $rows->user_id,
						'user_type'  => $rows->user_type,
						'user_name'  => $rows->user_name,
						'user_email'    => $rows->user_email,
						'logged_in'  => TRUE
					);
				}
				
				$this->session->set_userdata($newdata);
				return true;
			}
			else{
				return false;
			}
		}
		
			

		
	}

?>