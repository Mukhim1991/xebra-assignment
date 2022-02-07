<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model
{
	
	public function registration_list()
	{
		$this->db->select('*'); 
		$this->db->from('registration');
		if($_SESSION['user_type'] == '2')
		{
			$this->db->where('registration_id', $_SESSION['registration_id']);
		}
		$this->db->where('deleted','0');
		$data = $this->db->get()->result_array();
		return $data;
	}
	

	
}
?>