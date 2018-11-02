<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	function __construct(){
		parent:: __construct();
		
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('settings_model');
		
		
	}
	

	
	function index()
	{
		$data['title']= "Blood - Settings";
		$data['user_data']= $this->settings_model->get_users_profile();
		$this->load->view('backend/layout/header',$data);
		$this->load->view('backend/view_settings');
		$this->load->view('backend/layout/footer');
		
	}
	public function editSettings(){

		$_SESSION['after_edit'] = '<div class="alert alert-success">Updated Successfully</div>';
		$this->session->mark_as_flash('after_edit');
		$this->settings_model->editSettings();
		redirect('settings');
		
	}
	
	public function get_profile_for_edit(){
		
		$userID = $this->input->post('user_id');
		
		$data['pro'] = $this->settings_model->get_profile($userID);
		
		echo json_encode($data['pro']);
	}
		
	

}
