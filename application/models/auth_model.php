<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model
{ 	 
	public function emailAuth($email)
	{
		$this->db->where('email',$email);
		$query=$this->db->get('user');
		return $count = $query->num_rows();
	}

	public function registerAuth($data)
	{
		$this->db->insert('user',$data); 
		$id = $this->db->insert_id();
		$q = $this->db->get_where('user', array('id' => $id));
		return $q->row();

	}

	public function checkAuth($email,$pass)
	{	
		$query=$this->db->get_where('user',array('email'=>$email,'password'=>$pass));
		return $row = $query->row();
	}	 
}
