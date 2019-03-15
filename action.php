<?php
session_start();
include("config.php");
if(isset($_POST["confirm"]) && $_POST["confirm"] == "login") {
	$error = 0;
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']); 
	$encrypted = md5($password); 
	if(empty($username) && empty($password)){
		$msg = "Username and Password is required";
		$error = 1;
	}elseif(empty($username)){
		$msg = "Username is required";
		$error = 1;
	}else if(empty($password)){
		$msg = "Password is required";
		$error = 1;
	}else{
		$sql = "SELECT id FROM members WHERE username = '".$username."' and password = '".$encrypted."'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
		$count = mysqli_num_rows($result);
		if($count == 0) {
			$msg = "Your Username or Password is invalid";
			$error = 1;
		}
	}
	if($error == 0 && $count == 1){
		$_SESSION['username'] = $username;
		header("location: company.php");
	}else{
		$_SESSION['msg'] = $msg;
		header("location: login.php?error=loginfail");
	}
}
?>
