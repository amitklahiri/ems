<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	public function login()
	{
		$this->load->view("inc/header");
		$this->load->view("user/login");
		$this->load->view("inc/footer");
	}

	public function signin()
	{
		$this->form_validation->set_rules("username", "Username", "required|trim");
		$this->form_validation->set_rules("password", "Password", "required|trim");

		if ($this->form_validation->run() == false) {
			$this->login();
		} else {
			$userdata = $this->User_model->signin();

			if ($userdata) {
				$userdataSession = [
					"userid"	=>	$userdata->id, 
					"username" 	=> 	$userdata->username, 
				];

				$this->session->set_userdata($userdataSession);
				redirect("employee/dashboard");
			} else {
				$this->session->set_flashdata('userlogin', 'User login failed.');
				redirect("user/login");
			}
		}
	}

	public function adminImage()
	{
		echo "Image";
	}

	public function adminSettings()
	{
		echo "Settings";
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect("home/index");
	}
}