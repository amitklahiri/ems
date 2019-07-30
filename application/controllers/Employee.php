<?php 
class Employee extends CI_Controller
{
	public function dashboard()
	{
		$employees = $this->Employee_model->dashboard();
		
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

	public function empedit($emp_id)
	{
		$employee = $this->Employee_model->empsearch($emp_id);

		$this->load->view("inc/header");
		$this->load->view("employee/empedit", [ "employee" => $employee ]);
		$this->load->view("inc/footer");
	}

	public function empupdate()
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
				"rules"		=> "trim|required|valid_email", 
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
			$this->empedit();
		} else {
			$data = $this->Employee_model->empupdate();
			if ($data) {
				$this->session->set_flashdata("empupdate", "Employee updated successfully.");
				redirect("employee/dashboard");				
			} else {
				$this->session->set_flashdata("empupdatenot", "Employee does not updated.");
				redirect("employee/empedit");
			}
		}
	}

	public function empdelete($emp_id)
	{
		$employee = $this->Employee_model->empsearch($emp_id);

		$this->load->view("inc/header");
		$this->load->view("employee/empdelete", [ "employee" => $employee ]);
		$this->load->view("inc/footer");
	}

	public function empremove()
	{
		$data = $this->Employee_model->empremove();
		if ($data) {
			$this->session->set_flashdata("empremove", "Employee deleted successfully.");
			redirect("employee/dashboard");
		} else {
			$this->session->set_flashdata("empremovenot", "Employee does not deleted.");
			redirect("employee/empdelete");
		}
	}

	public function attendance()
	{
		$year = $this->input->post("year");
		$year = $year != "" ? $year : date("Y");
		$month = $this->input->post("month");
		$month = $month != "" ? $month : date("m");
		$emp_id = $this->input->post("empid");
		$updatepage = $this->uri->segment(3);

		$data = $this->Employee_model->attendance();
		
		$this->load->view("inc/header");
		if ($updatepage == 1) {
			redirect("employee/attadd/$emp_id/$year/$month", [ "year" => $year, "month" => $month, "data" => $data ]);
		} else {
			$this->load->view("employee/attendance", [ "year" => $year, "month" => $month, "data" => $data ]);
		}
		$this->load->view("inc/footer");
	}

	public function attsearch()
	{
		$emp_id = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$month = $this->uri->segment(5);

		$employee = $this->Employee_model->empsearch($emp_id);
		$attendances = $this->Employee_model->attsearch();
		
		$this->load->view("inc/header");
		redirect("employee/attadd/$emp_id/$year/$month", [ "year" => $year, "month" => $month, "employee" => $employee, "attendances" => $attendances ]);
		$this->load->view("inc/footer");
	}

	public function attadd()
	{
		$emp_id = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$month = $this->uri->segment(5);

		$employee = $this->Employee_model->empsearch($emp_id);
		$attendances = $this->Employee_model->attsearch();

		$this->load->view("inc/header");
		$this->load->view("employee/attadd", [ "year" => $year, "month" => $month, "employee" => $employee, "attendances" => $attendances ]);
		$this->load->view("inc/footer");
	}

	public function attupdate()
	{
		$emp_id = $this->input->post("empid");
		$year = $this->input->post("year");
		$month = $this->input->post("month");

		$employee = $this->Employee_model->empsearch($emp_id);
		$data = $this->Employee_model->attupdate();
		$attendances = $this->Employee_model->attsearch();

		$this->load->view("inc/header");
		redirect("employee/attadd/$emp_id/$year/$month", [ "year" => $year, "month" => $month, "employee" => $employee, "attendances" => $attendances ]);
		$this->load->view("inc/footer");
	}
}
