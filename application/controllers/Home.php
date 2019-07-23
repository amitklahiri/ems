<?php 
class Home extends CI_Controller
{
	public function index()
	{
		$this->load->view("inc/header");
		$this->load->view("home/index");
		$this->load->view("inc/footer");
	}
}