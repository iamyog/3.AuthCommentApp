<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata('msg','Unauthorised Access');
			redirect('auth');
		}
		$this->load->model('social_model');
	}	 
	public function index()
	{
		$comments = $this->social_model->getRecrods();	
		$this->load->view('social/index',compact('comments'));
	}
	public function addComment()
	{
	 	$this->load->library('form_validation');

		$this->form_validation->set_rules('comment', 'Comment', 'required|min_length[10]|max_length[149]');
       
        if ($this->form_validation->run() == FALSE)
        {
        	$comments = $this->social_model->getRecrods();
            $this->load->view('social/index',compact('comments'));       
        }
        else
        {
            date_default_timezone_set("Asia/Kolkata");
		 	$y = date('d-m-Y');
		 	$t = date('h:i A');
		  	$current_date_time =  $y ." | ". $t;  				

			$data = array(			   
				 'user_id' => $this->session->userdata('username')->id,
				 'comment' => $this->input->post('comment'),
				 'date_time'=> $current_date_time
			);		 

		 	if($this->social_model->addCom($data))
			{			 
				$this->session->set_flashdata('msg-success','Comment Added');
				redirect('social');		
			}
			else
			{
				$comments = $this->social_model->getRecrods();
				$this->session->set_flashdata('msg-failed','Comment can not be added!!');		
				redirect('social',compact('comments'));	
			}
        }
	 	
	}
	public function deleteMe()
	{
		$id = $this->input->get('id');
		if($this->social_model->deleteRecrod($id))
		{
			$this->session->set_flashdata('msg-success','Comment Deleted');
				redirect('social');	
		}
		else
		{
			$this->session->set_flashdata('msg-failed','Comment can not be deleted!!');		
				redirect('social');	
		}
	}
	public function editComment()
	{
		date_default_timezone_set("Asia/Kolkata");
		$y = date('d-m-Y');
		$t = date('h:i A');
		$current_date_time =  $y ." | ". $t;  				

		$id = $this->input->post('hidden_id');
		$data = array(
			'comment' => $this->input->post('e_comment'),
			'updated_time'=> $current_date_time
		);		 

		if($this->social_model->editCom($id,$data))
		{			 
			$this->session->set_flashdata('msg-success','Comment Edited');
			redirect('social');		
		}
		else
		{
			$this->session->set_flashdata('msg-failed','Comment can not be edited!!');		
			redirect('social');	
		}

	}
	public function likeMe()
	{
		 
		$id = $this->input->post('id');
		$likeQuery = $this->social_model->getLike($id);
		$like;

		if ($likeQuery->like == 0)
		{
			$like = 1;
		}
		else if ($likeQuery->like == 1) {
			$like = 0;
		}
		$this->social_model->likeComment($id,$like);
		echo $like;
	}	
}