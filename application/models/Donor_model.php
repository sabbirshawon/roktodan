<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Donor_model extends CI_Model {
		function __construct(){
          // Call the Model constructor
          parent::__construct();
		  
			
		}
		
		function get_total_donor(){
			$this->db->select('*');
			$this->db->from('tbl_donor');
			$query = $this->db->get();
			return $query->num_rows();
		}

	public function get_search($donor_group=null){
		
		$this->db->select('*');
		$this->db->from('tbl_donor');
		$this->db->where('donor_group',$donor_group);
		$query = $this->db->get();

		if($query->num_rows() > 0)
			 return $query->result_array();
		else
			 return FALSE;
	}

	
	function get_donor_info(){
			$query= $this->db->select('*')
						->from('tbl_donor')
						->get();
				
				$data = $query->result_array();
				return $data;
			}


	
	function get_a_positive(){
			$query= $this->db->select('*')
						->from('tbl_donor')
						->where('tbl_donor.donor_group','A(+ve)')
						->get();
				
				$data = $query->result_array();
				return $data;
			}
	
	function get_a_negative(){
			$query= $this->db->select('*')
						->from('tbl_donor')
						->where('tbl_donor.donor_group','A(-ve)')
						->get();
				
				$data = $query->result_array();
				return $data;
			}
	function get_b_positive(){
			$query= $this->db->select('*')
						->from('tbl_donor')
						->where('tbl_donor.donor_group','B(+ve)')
						->get();
				
				$data = $query->result_array();
				return $data;
			}
	function get_b_negative(){
			$query= $this->db->select('*')
						->from('tbl_donor')
						->where('tbl_donor.donor_group','B(-ve)')
						->get();
				
				$data = $query->result_array();
				return $data;
			}
	function get_o_positive(){
			$query= $this->db->select('*')
						->from('tbl_donor')
						->where('tbl_donor.donor_group','O(+ve)')
						->get();
				
				$data = $query->result_array();
				return $data;
			}
	function get_o_negative(){
			$query= $this->db->select('*')
						->from('tbl_donor')
						->where('tbl_donor.donor_group','O(-ve)')
						->get();
				
				$data = $query->result_array();
				return $data;
			}
	function get_ab_positive(){
			$query= $this->db->select('*')
						->from('tbl_donor')
						->where('tbl_donor.donor_group','AB(+ve)')
						->get();
				
				$data = $query->result_array();
				return $data;
			}
			
		function get_ab_negative(){
			$query= $this->db->select('*')
						->from('tbl_donor')
						->where('tbl_donor.donor_group','AB(-ve)')
						->get();
				
				$data = $query->result_array();
				return $data;
			}

	

	
	
	
	 function addDonor(){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());

			$insert_data= array(
					'donor_name' => $this->input->post('donor_name'),
					'donor_group' => $this->input->post('donor_group'),
					'donor_mob_no' => $this->input->post('donor_mob_no'),
					'donor_email' => $this->input->post('donor_email'),
					'donor_location' => $this->input->post('donor_location'),
					'last_donation' => $this->input->post('last_donation'),
					'donor_doc' => $date,
					'donor_created_by' => $this->session->userdata('user_id')
						);
			if($this->db->insert('tbl_donor',$insert_data)){
				$data['status'] = 'success';
				//return $this->db->insert_id();
			}
			else{
				$data['status'] = 'error';
				return FALSE;
			}
		}  
		
		
		function addProDetails(){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());
			$insert_data= array(
						'p_desc' => $this->input->post('p_desc'),
						'p_total_rooms' => $this->input->post('p_total_rooms'),
						'p_total_area' => $this->input->post('p_total_area'),
						'p_floor' => $this->input->post('p_floor'),
						'p_total_floors' => $this->input->post('p_total_floors'),
						'p_car_parking_space' => $this->input->post('p_car_parking_space'),
						'p_features_indoor' => $this->input->post('p_features_indoor'),
						'p_features_outdoor' => $this->input->post('p_features_outdoor'),
						'p_features_eco' => $this->input->post('p_features_eco'),
						'p_id' => $this->input->post('p_id'),
						'p_details_doc' => $date,
						'p_details_created_by' => $this->session->userdata('user_id')
						);
			if($this->db->insert('tbl_donor_details',$insert_data)){
				$data['status'] = 'success';
			}
			else{
				$data['status'] = 'error';
				
			}
			
		}
		
		
		function editPro(){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());
			$proID = $this->input->post('p_id');
			$insert_data= array(
					'p_title' => $this->input->post('p_title'),
					'p_bedrooms' => $this->input->post('p_bedrooms'),
					'p_baths' => $this->input->post('p_baths'),
					'p_furnished' => $this->input->post('p_furnished'),
					'p_status' => $this->input->post('p_status'),
					'p_doc' => $date,
					'p_created_by' => $this->session->userdata('user_id')
						);
			$this->db->where('p_id', $proID);
			$this->db->update('tbl_donor', $insert_data); 

		}
		
		function get_pro_for_edit($proID){
			$query= $this->db->select('*')
							->from('tbl_donor')
							->where('tbl_donor.p_id',$proID)
							->get();
			$data = $query->row_array();
			return $data;
		}
		
		
		//details
		
		
		function editPackDetails(){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());
			$packsID = $this->input->post('pack_details_id');
			$insert_data= array(
					'pack_tour_details' => $this->input->post('pack_tour_details'),
					'pack_tour_includes' => $this->input->post('pack_tour_includes'),
					'pack_tour_excludes' => $this->input->post('pack_tour_excludes'),
					'pack_tour_additional_info' => $this->input->post('pack_tour_additional_info'),
					'pack_doc' => $date,
					'pack_created_by' => $this->session->userdata('user_id')
						);
			$this->db->where('pack_details_id', $packsID);
			$this->db->update('tbl_donor_details', $insert_data); 

		}
		
		
		
		function get_pack_info_editss($packsID){
			$query= $this->db->select('*')
							->from('tbl_donor_details')
							->where('tbl_donor_details.pack_details_id',$packsID)
							->get();
			$data = $query->row_array();
			return $data;
		}
		
		//details edit end
		
		
		
		//edit day
		
		
		
		function editDay(){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());
			$dayID = $this->input->post('details_day_id');
			$insert_data= array(
					'day_no' => $this->input->post('day_no'),
					'day_title' => $this->input->post('day_title'),
					'day_desc' => $this->input->post('day_desc'),
					'day_doc' => $date,
					'day_created_by' => $this->session->userdata('user_id')
						);
			$this->db->where('details_day_id', $dayID);
			$this->db->update('tbl_details_day', $insert_data); 

		}
		
			
		
		function get_pack_info_day($dayID){
			$query= $this->db->select('*')
							->from('tbl_details_day')
							->where('tbl_details_day.details_day_id',$dayID)
							->get();
			$data = $query->row_array();
			return $data;
		}

		function addBooking(){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());
			$insert_data= array(
						'p_id' => $this->input->post('p_id'),
						'book_name' => $this->input->post('book_name'),
						'book_email' => $this->input->post('book_email'),
						'book_mob_no' => $this->input->post('book_mob_no'),
						'book_msg' => $this->input->post('book_msg'),
						'book_doc' => $date
						);
			if($this->db->insert('tbl_booking',$insert_data)){
				$data['status'] = 'success';
			}
			else{
				$data['status'] = 'error';
				
			}
			
		}
		

		
		function get_booking(){
			$query= $this->db->select('*')
							->from('tbl_booking,tbl_donor')
							->where('tbl_booking.p_id = tbl_donor.p_id')
							->get();
			$data = $query->result_array();
			return $data;
		}

		
		
	
			
	}

?>