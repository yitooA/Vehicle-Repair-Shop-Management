<?php 


if (session_status() == PHP_SESSION_NONE) {
	session_start();
}


if(isset($_POST['submit'])) {


	// Grabbing the data
	$userId = $_SESSION['userid'];
	$firstName = $_POST['first_name'];
	$lastName = $_POST['last_name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$picture = $_FILES['picture'];
	$position = $_POST['position'];

	// Instantiate customers and related classes
	include '../classes/dbh.classes.php';
	include '../classes/employees.classes.php';
	include '../classes/employeecontr.classes.php';
	$employee = new EmployeeContr($userId, $firstName, $lastName, $phone, $address, $position, $picture);

	$errors = $employee->addEmployee();

	if (!empty($errors)) {
		$_SESSION['errors'] = $errors;
		$queryString = "Location: ../add-employee.php?";

		if (!empty($firstName)) {
			$queryString .= "firstName=" . $firstName . "&";
		}

		if (!empty($lastName)) {
			$queryString .= "lastName=" . $lastName . "&";
		}

		if (!empty($phone)) {
			$queryString .= "phone=" . $phone . "&";
		}

		if (!empty($address)) {
			$queryString .= "address=" . $address . "&";
		}

		if (!empty($position)) {
			$queryString .= "position=" . $position . "&";
		}

		if (!empty($picture)) {
			$queryString .= "picture=" . $picture;
		}

		header($queryString);

	} else {
		unset($_SESSION['errors']);
		header("Location: ../team.php");
		exit();
	}
	
	

}

if(isset($_POST['reset'])) {
  // Unset the session variables
	unset($_GET['firstName']);
	unset($_GET['lastName']);
	unset($_GET['phone']);
	unset($_GET['address']);
	unset($_GET['position']);
	unset($_SESSION['errors']);
	header("Location: ../add-employee.php");
	exit();
}