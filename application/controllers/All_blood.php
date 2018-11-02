<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class All_blood extends CI_Controller {

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

	function index(){
		$data['title']="Roktodan - A Online Blood Management Site";
		$data['header_title']="All Blood Donor";
		$info['pro_info'] = $this->donor_model->get_donor_info();
		$this->load->view('frontend/header2',$data);
		$this->load->view('frontend/all_blood_donor',$info);
		$this->load->view('frontend/footer');

	}
	
	function a_positive(){
		$data['title']="Blood Donation - A Positive";
		$data['header_title']="A Positive";
		$info['pro_info'] = $this->donor_model->get_a_positive();
		$this->load->view('frontend/header2',$data);
		$this->load->view('frontend/a_positive',$info);
		$this->load->view('frontend/footer');
	}
	function a_negative(){
		$data['title']="Blood Donation - A Negative";
		$data['header_title']="A Positive";
		$info['pro_info'] = $this->donor_model->get_a_negative();
		$this->load->view('frontend/header2',$data);
		$this->load->view('frontend/a_positive',$info);
		$this->load->view('frontend/footer');
	}
	function b_positive(){
		$data['title']="Blood Donation - B Positive";
		$data['header_title']="B Positive";
		$info['pro_info'] = $this->donor_model->get_b_positive();
		$this->load->view('frontend/header2',$data);
		$this->load->view('frontend/a_positive',$info);
		$this->load->view('frontend/footer');
	}
	function b_negative(){
		$data['title']="Blood Donation - B Negative";
		$data['header_title']="B Negative";
		$info['pro_info'] = $this->donor_model->get_b_negative();
		$this->load->view('frontend/header2',$data);
		$this->load->view('frontend/a_positive',$info);
		$this->load->view('frontend/footer');
	}
	function o_positive(){
		$data['title']="Blood Donation - O Positive";
		$data['header_title']="O Positive";
		$info['pro_info'] = $this->donor_model->get_o_positive();
		$this->load->view('frontend/header2',$data);
		$this->load->view('frontend/a_positive',$info);
		$this->load->view('frontend/footer');
	}
	function o_negative(){
		$data['title']="Blood Donation - O Negative";
		$data['header_title']="O Negative";
		$info['pro_info'] = $this->donor_model->get_o_negative();
		$this->load->view('frontend/header2',$data);
		$this->load->view('frontend/a_positive',$info);
		$this->load->view('frontend/footer');
	}
	function ab_positive(){
		$data['title']="Blood Donation - AB Positive";
		$data['header_title']="AB Positive";
		$info['pro_info'] = $this->donor_model->get_ab_positive();
		$this->load->view('frontend/header2',$data);
		$this->load->view('frontend/a_positive',$info);
		$this->load->view('frontend/footer');
	}
	function ab_negative(){
		$data['title']="Blood Donation - AB Negative";
		$data['header_title']="AB Negative";
		$info['pro_info'] = $this->donor_model->get_ab_negative();
		$this->load->view('frontend/header2',$data);
		$this->load->view('frontend/a_positive',$info);
		$this->load->view('frontend/footer');
	}

		

		

	}

?>