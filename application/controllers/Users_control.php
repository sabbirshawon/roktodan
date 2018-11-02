<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_control extends CI_Controller {
	function __construct(){
		parent:: __construct();
		
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->database();
		$this->load->library('form_validation');
		$this->is_logged_in();
		$this->load->model('Users_control_model');
		//model
		
		
	}
	function is_logged_in(){
		 if(!$this->session->userdata('user_id')){
			 redirect('users/login');
		 }
	 }

	
	function index()
	{
		$data['title']="Users Control";
		$info['user_info'] = $this->Users_control_model->getUserAdmin();
		$this->load->view('backend/layout/header',$data);
		$this->load->view('backend/view_users_control',$info);
		$this->load->view('backend/layout/footer');
	}
	
	function approval(){
		$data['title']="Users - Approval";
		
	
		$data['users_info'] = $this->Users_control_model->get_users();
		
		$this->load->view('backend/layout/header',$data);
		$this->load->view('backend/view_users',$data);
		$this->load->view('backend/layout/footer');
	}
	
	public function addUser(){
		$_SESSION['pack-item'] = '<div class="alert alert-success">Added Successfully</div>';
		$this->session->mark_as_flash('pack-item');
		$user_id = $this->Users_control_model->addUser();

			/************* File Upload ************/
			$config['upload_path'] = './uploads/user_pic/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload',$config);
			
			$filetype = $_FILES['user_pic']['type'];
			$file_name = $_FILES['user_pic']['name'];
			
			if($filetype == "image/jpg")
					$file_type='jpg';
				else if ($filetype == "image/gif")
					$file_type='gif';
				else if($filetype == "image/jpeg")
					$file_type='jpg';

				else if($filetype == "image/pjpeg")
					$file_type='pjpeg';
				else if($filetype ==  "image/png")
					$file_type='png';

			$_FILES['user_pic']['name']=$user_id.'.'.$file_type;
			
			$this->upload->do_upload('user_pic');
			
		
			$up_dtat = array('user_pic' => $_FILES['user_pic']['name']);
			$this->db->where('user_id',$user_id);
			$this->db->update('tbl_users',$up_dtat);
		redirect('Users_control');
	}
	
	
	public function editUser(){

	
			$this->Users_control_model->editUser();
			redirect('Users_control');

	}
	
	public function editUserStatus(){

	
			$this->Users_control_model->editUserStatus();
			redirect('Users_control/approval');

	}
	

	
	public function get_user_info_for_edit(){
		
		$userID = $this->input->post('user_id');
		
		$data['user_info'] = $this->Users_control_model->get_user_for_edit($userID);
		
		echo json_encode($data['user_info']);
	}
	
	
	function delUser($user_id) {
		
		$this->db->where('user_id', $user_id);
		$this->db->delete('tbl_users');
		$this->session->set_flashdata('message', 'Your data deleted Successfully..');
		redirect('Users_control/approval');
    }


}
