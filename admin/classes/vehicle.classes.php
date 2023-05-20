<?php 

include_once 'dbh.classes.php';

class Vehicles extends Dbh
{
	protected function setVehicle($userId, $customerId, $make, $model, $year, $plateNumber) {
		$sql = "INSERT INTO vehicle(user_id, customer_id, make, model, year, license_plate_number) VALUES (?, ?, ?, ?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$userId, $customerId, $make, $model, $year, $plateNumber]);
	}

	protected function getVehicles($userId, $customerId) {
		$sql = "SELECT * FROM vehicle WHERE user_id = ? AND customer_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$userId, $customerId]);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	protected function getVehicleInfo($userId, $customerId, $vehicleId) {
		$sql = "SELECT * FROM vehicle WHERE user_id = ? AND customer_id = ? AND vehicle_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$userId, $customerId, $vehicleId]);

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;	
	}

	protected function deleteVehicle($userId) {
		$sql = "DELETE FROM vehicle WHERE user_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$userId]);
	}

	protected function updateVehicle($plateNumber, $make, $model, $year, $userId, $vehicleId) {
		$sql = "UPDATE vehicle SET license_plate_number= ?,make= ?,model= ?,year= ? WHERE user_id = ? AND vehicle_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$plateNumber, $make, $model, $year, $userId, $vehicleId]);
	}

	protected function checkPlateNumber($plateNumber) {
		$stmt = $this->connect()->prepare('SELECT vehicle_id FROM vehicle WHERE license_plate_number = ?;');
		$stmt->execute([$plateNumber]);
		
		$resultCheck;
		if($stmt->rowCount() > 0) {
			$resultCheck = true;
		} else {
			$resultCheck = false;
		}

		return $resultCheck;
	}
}
