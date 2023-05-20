<?php 

include_once 'dbh.classes.php';

class Employees extends Dbh
{
	
	protected function setEmployee($userId, $firstName, $lastName, $phone, $address, $position, $picture) {
		$sql = "INSERT INTO employees(user_id, first_name, last_name, phone, address, position, picture, employee_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$userId, $firstName, $lastName, $phone, $address, $position, $picture, "Active"]);
	}

	protected function getEmployees($userId) {
		$sql = "SELECT * FROM employees WHERE user_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$userId]);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	protected function deleteEmployees($userId, $employeeId) {
		$sql = "DELETE FROM employees WHERE user_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$userId]);
	}

	protected function updateEmployees($firstName, $lastName, $email, $phone, $address, $position, $picture, $userId, $customerId) {
		$sql = "UPDATE employees SET first_name= ?,last_name= ?,email= ?,phone= ?,address= ?, position = ?, picture = ? WHERE user_id = ? AND customer_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$firstName, $lastName, $email, $phone, $address]);
	}

	protected function checkPhone($phone) {
		$stmt = $this->connect()->prepare('SELECT employee_id FROM employees WHERE phone = ?;');
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
