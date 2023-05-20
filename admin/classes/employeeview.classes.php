<?php  

include_once 'employees.classes.php';
class EmployeesView extends Employees {

	public function displayEmployees($userId) {
		$results = $this->getEmployees($userId);
		foreach ($results as $row) {
			$employeeId = $row['employee_id'];
			echo '<tr>
			<td>'. $row['first_name'] . " " .$row['last_name'] .'</td>
			<td>'. $row['position'] .'</td>
			<td>'. $row['address'] .'</td>
			<td>'. $row['phone'] .'</td>
			<td><span class="badge bg-success">'. $row["employee_status"].'</span></td>
			<td>
			<ul class="pull-right panel-settings" style="border:none">
			<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
			<em class="fa fa-cogs"></em>
			</a>
			<ul class="dropdown-menu dropdown-menu-right">
			<li>
			<ul class="dropdown-settings">
			<li><a href="#">
			<em class="fa fa-eye"></em> view
			</a></li>
			<li><a href="#">
			<em class="fa fa-edit"></em> edit
			</a></li>
			<li class="divider"></li>
			<li><a href="#">
			<em class="fa fa-trash"></em> delete
			</a></li>
			</ul>
			</li>
			</ul>
			</li>
			</ul>
			</td>
			</tr>;';
		}
	}

	public function displayEmployeesList($userId) {
		$results = $this->getEmployees($userId);
        foreach ($results as $row) {
            $employeeId = $row['employee_id'];
            echo '<option value='. $employeeId .'>'.$row['first_name']." ".$row['last_name'].'</option>';
        }
	}
}


