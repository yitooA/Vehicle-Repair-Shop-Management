<?php  


class VehicleContr extends Vehicles {
  private $userId;
  private $customerId;
  private $make;
  private $model;
  private $year;
  private $plateNumber;
  
  public function __construct($userId, $customerId, $make, $model, $year, $plateNumber) {
    $this->userId = $userId;
    $this->customerId = $customerId;
    $this->make = $make;
    $this->model = $model;
    $this->year = $year;
    $this->plateNumber = $plateNumber;
  }

  public function addVehicle() {
    $errors = array();

    if (empty($this->make)) {
      $errors['make'] = "Make is required";
    }
    if (empty($this->model)) {
      $errors['model'] = "Model is required";
    }
    if (empty($this->year)) {
      $errors['year'] = "Year is required";
    }
    if (!empty($this->year) && !preg_match('/^\d{4}$/', $this->year)) {
      $errors['year'] = "Invalid year format";
    }
    if (empty($this->plateNumber)) {
      $errors['plate_number'] = "Plate number is required";
    } else if ($this->checkPlateNumber($this->plateNumber)) {
      $errors['plate_number'] = "This plate number is already registered for another vehicle";
    } else if (!preg_match('/^[1-5]-[a-zA-Z]{2}-[0-9]{5}|[A-Z]{1}[0-9]{5}$/', $this->plateNumber)) {
      $errors['plate_number'] = "Invalid plate number format";
    }

    if (count($errors) > 0) {
      
      // return errors to the view
      return $errors;
    } else {
      // create new vehicle
      $this->setVehicle($this->userId, $this->customerId, $this->make, $this->model, $this->year, $this->plateNumber);
    }
  }
}
