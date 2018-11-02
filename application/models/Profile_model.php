<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Profile_model extends CI_Model {
		function __construct(){
          // Call the Model constructor
          parent::__construct();
		  
			
		}
		

		
		
			function get_users_profile(){
				$user = $this->session->userdata('user_id');
				$query= $this->db->select('*')
								->from('tbl_donor,tbl_users')
								->where('tbl_donor.donor_id = tbl_users.user_id')
								->where('tbl_users.user_id',$user)
								->get();
								//print_r($query);
				$data = $query->result_array();
				return $data;
			}
		
		function editProfile(){
			$userID = $this->input->post('donor_id');
			$insert_data= array(
					'donor_name' => $this->input->post('donor_name'),
					'donor_group' => $this->input->post('donor_group'),
					'donor_mob_no' => $this->input->post('donor_mob_no'),
					'donor_email' => $this->input->post('donor_email'),
					'donor_location' => $this->input->post('donor_location'),
					'last_donation' => $this->input->post('last_donation'),
					);
			$this->db->where('donor_id', $userID);
			$this->db->update('tbl_donor', $insert_data); 

		}
		
		function get_profile($userID){
			$query= $this->db->select('*')
							->from('tbl_donor')
							->where('tbl_donor.donor_id',$userID)
							->get();
			$data = $query->row_array();
			return $data;
		}
	}
?>