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
			"status"	=> $this->input->post("status") == '1' ? '1' : '0', 
		];

		return $this->db->insert("employees", $data);
	}

	public function dashboard()
	{
		$this->db->from("employees");
		$this->db->order_by("name");
		$query = $this->db->get();
		return $query->result();
	}

	public function empsearch($emp_id)
	{
		$query = $this->db->get_where("employees", [ "id" => $emp_id ]);
		return $query->row();
	}

	public function empupdate()
	{
		$id = $this->input->post("id");
		$data = [
			"name"		=> $this->input->post("name"), 
			"address"	=> $this->input->post("address"), 
			"email"		=> $this->input->post("email"), 
			"mobile"	=> $this->input->post("mobile"), 
			"dob"		=> $this->input->post("dob"), 
			"doj"		=> $this->input->post("doj"), 
			"status"	=> $this->input->post("status") == '1' ? '1' : '0', 
		];

		$this->db->where("id", $id);
		return $this->db->update("employees", $data);
	}

	public function empremove()
	{
		$id = $this->input->post("id");
		$this->db->where("id", $id);
		return $this->db->delete("employees");
	}

	public function empattadd($emp_id)
	{
		
	}
}