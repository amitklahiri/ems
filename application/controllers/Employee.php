<?php 
class Employee extends CI_Controller
{
	public function dashboard()
	{
		$employees = $this->Employee_model->empread();
		
		$this->load->view("inc/header");
		$this->load->view("employee/dashboard", [ "employees" => $employees ]);
		$this->load->view("inc/footer");
	}

	public function empadd()
	{
		$this->load->view("inc/header");
		$this->load->view("employee/empadd");
		$this->load->view("inc/footer");
	}

	public function empinsert()
	{
		$rules = [
			[
				"field"		=> "name",
				"label"		=> "Name", 
				"rules"		=> "trim|required|alpha", 
			], 
			[
				"field"		=> "address",
				"label"		=> "Address", 
				"rules"		=> "trim|required", 
			], 
			[
				"field"		=> "email",
				"label"		=> "Email", 
				"rules"		=> "trim|required|valid_email|is_unique[employees.email]", 
			], 
			[
				"field"		=> "mobile",
				"label"		=> "Mobile", 
				"rules"		=> "trim|required|numeric|min_length[10]", 
			], 
			[
				"field"		=> "dob",
				"label"		=> "Date of Birth", 
				"rules"		=> "trim|required", 
			], 
			[
				"field"		=> "doj",
				"label"		=> "Date of Joining", 
				"rules"		=> "trim|required", 
			], 
		];
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == false) {
			$this->empadd();
		} else {
			$data = $this->Employee_model->empinsert();
			if ($data) {
				$this->session->set_flashdata("empinsert", "Employee added successfully.");				
			} else {
				$this->session->set_flashdata("empinsertnot", "Employee does not add.");
			}
			redirect("employee/empadd");
		}
	}

	public function empedit()
	{
		$this->load->view("inc/header");
		$this->load->view("employee/empedit");
		$this->load->view("inc/footer");
	}

	public function empdelete()
	{
		$this->load->view("inc/header");
		$this->load->view("employee/empdelete");
		$this->load->view("inc/footer");
	}

	public function attendance()
	{
		$this->load->view("inc/header");
		$this->load->view("employee/attendance");
		$this->load->view("inc/footer");
	}
}