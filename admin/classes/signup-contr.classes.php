<?php 


class SignupContr extends Signup
{
	
	private $firstName;
	private $lastName;
	private $email;
	private $phone;
	private $pwd;
	private $pwdConfirm;
	
	public function __construct($firstName, $lastName, $email, $phone, $pwd, $pwdConfirm)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->email = $email;
		$this->phone = $phone;
		$this->pwd = $pwd;
		$this->pwdConfirm = $pwdConfirm;
	}


	public function signupUser()
	{
		if ($this->emptyInput() == false) {
			header("location: ../sign-up.php?error=emptyinput");
			exit();
		}
		if ($this->invalidfirstName() == false) {
			header("location: ../sign-up.php?error=invalidfirstname");
			exit();
		}
		if ($this->invalidLastName() == false) {
			header("location: ../sign-up.php?error=invalidLastName");
			exit();
		}
		if ($this->pwdMatch() == false) {
			header("location: ../sign-up.php?error=passwordmatch");
			exit();
		} 
		if ($this->emailorPhoneExistCheck() == false) {
			header("location: ../sign-up.php?error=emailorphoneexists");
			exit();
		}

		$this->setUser($this->firstName, $this->lastName, $this->email, $this->phone, $this->pwd);
	}

	private function emptyInput()
	{
		$result;
		if(empty($this->firstName) || empty($this->lastName) || empty($this->email) || empty($this->phone) || empty($this->pwd) || empty($this->pwdConfirm)) {
			$result = false;
		}
		else {
			$result = true;
		}
		return $result;
	}

	private function invalidFirstName()
	{
		$result;
		if (!preg_match("/^[a-zA-Z]*$/", $this->firstName)) {
			$result = false;
		}
		else {
			$result = true;
		}
		return $result;
	}

	private function invalidLastName()
	{
		$result;
		if (!preg_match("/^[a-zA-Z]*$/", $this->lastName)) {
			$result = false;
		}
		else {
			$result = true;
		}
		return $result;
	}
	

	private function invalidEmail()
	{
		$result;
		if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			$result = false;
		}
		else {
			$result = true;
		}
		return $result;
	}

	private function pwdMatch()
	{
		$result;
		if ($this->pwd !== $this->pwdConfirm) {
			$result = false;
		}
		else {
			$result = true;
		}
		return $result;
	}

	private function emailorPhoneExistCheck()
	{
		$result;
		if (!$this->checkUser($this->email, $this->phone)) {
			$result = false;
		}
		else {
			$result = true;
		}
		return $result;
	}
}