<?php 
include "headers.php";
$data = json_decode(file_get_contents("php://input")); 
if (isset($data)) {
	$firstname= $data->firstname;
	$lastname= $data->lastname;
	$email= $data->email;
	$phone= $data->phone;
	$address= $data->address;
	$password= $data->password;
	require_once("mainClass.php");
	$newUser = new Users;
	$newUser->userRegister($firstname,$lastname,$email,$phone,$address,$password);
}

?>
