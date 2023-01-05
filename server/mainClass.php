<?php
class Users {
public $hostName = "localhost";
public $hostUser = "root";
public $password = "";
public $dbName = "foodjoints";

	function __construct(){
		$this->connect();
	}
	public function connect(){
		$this->con = new mysqli($this->hostName, $this->hostUser, $this->password, $this->dbName);
		if ($this->con->connect_error) {
			die("Failed to connect to Database : " .$this->con->connect_error);
		}
	}

	public function userRegister($firstname,$lastname,$email,$phone,$address,$password)
	{
		$stmt = $this->con->prepare("INSERT INTO users (first_name,last_name,e_mail,phone_no,address,pass_word) VALUES (?,?,?,?,?,?)");
		$stmt->bind_param("ssssss", $firstname,$lastname,$email,$phone,$address,$password);
		if ($stmt->execute()) {
			echo "success";
		} else {
			echo "failed";
		}
	} 

	public function userLogin($email,$password)
	{
		$stmt = $this->con->prepare("SELECT * FROM users WHERE e_mail= ? AND pass_word= ?");
		$stmt->bind_param("ss", $email,$password);
		if ($stmt->execute()) {
			echo "success";
		} else {
			echo "failed";
		}
	} 
}
	

?>