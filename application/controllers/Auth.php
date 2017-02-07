<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{	
	/*load model for authinticating user*/ 
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('auth_model','auth');
		$this->load->library('encrypt');
	}

	/*getSignin method for display login view*/
	public function index()
	{
		if ($this->session->userdata('username')) 		 
			redirect('dashboard');		

		$this->load->view('auth/login');
	}		

	/*postSignin method for authenticate user according to his information & redirecting him-her*/
	public function postSignin()
	{
		$row = $this->auth->checkAuth($this->input->post('email'),$this->encrypt->decode($this->input->post('password')));
		if (count($row))
		{
			$this->session->set_userdata('username',$row);
			$this->session->set_flashdata('msg','Your Login successfully!');
			redirect('dashboard');
		}
		else
		{
			$this->session->set_flashdata('msg','Provided credentials were wrong!');
			redirect('auth');
		}	
	}

	/*getSignup method for display register view*/
	public function getSignup()
	{
		$this->load->view('auth/register');
	}

	/*postSignup method for inserting new user with unique email id*/
	public function postSignup()
	{		 
		/*check if email is alredy taken*/

		if($this->auth->emailAuth($this->input->post('email')) == 0)
		{
			$data = array(				
				'username'=>ucfirst($this->input->post('username')),
				'email'=>$this->input->post('email'),
				'password'=>$this->encrypt->encode($this->input->post('password')),
				'gender'=>$this->input->post('gender')
			);

			$row = $this->auth->registerAuth($data);
			
			if(count($row)) 
			{
				$this->session->set_userdata('username',$row);
				$this->session->set_flashdata('msg','Your register successfully!');
				redirect('dashboard');
			}
			else
			{
				$this->session->set_flashdata('msg','Something were wrong please try again!!!');
				redirect('auth/getSignup');
			}
		}
		else
		{
			$this->session->set_flashdata('msg','Email is alredy taken!');	
			redirect('auth/getSignup');		 
		}		
	}

	/*postLogout method for dismiss user or logout user*/
	public function postLogout()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->session->unset_userdata('username');
			$this->session->set_flashdata('msg','Your Logged out!');
			redirect('auth');
		}
		redirect('dashboard');	
	}
}
		 
