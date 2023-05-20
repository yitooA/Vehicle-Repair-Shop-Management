<?php

class CustomerContr extends Customers
{
    private $userId;
    private $firstName;
    private $lastName;
    private $email;
    private $phone;
    private $address;

    public function __construct($userId, $firstName, $lastName, $email, $phone, $address)
    {
        $this->userId = $userId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
    }

public function addCustomer()
{
    $errors = array();

    if (empty($this->firstName)) {
        $errors['customer_first_name'] = "First name is required";
    } else if (!preg_match('/^[a-zA-Z ]+$/', $this->firstName)) {
        $errors['customer_first_name'] = "Invalid first name format";
    }

    if (empty($this->lastName)) {
        $errors['customer_last_name'] = "Last name is required";
    } else if (!preg_match('/^[a-zA-Z ]+$/', $this->lastName)) {
        $errors['customer_last_name'] = "Invalid last name format";
    }

    if (empty($this->address)) {
        $errors['customer_address'] = "Address is required";
    }

    if (empty($this->phone)) {
        $errors['customer_phone'] = "Phone is required";
    } else if ($this->checkPhone($this->phone)) {
        $errors['customer_phone'] = "This phone is already registered for another customer";
    } else if (!preg_match('/^\d{10,15}$/', $this->phone)) {
        $errors['customer_phone'] = "Invalid phone number";
    }

    if (empty($this->email)) {
        $errors['customer_email'] = "Email is required";
    } else if ($this->checkEmail($this->email)) {
        $errors['customer_email'] = "This email is already registered for another customer";
    } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        $errors['customer_email'] = "Invalid email format";
    }

    if (count($errors) > 0) {
        // Return errors to the view
        return $errors;
    } else {
        // Create new customer
        $customers = new Customers();
        $customers->setCustomer($this->userId, $this->firstName, $this->lastName, $this->email, $this->phone, $this->address);
        return []; // Return an empty array to indicate success
    }
}

}

?>
