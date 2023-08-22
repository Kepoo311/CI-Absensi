<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('minputdata');
	}

	public function index2() {
        $this->load->view('password_form');
    }

    public function hashPassword() {
        $password = $this->input->post('password');
        $hashedPassword = $this->minputdata->hashPassword($password);

        echo "Original Password: $password<br>";
        echo "Hashed Password: $hashedPassword";
    }

    public function verifyPassword() {
        $inputPassword = $this->input->post('input_password');
        $hashedPasswordFromDatabase = '$2y$10$KSBGt7...'; // Replace with actual hashed password from your database

        if (password_verify($inputPassword, $hashedPasswordFromDatabase)) {
            echo "Password Verified!";
        } else {
            echo "Password Not Verified!";
        }
    }

	public function index()
	{

		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login/loginpage');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$query = $this->db->get_where('tb_users',['email' => $email])->row_array();

		if ($query) {
			if (password_verify($password, $query['password'])) 
			{
				$data = 
				[
					'email' => $email,
					'session' => date('d-m-Y H:m:s'),
					'role' => $query['role'],
				];
				
				$this->session->set_userdata( $data );

				if ($query['role'] == 'Admin') {
					redirect('admin','refresh');
				}
				else if ($query['role'] == 'Guru Piket') {
					redirect('gurupiket','refresh');
				}
				else {
					redirect('admin','refresh');
				}

			} else {
				$this->session->set_flashdata('error', 'Password Salah');
				redirect('','refresh');
			}
		} else {
			$this->session->set_flashdata('error', 'Email dan Password salah');
			redirect('','refresh');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('','refresh');
	}
}
