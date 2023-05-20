<?php
  
  // include the file with the vehicleInfoDetail method
  require_once '../classes/customersview.classes.php';
  require_once '../classes/dbh.classes.php';
  require_once '../classes/vehicleview.classes.php';

  // Get the parameters from the GET request
  $userId = $_GET['user_id'];
  $customerId = $_GET['customer_id'];

  // Create instances of the classes
  $customerView = new CustomersView();
  $vehicleView = new VehiclesView();

  // Get customer info and vehicle options
  $customerInfo = $customerView->customerInfo($userId, $customerId);
  $vehicleOptions = $vehicleView->vehicleOptions($userId, $customerId);

  // Prepare the response array
  $response = array(
    'customerInfo' => $customerInfo,
    'vehicleOption' => $vehicleOptions
  );

  header('cId:' . $customerId);
  // Return the response as JSON
  echo json_encode($response);
?>
