<?php 

include_once 'customers.classes.php';
class CustomersView extends Customers {

	public function displayCustomers($userId) {
		$results = $this->getCustomers($userId);
		foreach ($results as $row) {
            $customerId = $row['customer_id'];
            echo '<tr>
            <td>'. $row['first_name'] . $row['last_name'] .'</td>
            <td>'. $row['address'] .'</td>
            <td>'. $row['email'] .'</td>
            <td>'. $row['phone'] .'</td>
            <td>
            <ul class="pull-right panel-settings" style="border:none">
            <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
            <em class="fa fa-cogs"></em>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
            <li>
            <ul class="dropdown-settings">
            <li><a href="viewcustomer.php?id='.$customerId.'">
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
            </tr>';
        }
    }

    public function customerInfo($userId, $customerId) {
        $results = $this->customerInfoDetail($userId, $customerId);
        return $results;
    }

    public function displayCustomersList($userId) {
        $results = $this->getCustomers($userId);
        foreach ($results as $row) {
            $customerId = $row['customer_id'];
            echo '<option value='. $customerId .'>'.$row['first_name']." ".$row['last_name'].'</option>';
        }
    }

}