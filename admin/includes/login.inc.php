<?php 

if(isset($_POST['submit'])) {

	// Grabbing the data
	$emailorphone = $_POST['emailorphone'];
	$pwd = $_POST['pwd'];

	// Instantiate loginupContr class
	include '../classes/dbh.classes.php';
	include '../classes/login.classes.php';
	include '../classes/login-contr.classes.php';
	$login = new LoginContr($emailorphone, $pwd);

	// Running error handlers user signin
	$login->loginUser();


	// Going back to the front page
	// header("location: ../index.php?error=none");
} 