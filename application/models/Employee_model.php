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

	public function attendance()
	{
		$emp_id = $this->input->post("empid");
		$year = $this->input->post("year");
		$year = $year != "" ? $year : date("Y");
		$month = $this->input->post("month");
		$month = $month != "" ? $month : date("m");

		/*$this->db->select("emp.name, emp.mobile, emp.email, att.attdate, att.attstatus");
		$this->db->from("employees emp");
		$this->db->join("attendance att", "emp.id = att.empid", "left");
		$this->db->like([ "att.attdate" => $year . "-" . $month . "-" ]);
		$this->db->order_by("emp.name, att.attdate");
		$query = $this->db->get();
		return $query->result();*/

		$like_date = $year . "-" . $month . "-";

		$empid = [];
		$name = [];
		$present = [];
		$absent = [];
		$holiday = [];

		$this->db->select("id, name, mobile, email");
		$this->db->where("status", "1");
		$this->db->from("employees");
		$this->db->order_by("name");
		$query = $this->db->get();
		$result = $query->result();

		for ($i = 0; $i < count($result); $i++) {
			$this->db->select("attdate, attstatus");
			$this->db->where([ "empid" => $result[$i]->id, "attstatus" => "P" ]);
			$this->db->like([ "attdate" => $like_date ]);
			$this->db->from("attendance");
			$query2 = $this->db->get();
			$result2 = $query2->result();

			$this->db->select("attdate, attstatus");
			$this->db->where([ "empid" => $result[$i]->id, "attstatus" => "A" ]);
			$this->db->like([ "attdate" => $like_date ]);
			$this->db->from("attendance");
			$query3 = $this->db->get();
			$result3 = $query3->result();

			$this->db->select("attdate, attstatus");
			$this->db->where([ "empid" => $result[$i]->id, "attstatus" => "H" ]);
			$this->db->like([ "attdate" => $like_date ]);
			$this->db->from("attendance");
			$query4 = $this->db->get();
			$result4 = $query4->result();

			$empid[] = $result[$i]->id;
			$name[] = $result[$i]->name;
			$present[] = count($result2);
			$absent[] = count($result3);
			$holiday[] = count($result4);
		}

		$data = [ $empid, $name, $present, $absent, $holiday ];

		return $data;
	}

	public function attsearch()
	{
		$emp_id = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$month = $this->uri->segment(5);

		$this->db->like([ "attdate" => $year . "-" . $month . "-" ]);
		$this->db->where("empid", $emp_id);
		$this->db->from("attendance");
		$this->db->order_by("attdate");
		$query = $this->db->get();
		return $query->result();
	}

	public function attupdate()
	{
		$empid = $this->input->post("empid");
		$year = $this->input->post("year");
		$month = $this->input->post("month");
		$attstatus = $this->input->post("attstatus");
		$save = $this->input->post("save")[0];

		$attdate = $attstatus[$save - 1];
		$attdate = $year . "-" . $month . "-" . $save;

		$attstatus = $attstatus[$save - 1];

		if ($attstatus == "") {
			return false;
		} else {
			$query = $this->db->get_where("attendance", [ "empid" => $empid, "attdate" => $attdate ]);

			if ($query->result()) {
				$data = [
					"attstatus"	=> $attstatus, 
				];

				$this->db->where([ "empid" => $empid, "attdate" => $attdate ]);
				return $this->db->update("attendance", $data);
			} else {
				$data = [
					"empid"		=> $empid, 
					"attdate"	=> $attdate, 
					"attstatus"	=> $attstatus, 
				];

				return $this->db->insert("attendance", $data);
			}
		}
	}
}
