<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social_Model extends CI_Model
{  
	public function addCom($data)
	{
		return $this->db->insert('social',$data);	 
	}	
	public function getRecrods()
	{
		$this->db->select('social.*,user.username');
		$this->db->from('social');
	 
		$this->db->join('user', 'social.user_id = user.id'); 
		$query = $this->db->order_by('id','desc')->get();		 
		return $query->result();
	}
	public function deleteRecrod($id)
	{

		$userid = $this->session->userdata('username')->id;
		$this->db->where('user_id',$userid);
		$this->db->where('id',$id);		
		return $this->db->delete('social');
	}
	public function editCom($id,$data)
	{
		$userid = $this->session->userdata('username')->id;
		$this->db->where('user_id',$userid);
		$this->db->where('id',$id);		
		return $this->db->update('social',$data);
	}
	public function getNumRows()
	{
		$query = $this->db->get('social');
		return $query->num_rows();
	}
	public function likeComment($id,$like)
	{
		$data = array(
			'like' => $like
		);  		 
		$this->db->where('id',$id);		
		return $this->db->update('social',$data);
	}
	public function getLike($id)
	{
		$this->db->where('id',$id);		
		$query = $this->db->get('social');
		return $query->row();
	}
	  
}
