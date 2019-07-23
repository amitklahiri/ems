<?php 
class Employee_model extends CI_Model
{
	public function empinsert()
	{
		$data = [
			"name"		=> $this->input->post("name"), 
			"address"	=> $this->input->post("address"), 
			"email"		=> $this->input->post("email"), 
			"mobile"	=> $this->input->post("mobile"), 
			"dob"		=> $this->input->post("dob"), 
			"doj"		=> $this->input->post("doj"), 
			"status"	=> $this->input->post("status"), 
		];

		return $this->db->insert("employees", $data);
	}

	public function empread()
	{
		$query = $this->db->get("employees");
		return $query->result();
	}
}