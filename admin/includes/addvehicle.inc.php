<?php 


if (session_status() == PHP_SESSION_NONE) {
	session_start();
}


if(isset($_POST['submit'])) {


	// Grabbing the data
	$userId = $_SESSION['userid'];
	$customerId = $_GET['id'];
	$make = $_POST['make'];
	$model = $_POST['model'];
	$year = $_POST['year'];
	$plateNumber = $_POST['plate_number'];

	// Instantiate vehicles and related classes
	include '../classes/dbh.classes.php';
	include '../classes/vehicle.classes.php';
	include '../classes/vehiclecontr.classes.php';

	$vehicle = new VehicleContr($userId, $customerId, $make, $model, $year, $plateNumber);

	$errors = $vehicle->addVehicle();
	if (!empty($errors)) {
		$_SESSION['errors'] = $errors;
		header("Location: ../viewcustomer.php?id=". $_GET['id']);
	} else {
		unset($_SESSION['errors']);
		header("Location: ../viewcustomer.php?id=". $_GET['id']);
		exit();
	}
	

}


