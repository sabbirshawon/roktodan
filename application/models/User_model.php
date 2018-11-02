<?php
	
	class User_model extends CI_Model{

		public function  __construct(){

			$this->load->database();
		}

		/* function getMsg(){
			$query= $this->db->select('*')
							->from('tbl_msg')
							->get();
			$data = $query->result_array();
			return $data;
		}
		 */

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
						'user_status'    => $rows->user_status,
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


		
		function add_user(){
			
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());
			$ip = $this->input->ip_address();

			$insert_data= array(
						'user_type' => $this->input->post('user_type'),
						'user_name' => $this->input->post('user_name'),
						'user_email' => $this->input->post('user_email'),
						'user_mobile' => $this->input->post('user_mobile'),
						'user_password' => md5($this->input->post('user_password')),
						'user_doc' => $date,
						'users_ip' => $ip
						
						);
			if($this->db->insert('tbl_users',$insert_data)){
				$data['status'] = 'success';
			}
			else{
				$data['status'] = 'error';
				
			}
			
		}

		
	}
?>