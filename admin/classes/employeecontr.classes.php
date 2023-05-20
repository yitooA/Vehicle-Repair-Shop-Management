<?php 


class EmployeeContr extends Employees {

	private $userId;
	private $firstName;
	private $lastName;
	private $phone;
	private $address;
	private $position;
	private $picture;

	public function __construct($userId, $firstName, $lastName, $phone, $address, $position, $picture)
	{
		$this->userId = $userId;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->phone = $phone;
		$this->address = $address;
		$this->position = $position;
		$this->picture = $picture;
	}

	public function addEmployee() {
		
		$errors = array();

		if (empty($this->firstName)) {
			$errors['employee_first_name'] = "First name is required";
		}
		if (empty($this->lastName)) {
			$errors['employee_last_name'] = "Last name is required";
		}
		if (empty($this->address)) {
			$errors['employee_address'] = "Address is required";
		}
		if (empty($this->phone)) {
			$errors['employee_phone'] = "Phone is required";
		} else if ($this->checkPhone($this->phone)) {
			$errors['employee_phone'] = "This phone is already registered for another employee";
		} else if (!preg_match('/^\d{10,15}$/', $this->phone)) {
		    $errors['employee_phone'] = "Invalid phone number";
		}
		if (empty($this->picture)) {
			$errors['employee_picture'] = "You didn't upload any picture";
		} else {
		$file = $this->picture;
		$file_name = $file['name'];
		$file_temp = $file['tmp_name'];
		$file_size = $file['size'];
		$file_error = $file['error'];
		$file_type = $file['type'];

		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));

		$allowed_types = array('jpg', 'jpeg', 'png');

		if (!in_array($file_ext, $allowed_types)) {
			$errors['employee_picture'] = "Invalid file type, allowed types: jpg, jpeg, png";
		}
		if ($file_error !== 0) {
			$errors['employee_picture'] = "File upload error";
		}
		if ($file_size > 5000000) {
			$errors['employee_picture'] = "File size exceeded, max size: 5MB";
		}

		if (empty($this->position)) {
			$errors['employee_position'] = "Position is required";
		}
		
		if (count($errors) > 0) {
      	// return errors to the view
			return $errors;
		} else {
      // create new employee
			$this->setEmployee($this->userId, $this->firstName, $this->lastName,$this->phone, $this->address, $this->position, $this->picture);
		}
	}


}
}
