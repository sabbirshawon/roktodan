<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Blood_request extends CI_Controller {

			function __construct(){
			parent:: __construct();
			
			$this->load->library('session');
			$this->load->library('pagination');
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->helper('html');
			$this->load->database();
			$this->load->library('form_validation');
			$this->load->model('post_model'); 
			$this->load->model('donor_model'); 

			
			
		}

		function index(){
			$data['title']="Roktodan - Blood Request";
			$data['header_title']="Blood Request";
			$info['post_info'] = $this->post_model->get_post();
			$this->load->view('frontend/header2',$data);
			$this->load->view('frontend/view_post',$info);
			$this->load->view('frontend/footer');

		}
	
		function add_post(){
			$this->post_model->addPost();
			redirect('Blood_request');
		}
		
		function add_my_post(){
			$this->post_model->addPost();
			redirect('Blood_request/my_post');
		}
		
		 function post($post_id){
			$data['post'] = $this->post_model->get_single_post($post_id);
			$data['comments'] = $this->post_model->get_comment($post_id);
			$data['title']="Blood Donation - Read More";
			$data['header_title']="Blood Request";
			$this->load->view('frontend/header2', $data);
			$this->load->view('frontend/view_single_post', $data);
			$this->load->view('frontend/footer');
		}
		
		function add_comment($post_id){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());
			$data = array(
				'post_id' => $post_id,
				'comment_by' => $this->session->userdata('user_id'),
				'comment' => $this->input->post('comment'),
			);
			$this->post_model->addComment($data);
			redirect(base_url().'Blood_request/post/'.$post_id);
		}
		
		function search(){
			
			$donor_group = $this->input->post('donor_group');
			$search = $this->input->post('search');
			

			$data['datas'] = $this->donor_model->get_search($donor_group,$search);
			
			$data['title'] = "Search";
			$data['header_title'] = "Search";
			//echo print_r($data['datas']);
			$this->load->view('frontend/header2',$data);
			$this->load->view('frontend/view_search',$data);
			$this->load->view('frontend/footer');

			}
	
			function my_post(){
				$data['title']="Blood Donation - My Post";
				$data['header_title']="My post";
				
				$data['my_post'] = $this->post_model->get_my_post();
				
				$this->load->view('frontend/header2',$data);
				$this->load->view('frontend/view_my_post',$data);
				$this->load->view('frontend/footer');
			}
			
			public function info($postid){
		
				
				$data['post_details'] = $this->post_model->get_specific_comment($postid);
				
				$data['comments'] = $this->post_model->get_comment($postid);
				
				$data['title']="Blood Donation - View";
				$data['header_title']="Comment";

				
				$this->load->view('frontend/header2',$data);
				$this->load->view('frontend/view_comment',$data);
				$this->load->view('frontend/footer');

			}
			
			
			function editPost(){

				
				$_SESSION['after_edit'] = '<div class="alert alert-success">Updated Successfully</div>';
				$this->session->mark_as_flash('after_edit');

				$this->post_model->editPost();
				redirect('Blood_request/my_post');
				
			}
			
			function editPostStatus(){

				$_SESSION['after_edit'] = '<div class="alert alert-success">Updated Successfully</div>';
				$this->session->mark_as_flash('after_edit');
				$ps = $this->input->post('post_id');
				
				$this->post_model->editPostStatus();
				redirect('Blood_request/my_post');
				
			}
			
				function get_editPost(){
		
					$post_id = $this->input->post('post_id');
					
					$data['post_info'] = $this->post_model->get_post_edit($post_id);
					
					echo json_encode($data['post_info']);
			
				}
			function deletePost($post_id) {
				$this->db->where('post_id', $post_id);
				$this->db->delete('tbl_post');
				$this->session->set_flashdata('message', 'Your data deleted Successfully..');
				redirect('Blood_request/my_post');
			}
			
			
			//comment
			function my_comments(){
				$data['title']="Blood Donation - My Comment";
				$data['header_title']="My - Comments";
				
				$data['my_comment'] = $this->post_model->get_my_comments();
				
				$this->load->view('frontend/header2',$data);
				$this->load->view('frontend/view_all_comment',$data);
				$this->load->view('frontend/footer');
			}
			
			function editComment(){

				
				$_SESSION['after_edit'] = '<div class="alert alert-success">Updated Successfully</div>';
				$this->session->mark_as_flash('after_edit');

				$this->post_model->editComment();
				redirect('Blood_request/my_comments');
				
			}
			
			function editCStatus(){

				$_SESSION['after_edit'] = '<div class="alert alert-success">Updated Successfully</div>';
				$this->session->mark_as_flash('after_edit');
				$ps = $this->input->post('post_id');
				
				$this->post_model->editCStatus();
				redirect('Blood_request/my_comments');
				
			}
			
			function get_editComment(){
		
					$c_id = $this->input->post('c_id');
					
					$data['c_info'] = $this->post_model->get_c_edit($c_id);
					
					echo json_encode($data['c_info']);
				}
				
				
			function deleteComment($c_id) {
				$this->db->where('c_id', $c_id);
				$this->db->delete('tbl_comment');
				$this->session->set_flashdata('message', 'Your data deleted Successfully..');
				redirect('Blood_request/my_post');
			}
			
	}

?>