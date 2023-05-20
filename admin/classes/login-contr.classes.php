<?php 

class LoginContr extends Login
{
	
	private $emailorphone;
	private $pwd;
	
	public function __construct($emailorphone, $pwd)
	{
		$this->emailorphone = $emailorphone;
		$this->pwd = $pwd;
	}

	public function loginUser() {
		if ($this->emptyInput() == false) {
			// echo "Empty Input!";
			header("Location: ../../index.php?error=emptyinput");
			exit();
		}

		$this->getUser($this->emailorphone, $this->pwd);
	}

	private function emptyInput()
	{
		$result;
		if(empty($this->emailorphone) || empty($this->pwd)) {
			$result = false;
		}
		else {
			$result = true;
		}
		return $result;
	}

	
}