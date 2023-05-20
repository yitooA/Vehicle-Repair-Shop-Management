<?php 


if (session_status() == PHP_SESSION_NONE) {
	session_start();
}


if(isset($_POST['submit'])) {


	// Grabbing the data
	$userId = $_SESSION['userid'];
	$firstName = $_POST['first_name'];
	$lastName = $_POST['last_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];

	// Instantiate customers and related classes
	include '../classes/dbh.classes.php';
	include '../classes/customers.classes.php';
	include '../classes/customercontr.classes.php';
	$customer = new CustomerContr($userId, $firstName, $lastName, $email, $phone, $address);

	$errors = $customer->addCustomer();
	// $formValue = $customer->getCustomerData();
	if (!empty($errors)) {
		$_SESSION['errors'] = $errors;
		$_SESSION['customerFirstName'] = $firstName;
		$_SESSION['customerLastName'] = $lastName;
		$_SESSION['customerEmail'] = $email;
		$_SESSION['customerPhone'] = $phone;
		$_SESSION['customerAddress'] = $address;
		header("Location: ../add-customer.php");
	} else {
		unset ($_SESSION['errors']);
		unset($_SESSION['customerFirstName']);
  	  	unset($_SESSION['customerLastName']);
    	unset($_SESSION['customerEmail']);
    	unset($_SESSION['customerPhone']);
   	 	unset($_SESSION['customerAddress']);
		header("Location: ../customer.php");
		exit();
	}
	

} 
if(isset($_POST['reset'])) {
  // Unset the session variables
  	unset($_SESSION['customerFirstName']);
  	unset($_SESSION['customerLastName']);
  	unset($_SESSION['customerEmail']);
  	unset($_SESSION['customerPhone']);
  	unset($_SESSION['customerAddress']);
  	unset($_SESSION['errors']);
  	header("Location: ../add-customer.php");
	exit();
}