<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Users extends CI_Controller {

		function __construct(){
		parent:: __construct();
		
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('user_model');

		
		
	}
   
	

	function registration(){
		if (isset($_POST['register'])) {
			$this->form_validation->set_rules('user_name', 'Username',     'required|min_length[5]|trim|is_unique[tbl_users.user_name]');
			$this->form_validation->set_rules('user_email', 'Email','required|trim|is_unique[tbl_users.user_email]');
			$this->form_validation->set_rules('user_mobile', 'Mobile', 'required|numeric|min_length[11]');
			$this->form_validation->set_rules('user_password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[5]|matches[user_password]');

			if ($this->form_validation->run() == TRUE) {

				
				date_default_timezone_set('Asia/Dhaka');
				$date = date('Y-m-d',time());

				$data = array(
					'user_type' => $_POST['user_type'],
					'user_name' => $_POST['user_name'],
					'user_email' => $_POST['user_email'],
					'user_mobile' => $_POST['user_mobile'],
					'user_password' => md5($_POST['user_password']),
					'user_doc' => $date,
				   
				);
				$this->db->insert('tbl_users', $data);
				
				$insert_data2= array(
						'donor_name' => $this->input->post('user_name'),
						'donor_group' => $this->input->post('donor_group'),
						'donor_mob_no' => $this->input->post('user_mobile'),
						'donor_email' => $this->input->post('user_email'),
						'donor_location' => $this->input->post('donor_location'),
						'last_donation' => $this->input->post('last_donation'),
						'donor_doc' => $date,
						'donor_created_by' => $this->session->userdata('user_id')
						
						);
				$this->db->insert('tbl_donor', $insert_data2);
				$this->session->set_flashdata("success", "Your account has been registered. Waiting for Admin Approval. Thanks!!!");
				
				
				redirect("users/registration", "refresh");
			}
		}
		//load view
		$data['title']="Blood Donation - Registration";
		$data['header_title']="Registration";
		$this->load->view('frontend/header2',$data);
		$this->load->view('frontend/view_signup');
		$this->load->view('frontend/footer');
	}
	
		 public function login(){
			$type = $this->input->post('user_type');
			$email = $this->input->post('user_email');
			$password = md5($this->input->post('user_password'));
			$result = $this->user_model->login($email, $password, $type);
			if($result AND ($this->session->userdata('user_status')==1)){
				redirect('users/dashboard');
			}
			else{
				if($this->session->userdata('user_status')==1){
					$data['login_success'] = false;
					redirect('users/dashboard');	
				}
				else{
					$data = array();
					if($this->input->post()){
						$data['wrong_message'] = 'Email or Password Wrong!';
					}
					$data['title']="Blood Donation - Login";
					$data['header_title']="Login";
					$this->load->view('frontend/header2',$data);
					$this->load->view('frontend/login_form', $data);
					$this->load->view('frontend/footer');
				}
			}
		} 
		 public function login_post(){
			$type = $this->input->post('user_type');
			$email = $this->input->post('user_email');
			$password = md5($this->input->post('user_password'));
			$result = $this->user_model->login($email, $password, $type);
			if($result AND ($this->session->userdata('user_status')==1)){
				redirect('Blood_request');
			}
			else{
				if($this->session->userdata('user_status')==1){
					$data['login_success'] = false;
					redirect('Blood_request');	
				}
				else{
					$data = array();
					if($this->input->post()){
						$data['wrong_message'] = 'User Type, Email or Password Wrong!';
					}
					$data['title']="Blood Donation - Login";
					$data['header_title']="Login";
					$this->load->view('frontend/header2',$data);
					$this->load->view('frontend/login_post', $data);
					$this->load->view('frontend/footer');
				}
			}
		} 

		 public function login_comment(){
			$type = $this->input->post('user_type');
			$email = $this->input->post('user_email');
			$password = md5($this->input->post('user_password'));
			$result = $this->user_model->login($email, $password, $type);
			if($result AND ($this->session->userdata('user_status')==1)){
				redirect(base_url().'Blood_request');
			}
			else{
				if($this->session->userdata('user_status')==1){
					$data['login_success'] = false;
					redirect(base_url().'Blood_request');	
				}
				else{
					$data = array();
					if($this->input->post()){
						$data['wrong_message'] = 'User Type, Email or Password Wrong!';
					}
					$data['title']="Blood Donation - Login";
					$data['header_title']="Login";
					$this->load->view('frontend/header2',$data);
					$this->load->view('frontend/login_comment', $data);
					$this->load->view('frontend/footer');
				}
			}
		}
		
		public function dashboard(){
			if($this->session->userdata('user_id')!=""){
			$data['login_success'] = true;
			$this->load->view('backend/layout/header', $data);
			$this->load->view('backend/index');
			$this->load->view('backend/layout/footer');
			}
			else{
					/* $data = array();
						if($this->input->post()){
							$data['wrong_message'] = 'Email or Password Wrong!';
						} */
				
					redirect('users/login');
			}
		}
		public function logout(){
			$newdata = array( 
				'user_id'  => '',
				'user_name'  => '',
				'user_email'    => '',
				'logged_in'  => FALSE
			);

			$this->session->unset_userdata($newdata);
			$this->session->sess_destroy();
			redirect('Home');
		}
		

	}

?>