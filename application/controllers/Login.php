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

	public function index()
	{

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login/loginpage');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db->get_where('tb_users',['username' => $username])->row_array();

		if ($query) {
			if (password_verify($password, $query['password'])) 
			{
				$data = 
				[
					'id' => $query['id'],
					'nama' => $query['username'],
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
			$this->session->set_flashdata('error', 'Username dan Password salah');
			redirect('','refresh');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('','refresh');
	}
}
