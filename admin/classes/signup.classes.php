<?php 


class Signup extends Dbh
{

	protected function setUser($firstName, $lastName, $email, $phone, $password) {
		$stmt = $this->connect()->prepare('INSERT INTO users(first_name, last_name, email, phone, user_password) VALUES (?, ?, ?, ?, ?)');

		$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

		if(!$stmt->execute(array($firstName, $lastName, $email, $phone, $password))) {
			$stmt = null;
			header("location: ../sign-up.php?error=stmtfailed");
			exit();
		}

		$stmt = null;
	}	

	protected function checkUser($email, $phone) {
		$stmt = $this->connect()->prepare('SELECT email FROM users WHERE email = ? OR phone = ?;');

		if(!$stmt->execute(array($email, $phone))) {
			$stmt = null;
			header("location: ../sign-up.php?error=stmtfailed");
			exit();
		}

		$resultCheck;
		if($stmt->rowCount() > 0) {
			$resultCheck = false;
		} else {
			$resultCheck = true;
		}

		return $resultCheck;
	}	

}