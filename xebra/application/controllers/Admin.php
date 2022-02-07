<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if($_SESSION['isLogin'] <> true){
			session_destroy();
			redirect(base_url()."index.php/login");
		}

		$this->load->model('Common_model');
		$this->load->library('upload');
		$this->load->library('form_validation');
		$this->load->helper('file');
		$this->load->helper(array('form'));	
	}

	public function index()
	{
		$data['record'] = $this->Common_model->registration_list();
		$this->load->view('index',$data);
	}
	
	public function add_registration()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required'); 
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required'); 
	    $this->form_validation->set_rules('email', 'Email Id', 'trim|required|valid_email|is_unique[registration.email]'); 
	    $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|exact_length[10]|numeric|is_unique[registration.phone]');
		$this->form_validation->set_rules('address', 'Address', 'trim|required'); 
		
		if ($this->form_validation->run() == FALSE)
		{ 
			$errors = validation_errors();
			echo json_encode(['status'=>'400', 'message'=>'Something went wrong', 'error'=>$errors]);
		}
		else
		{ 	
			$data['first_name'] = $this->input->post('first_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['email'] = $this->input->post('email');
			$data['phone'] = $this->input->post('phone');
			$data['address'] = $this->input->post('address');
			$data['created_at'] = date('Y-m-d H:i:s');
			$data['updated_at'] = date('Y-m-d H:i:s');
			$this->db->insert('registration',$data);
			echo json_encode(['status'=>'200', 'message'=>'Registration Successfully']);
			
		}
	}
	
	public function delete_registration()
	{
		$registration_id = $this->input->post('registration_id');		
		$data['deleted'] = '1';
		$data['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('registration_id',$registration_id);
		$this->db->update('registration',$data);
		
		echo json_encode(['status'=>'200', 'message'=>'deleted successfully']);
	} 
	
	public function edit_registration()
	{
		$registration_id = $this->input->post('registration_id');		
		$result = $this->db->get_where("registration", array('registration_id' => $registration_id))->result_array();
		
		echo json_encode($result);		               
	} 

	public function update_registration()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required'); 
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required'); 
	    $this->form_validation->set_rules('email', 'Email Id', 'trim|required|valid_email'); 
	    $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|exact_length[10]|numeric');
		$this->form_validation->set_rules('address', 'Address', 'trim|required'); 
		
		if ($this->form_validation->run() == FALSE)
		{ 
			$errors = validation_errors();
            echo json_encode(['status'=>'400', 'message'=>'Something went wrong', 'error'=>$errors]);
		}
		else
		{ 	
			$registration_id = $this->input->post('registration_id');
			$data['first_name'] = $this->input->post('first_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['email'] = $this->input->post('email');
			$data['phone'] = $this->input->post('phone');
			$data['address'] = $this->input->post('address');
			$data['updated_at'] = date('Y-m-d H:i:s');
			$this->db->where('registration_id',$registration_id);
			$this->db->update('registration',$data);
			echo json_encode(['status'=>'200', 'message'=>'Update Successfully']);
		}
	}
	
	
}
?>