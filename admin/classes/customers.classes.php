<?php 

include_once 'dbh.classes.php';

class Customers extends Dbh
{

	protected function setCustomer($userId, $firstName, $lastName, $email, $phone, $address) {
		$sql = "INSERT INTO customers(user_id, first_name, last_name, email, phone, address) VALUES (?, ?, ?, ?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$userId, $firstName, $lastName, $email, $phone, $address]);
	}

	protected function getCustomers($userId) {
		$sql = "SELECT * FROM customers WHERE user_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$userId]);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}
	protected function customerInfoDetail($userId, $customerId) {
		$sql = "SELECT * FROM customers WHERE user_id = ? AND customer_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$userId, $customerId]);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;	
	}

	protected function deleteCustomers($userId) {
		$sql = "DELETE FROM customers WHERE user_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$userId]);
	}

	protected function updateCustomers($firstName, $lastName, $email, $phone, $address, $userId, $customerId) {
		$sql = "UPDATE customers SET first_name= ?,last_name= ?,email= ?,phone= ?,address= ? WHERE user_id = ? AND customer_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$firstName, $lastName, $email, $phone, $address, $userId, $customerId]);
	}

	protected function checkEmail($email) {
		$stmt = $this->connect()->prepare('SELECT customer_id FROM customers WHERE email = ?;');
		$stmt->execute([$email]);
		
		$resultCheck;
		if($stmt->rowCount() > 0) {
			$resultCheck = true;
		} else {
			$resultCheck = false;
		}

		return $resultCheck;
	}

	protected function checkPhone($phone) {
		$stmt = $this->connect()->prepare('SELECT customer_id FROM customers WHERE phone = ?;');
		$stmt->execute([$phone]);

		$resultCheck;
		if($stmt->rowCount() > 0) {
			$resultCheck = true;
		} else {
			$resultCheck = false;
		}

		return $resultCheck;
	}


}