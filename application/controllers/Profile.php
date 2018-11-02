<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	function __construct(){
		parent:: __construct();
		
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('profile_model');
		
		
	}
	

	
	function index()
	{
		$data['title']= "Blood - Profile";
		$data['user_data']= $this->profile_model->get_users_profile();
		$this->load->view('backend/layout/header',$data);
		$this->load->view('backend/view_profile');
		$this->load->view('backend/layout/footer');
		
	}
	public function editProfile(){

		$_SESSION['after_edit'] = '<div class="alert alert-success">Updated Successfully</div>';
		$this->session->mark_as_flash('after_edit');
		$this->profile_model->editProfile();
		redirect('profile');
		
	}
	
	public function get_profile_for_edit(){
		
		$userID = $this->input->post('donor_id');
		
		$data['pro'] = $this->profile_model->get_profile($userID);
		
		echo json_encode($data['pro']);
	}
		

}
