<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent:: __construct();
		
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('donor_model');


		
		
	}
	

	
	function index()
	{
		$data['total_donor']=$this->donor_model->get_total_donor();
		//print_r($data['total_donor']);
		$this->load->view('frontend/header');
		$this->load->view('frontend/index',$data);
		$this->load->view('frontend/footer');
		
	}
	
	

}
