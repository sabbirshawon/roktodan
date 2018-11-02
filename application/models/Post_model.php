<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Post_model extends CI_Model {
		function __construct(){
          // Call the Model constructor
          parent::__construct();
		  
			
		}
		

		
		
		function get_my_comments(){
			
			$users = $this->session->userdata('user_id');
			
			
			$query= $this->db->select('*')
						->from('tbl_post,tbl_comment,tbl_users')
						->where('tbl_post.post_id=tbl_comment.post_id')
						->where('tbl_comment.comment_by=tbl_users.user_id')
						->where('tbl_comment.comment_by',$users)
						->order_by('tbl_comment.c_id','asc')
						->get();
				
				$data = $query->result_array();
				return $data;
			}
		
		function get_my_post(){
			
			$users = $this->session->userdata('user_id');
			
			
			$query= $this->db->select('*')
						->from('tbl_post,tbl_users')
						->where('tbl_post.post_by=tbl_users.user_id')
						->where('tbl_post.post_by',$users)
						->order_by('tbl_post.post_id','asc')
						->get();
				
				$data = $query->result_array();
				return $data;
			}	

	
	function get_post(){
			$query= $this->db->select('*')
						->from('tbl_post,tbl_users')
						->where('tbl_post.post_by=tbl_users.user_id')
						->where('tbl_post.post_status',1)
						->get();
				
				$data = $query->result_array();
				return $data;
			}

	function get_single_post($post_id)
    {
       $query= $this->db->select('*')
					->from('tbl_post,tbl_users')
					->where('tbl_post.post_by = tbl_users.user_id')
					->where('tbl_post.post_id',$post_id)
					
					->order_by('tbl_post.post_id','asc')
				//	->get_where('tbl_users', array('user_id' => $this->session->userdata('user_id')))
					->get();
		// $query = $this->db->get_where('tbl_users', array('user_id' => $this->session->userdata('user_id')));
		$data = $query->result_array();
		return $data;
    }
	
	function get_comment($post_id)
    {
       $query= $this->db->select('*')
					->from('tbl_post,tbl_comment,tbl_users')
					->where('tbl_comment.comment_by=tbl_users.user_id')
					->where('tbl_post.post_id=tbl_comment.post_id')
					->where('tbl_post.post_id',$post_id)
					->where('tbl_comment.c_status',1)
					->order_by('tbl_comment.c_id','asc')
				//	->get_where('tbl_users', array('user_id' => $this->session->userdata('user_id')))
					->get();
		// $query = $this->db->get_where('tbl_users', array('user_id' => $this->session->userdata('user_id')));
		$data = $query->result_array();
		return $data;
    }
	
	
	
	
	 function addPost(){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());

			$insert_data= array(
					'post_title' => $this->input->post('post_title'),
					'post_desc' => $this->input->post('post_desc'),
					'post_doc' => $date,
					'post_by' => $this->session->userdata('user_id')
						);
			if($this->db->insert('tbl_post',$insert_data)){
				$data['status'] = 'success';
				//return $this->db->insert_id();
			}
			else{
				$data['status'] = 'error';
				return FALSE;
			}
		} 
	 function addComment($data)
		{
			$this->db->insert('tbl_comment',$data);
			return $this->db->insert_id();
		}  
		
		
		
		
	function editPost(){
			$post_id = $this->input->post('post_id');
			
			$insert_data= array(
					'post_title' => $this->input->post('post_title'),
					'post_desc' => $this->input->post('post_desc'),
					);
			$this->db->where('post_id', $post_id);
			$this->db->update('tbl_post', $insert_data); 

		}
		
		function editPostStatus(){
			$post_id = $this->input->post('post_id');
			
			$insert_data= array(
					'post_status' => $this->input->post('post_status'),
					);
			$this->db->where('post_id', $post_id);
			$this->db->update('tbl_post', $insert_data); 

		}
		
		function get_post_edit($post_id){
			$query= $this->db->select('*')
							->from('tbl_post')
							->where('tbl_post.post_id',$post_id)
							->get();
			$data = $query->row_array();
			return $data;
		}
		
		
		
		
		//details
		
		function get_specific_comment($postid){
			$query= $this->db->select('*')
							->from('tbl_post,tbl_comment,tbl_users')
							->where('tbl_comment.comment_by=tbl_users.user_id')
							->where('tbl_post.post_id=tbl_comment.post_id')
							->where('tbl_post.post_id',$postid)
							->get();
				
				$data = $query->result_array();
				return $data;
		}
		
		
		
		function editComment(){
			$c_id = $this->input->post('c_id');
			
			$insert_data= array(
					'comment' => $this->input->post('comment'),
					);
			$this->db->where('c_id', $c_id);
			$this->db->update('tbl_comment', $insert_data); 

		}
		
		function editCStatus(){
			$c_id = $this->input->post('c_id');
			
			$insert_data= array(
					'c_status' => $this->input->post('c_status'),
					);
			$this->db->where('c_id', $c_id);
			$this->db->update('tbl_comment', $insert_data); 

		}
		
		function get_c_edit($c_id){
			$query= $this->db->select('*')
							->from('tbl_comment')
							->where('tbl_comment.c_id',$c_id)
							->get();
			$data = $query->row_array();
			return $data;
		}
			
		
		
		
	
			
	}

?>