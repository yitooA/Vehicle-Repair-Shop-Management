<?php 

if(isset($_POST['submit'])) {

	// Grabbing the data
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$pwd = $_POST['pwd'];
	$pwdConfirm = $_POST['pwdConfirm'];

	// Instantiate signupContr class
	include '../classes/dbh.classes.php';
	include '../classes/signup.classes.php';
	include '../classes/signup-contr.classes.php';
	$signup = new SignupContr($firstName, $lastName, $email, $phone, $pwd, $pwdConfirm);

	// Running error handlers user signup
	$signup->signupUser();

	// Going back to the front page
	header("location: ../sign-up.php?error=none");
}

