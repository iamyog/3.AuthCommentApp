<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata('msg','Unauthorised Access');
			redirect('auth');
		}
	}	 
	public function index()
	{
		$this->load->view('dashboard');
	}

}
