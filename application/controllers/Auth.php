<?php  
/**
 *
 */
class Auth extends CI_Controller
{
	// This function will show register page
	public function register()

	{
		$this->load->model('Auth_model');
		if ($this->Auth_model->authorized() == true) {
			redirect(base_url().'index.php/Auth/dashboard');
		}
		$this->load->library('form_validation');

		$this->form_validation->set_message('is_unique','Email address already exists,please try another ');

		$this->form_validation->set_rules('first_name','First Name','required');
		$this->form_validation->set_rules('last_name','Last Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('phone','Phone','required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('password','Password','required');
		

		if ($this->form_validation->run() == FALSE) {
			// here we will load the view
			$this->load->view('register');
		}else{
			//Here we will save user record in db

			// $this->load->model('Auth_model');
			$formArray = array();
			$formArray['first_name'] = $this->input->post('first_name');
			$formArray['last_name'] = $this->input->post('last_name');
			$formArray['email'] = $this->input->post('email');
			$formArray['phone'] = $this->input->post('phone');
			$formArray['password'] = password_hash($this->input->post('password'),PASSWORD_BCRYPT);
			$formArray['created_on'] = date('Y-m-d H:i:s');
			$this->Auth_model->create($formArray);

			$this->session->set_flashdata('msg','Your Account has been created successfully.');
			redirect(base_url().'index.php/Auth/register');
		}
	}

	// This function will show login page
	public function login(){

		$this->load->model('Auth_model');
		if ($this->Auth_model->authorized() == true) {
			redirect(base_url().'index.php/Auth/dashboard');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() == true) {
			// No error
			$email = $this->input->post('email');
			$user = $this->Auth_model->checkUser($email);

			if (!empty($user)) {
				$password = $this->input->post('password');
				if (password_verify($password,$user['password']) == true) {
					$sessArray['id'] = $user['id'];
					$sessArray['first_name'] = $user['first_name'];
					$sessArray['last_name'] = $user['last_name'];
					$sessArray['email'] = $user['email'];
					$this->session->set_userdata('user',$sessArray);
					redirect(base_url().'index.php/Auth/dashboard');
				}else{
					$this->session->set_flashdata('msg','Either email or password is incorrect,please try again');
					redirect(base_url().'index.php/Auth/login');
				}

			}else{
				$this->session->set_flashdata('msg','Either email or password is incorrect,please try again');
				redirect(base_url().'index.php/Auth/login');
			}

		} else{
			$this->load->view('login');
		}		
	}

	// This function will show dashboard page
	public function dashboard(){
		$this->load->model('Auth_model');
		if ($this->Auth_model->authorized() == false) {
			$this->session->set_flashdata('msg','You are not authorized to access this section');
			redirect(base_url().'index.php/Auth/login');
		}

		$user = $this->session->userdata('user');
		$data['user'] = $user;
		$this->load->view('dashboard',$data);
	}

	// logout function
	function logout(){
		$this->session->unset_userdata('user');
		redirect(base_url().'index.php/Auth/login');
	}
}
?>