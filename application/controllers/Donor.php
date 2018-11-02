<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donor extends CI_Controller {
	function __construct(){
		parent:: __construct();
		
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		$this->is_logged_in();
		//$this->load->model('user_model');
		$this->load->model('donor_model');
		
		//model
		
		
	}
	
	function is_logged_in(){
		 if(!$this->session->userdata('user_id')){
			 redirect('users/login');
		 }
	 }
	
	function index()
	{
		$data['title']="Blood - Donor";
		
		$info['pro_info'] = $this->donor_model->get_donor_info();

		$this->load->view('backend/layout/header',$data);
		$this->load->view('backend/view_donor',$info);
		$this->load->view('backend/layout/footer');
	}
	
	
	public function addDonor(){
		$_SESSION['pack-item'] = '<div class="alert alert-success">Added Successfully</div>';
		$this->session->mark_as_flash('pack-item');
		$this->donor_model->addDonor();
		redirect('donor');
	}

	
	
	public function editPro(){

			$this->donor_model->editPro();
			redirect('property');

	}
	
	public function get_pro_info_for_edit(){
		
		$proID = $this->input->post('p_id');
		
		$data['pack_info'] = $this->donor_model->get_pro_for_edit($proID);
		
		echo json_encode($data['pack_info']);
	}
	

	

	
	
}
