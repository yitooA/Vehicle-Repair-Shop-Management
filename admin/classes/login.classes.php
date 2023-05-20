<?php 

class Login extends Dbh {
	
	protected function getUser($emailorphone, $pwd) {
		$stmt = $this->connect()->prepare('SELECT user_password FROM users WHERE email = ? OR phone = ?');

		if(!$stmt->execute(array($emailorphone, $pwd))) {
			$stmt = null;
			header("location: ../sign-up.php?error=stmtfailed");
			exit();
		}

		if ($stmt->rowCount() == 0) {
			$stmt = null;
			header("location: ../../index.php?error=usernotfound");
			exit();
		}

		$pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
		// $checkPwd = password_verify($pwd, $pwdHashed[0]["user_password"]);
		$checkPwd = $pwdHashed[0]["user_password"] == $pwd;

		if ($checkPwd == false) {
			$stmt = null;
			header("location: ../../index.php?wrongpassword");
			exit();
		}
		else if ($checkPwd == true) {
			$stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ? OR phone = ? AND user_password = ?');

			if(!$stmt->execute(array($emailorphone, $emailorphone, $pwd))) {
			$stmt = null;
			header("location: ../../index.php?error=stmtfailed");
			exit();
			}

			if ($stmt->rowCount() == 0) {
			$stmt = null;
			header("location: ../../index.php?error=usernotfound");
			exit();
			}

			$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

			session_start();
			unset($_SESSION['password']);

			$_SESSION['userid'] = $user[0]["user_id"];
			$_SESSION['first_name'] = $user[0]["first_name"];
			$_SESSION['last_name'] = $user[0]["last_name"];


			header("Location: ../index.php");




			$stmt = null;
		}

		$stmt = null;
	}	

}