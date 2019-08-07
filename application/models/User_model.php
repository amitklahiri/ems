<?php 
class User_model extends CI_Model
{
	public function signin()
	{
		$username = $this->input->post("username");
		$password = sha1($this->input->post("password"));
		
		$user = $this->db->where(["username" => $username, "password" => $password, "active" => "1"])->get("users");
		return $user->row();
	}

	public function adminImage()
	{

	}

	public function adminSettings()
	{
		
	}
}