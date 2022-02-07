<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Common_model');
		$this->load->library('form_validation');
		$this->load->helper(array('form'));	
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function submit_login()
	{		
		$this->form_validation->set_rules('email', 'Username', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{ 
			$this->index();	
		}
		else
		{ 	
			$email = $this->input->post('email');
			$password = $this->input->post('password');
					
			$data = $this->db->get_where('registration', array('email' => $email, 'password' => $password))->result_array();

			if(count($data) > 0)
			{
				$this->session->set_userdata('registration_id',$data[0]['registration_id']);
				$this->session->set_userdata('user_type',$data[0]['user_type']);					
				$this->session->set_userdata('first_name',$data[0]['first_name']);					
				$this->session->set_userdata('last_name',$data[0]['last_name']);					
				$this->session->set_userdata('isLogin',true);					
				redirect(base_url()."index.php/admin");				
			}
			else
			{
				$_SESSION['error_message'] = "Username / Password not matched";
				redirect(base_url()."index.php/login");			
			}
		}
	}	
	
	public function signup()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required'); 
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required'); 
	    $this->form_validation->set_rules('email', 'Email Id', 'trim|required|valid_email|is_unique[registration.email]'); 
	    $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|exact_length[10]|numeric|is_unique[registration.phone]');
		$this->form_validation->set_rules('address', 'Address', 'trim|required'); 
		$this->form_validation->set_rules('password', 'Password', 'trim|required'); 
		
		if ($this->form_validation->run() == FALSE)
		{ 
			$this->index();	
		}
		else
		{ 	
			$data['first_name'] = $this->input->post('first_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['email'] = $this->input->post('email');
			$data['phone'] = $this->input->post('phone');
			$data['address'] = $this->input->post('address');
			$data['password'] = $this->input->post('password');
			$data['created_at'] = date('Y-m-d H:i:s');
			$data['updated_at'] = date('Y-m-d H:i:s');
			$data['user_type'] = '2';
			$this->db->insert('registration',$data);
			$registration_id = $this->db->insert_id();
			
			$this->session->set_userdata('registration_id',$registration_id);
			$this->session->set_userdata('user_type',$data['user_type']);					
			$this->session->set_userdata('first_name',$data['first_name']);					
			$this->session->set_userdata('last_name',$data['last_name']);					
			$this->session->set_userdata('isLogin',true);					
			redirect(base_url()."index.php/admin");				
		}
	}
	
	public function logout()
	{
		session_destroy();
		redirect(base_url()."index.php/login");
	}
}

?>
