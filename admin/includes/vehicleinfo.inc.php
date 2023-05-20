<?php
  
  // include the file with the vehicleInfoDetail method
  require_once '../classes/vehicleview.classes.php';
  require_once '../classes/dbh.classes.php';

  // get the parameters from the GET request
  $userId = $_GET['user_id'];
  $id = $_GET['id'];
  $vehicleId = $_GET['vehicle_id'];
  
  // call the vehicleInfoDetail method with the parameters
  $vehicleInfo = new VehiclesView();
  $vehicleInfoDetail = $vehicleInfo->vehicleInfoDetail($userId, $id, $vehicleId);
  
  // return the vehicle info as a JSON-encoded string
  echo json_encode($vehicleInfoDetail);