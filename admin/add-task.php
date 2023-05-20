<!DOCTYPE html>
<html>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="../assets/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
<body>

	<?php include 'includes/topbar.php'; ?>
	<?php include 'includes/sidebar.php'; ?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Task</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><em class="fa fa-tasks">&nbsp;</em> Add Task</h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">Customers</div>
							<div class="panel-body">
								<select class="form-control" id="customerSelect" required>
									<option value="">Select a customer</option>
									<!-- Customer options will be loaded dynamically -->
									<?php
										include 'classes/customersview.classes.php';

										$customerView = new CustomersView();
										$customerView->displayCustomersList($_SESSION['userid']);
									?>
								</select>
								<div id="customerInfo">
									<!-- Customer info will be displayed here -->
									<p><span style="font-weight: bold;">Name: </span><span id="customerName"></span></p>
									<p><span style="font-weight: bold;">Phone: </span><span id="customerPhone"></span></p>
									<p><span style="font-weight: bold;">Address: </span><span id="customerAddress"></span></p>
									<p><span style="font-weight: bold;">Email: </span><span id="customerEmail"></span></p>
								</div>
								<div class="mt-3" id="customerSpace"></div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">Vehicles</div>
							<div class="panel-body">
								<select class="form-control" id="vehicleSelect" required>
									<option value="">Select a vehicle</option>
									<option value="new">New</option>
									<!-- Vehicle options will be loaded dynamically -->
								</select>
								<div id="vehicleInfo">
									<!-- Vehicle info will be displayed here -->
									<p><span style="font-weight: bold;">Make: </span><span id="vehicleMake"></span></p>
									<p><span style="font-weight: bold;">Model: </span><span id="vehicleModel"></span></p>
									<p><span style="font-weight: bold;">Year: </span><span id="vehicleYear"></span></p>
									<p><span style="font-weight: bold;">License Plate Number: </span><span id="vehicleLicense"></span></p>
								</div>
								<div class="mt-3" id="vehicleSpace">
									<form id="addVehicleForm" action="addvehicle.inc.php" style="display: none;">
									  <div class="form-group">
									    <label for="makeInput">Make:</label>
									    <input type="text" class="form-control" id="makeInput" name="make" required>
									  </div>
									  <div class="form-group">
									    <label for="modelInput">Model:</label>
									    <input type="text" class="form-control" id="modelInput" name="model" required>
									  </div>
									  <div class="form-group">
									    <label for="yearInput">Year:</label>
									    <input type="text" class="form-control" id="yearInput" name="year" required>
									  </div>
									  <div class="form-group">
									    <label for="licenseInput">License Plate Number:</label>
									    <input type="text" class="form-control" id="licenseInput" name="plate_number" required>
									  </div>
									  <button id="submit-btn" type="submit" class="btn btn-primary" name="submit" value="Add Vehicle">Add Vehicle</button>
									</form>

								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">Task Details</div>
								<div class="panel-body">
									<form role="form">
										<div class="form-group">
											<label>Task Title</label>
											<input class="form-control" id="taskTitle" placeholder="Enter task title" required>
										</div>
										<div class="form-group">
											<label>Task Description</label>
											<textarea class="form-control" id="taskDescription" rows="3" placeholder="Enter task description" required></textarea>
										</div>
										<button type="submit" class="btn btn-primary">Submit</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script>
			$(document).ready(function() {
		// Function to handle the change event of the customer select
				$('#customerSelect').on('change', function() {
			var customerId = document.getElementById('customerSelect').value; // Get the selected customer ID

			// Make an AJAX request to get the customer info and vehicle options
			$.ajax({
				url: 'includes/customerinfo.inc.php',
				method: 'GET',
				data: {
					customer_id: customerId,
					user_id: <?php echo $_SESSION['userid']; ?>
				},
				dataType: 'json',
				success: function(response) {
					// Display the customer info
					var customerInfo = response.customerInfo[0];
					$('#customerName').text(customerInfo.first_name + ' ' + customerInfo.last_name);
					$('#customerPhone').text(customerInfo.phone);
					$('#customerAddress').text(customerInfo.address);
					$('#customerEmail').text(customerInfo.email);

					// Populate the vehicle options
					var vehicleOptions = response.vehicleOption;
					$('#vehicleSelect').empty(); // Clear existing options
					if (vehicleOptions.length > 0) {
						$.each(vehicleOptions, function(index, option) {
							$('#vehicleSelect').append(option);
						});
					} else {
						$('#vehicleSelect').append('<option value="">No vehicles found</option><option value="new">New</option>');
					}
				},
				error: function(xhr, status, error) {
					console.log(error); // Log any errors to the console
				}
			});
		});

		// Function to handle the change event of the vehicle select
				$('#vehicleSelect').on('change', function() {
					var selectedVehicle = $(this).val();

					if (selectedVehicle === 'new') {
						$('#vehicleInfo').hide();
						$('#addVehicleForm').show();
					} else {
						$('#vehicleInfo').show();
						$('#addVehicleForm').hide();
						$.ajax({
							url: 'includes/vehicleinfo.inc.php',
							method: 'GET',
							data: {
								id: document.getElementById('customerSelect').value,
								vehicle_id: selectedVehicle,
								user_id: <?php echo $_SESSION['userid']; ?>
							},
							dataType: 'json',
							success: function(response) {
							// Display the customer info
								console.log(response);
								$('#vehicleMake').text(response[0].make);
								$('#vehicleModel').text(response[0].model);
								$('#vehicleYear').text(response[0].manufatured_year);
								$('#vehicleLicense').text(response[0].license_plate_number);
							},
							error: function(xhr, status, error) {
							console.log(error); // Log any errors to the console
						}
					});
					}
				});

	// Function to handle the submit event of the add vehicle form
document.getElementById('submit-btn').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default form submission behavior
    
    // Get the form data
    var formData = new FormData(document.getElementById('addVehicleForm'));
    
    // Get the selected customer ID
    var customerId = document.getElementById('customerSelect').value;
    
    // Add the customer ID to the form data
    formData.append('customer_id', customerId);
    
    // Make an AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'includes/addvehicle.inc.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                // Vehicle added successfully, display success message
                alert(response.message);
                // Perform any other necessary actions
            } else {
                // Errors occurred, display error message(s)
                alert(response.message);
                // Display error details, if available
                if (response.errors) {
                    console.log(response.errors);
                }
            }
        }
    };
    xhr.send(formData);
});






			});
		</script>

	</div>

	<?php include 'includes/footer.php'; ?>
	<!-- Include jQuery and AJAX library -->
	<!-- Include jQuery and AJAX library -->
	<!-- Include jQuery and AJAX library -->

});

</script>



</body>
</html>
