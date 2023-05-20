<?php 

include_once 'vehicle.classes.php';
class VehiclesView extends Vehicles {

	public function displayVehicles($userId, $customerId) {
		$results = $this->getVehicles($userId, $customerId);
		foreach ($results as $row) {
            $vehicleId = $row['vehicle_id'];
            echo '<option value='. $vehicleId .'>'.$row['make']." ".$row['model']." ".$row['license_plate_number'].'</option>';
        }
    }

    public function vehicleOptions($userId, $customerId) {
        $results = $this->getVehicles($userId, $customerId);
        $options = ['<option>Select Vehicle</option>'];
        foreach ($results as $row) {
            $vehicleId = $row['vehicle_id'];
            array_push($options, '<option value='. $vehicleId .'>'.$row['make']." ".$row['model']." ".$row['license_plate_number'].'</option>');
        }

        array_push($options, '<option value="new">New</option>');

        return $options;
    }

    public function vehicleInfoDetail($userId, $customerId, $vehicleId) {
        $results = $this->getVehicleInfo($userId, $customerId, $vehicleId);
        return $results;
    }

}