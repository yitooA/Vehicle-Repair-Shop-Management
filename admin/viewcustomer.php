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
									<form id="addVehicleForm" action="includes/addvehicle.inc.php" method="post" style="display: none;">
										<input type="hidden" name="customer_id" id="customer_id" value="">
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
					<div class="col-md-6">
						<select class="form-control" id="mechanicSelect" required>
							<option value="">Select a Mechanic</option>
							<?php include 'classes/employeeview.classes.php';?>

							<?php
							$employeesView = new EmployeesView();
							$employeesView->displayEmployeesList($_SESSION['userid']);
							?>
						</select>	
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


										<p><label for="car-video">Car Images:</label></p>
										<div id="selected-images"></div>
										<label for="car-images" class="btn btn-primary">
											<span>Select Images</span>
										</label>
										<input type="file" id="car-images" name="car-images" accept="image/*" multiple style="display: none;">

										<script>
											$(document).ready(function() {
											    // Listen for changes in the file input element
												$('#car-images').on('change', function() {
											      var files = $(this)[0].files; // Get the selected files

											      // Clear the previously displayed images
											      $('#selected-images').empty();

											      // Iterate over the selected files and display them
											      for (var i = 0; i < files.length; i++) {
											      	var file = files[i];
											      	var reader = new FileReader();

											      	reader.onload = (function(file) {
											      		return function(e) {
											            // Create a container div for the image and the remove button
											      			var container = $('<div>').addClass('image-container');

											            // Create an X icon
											      			var removeIcon = $('<span>').addClass('remove-icon').html('&#10006;');

											            // Add a click event listener to the remove button
											      			removeIcon.on('click', function() {
											              // Remove the image container when the remove button is clicked
											      				container.remove();
											      			});

											            // Create an image element and set its source to the selected file
											      			var image = $('<img>').attr('src', e.target.result);

											            // Append the X icon to the container
											      			container.append(image, removeIcon);

											            // Append the container to the selected-images div
											      			$('#selected-images').append(container);
											      		};
											      	})(file);

											      	reader.readAsDataURL(file);
											      }
											  });
											});
										</script>

										<style>
											.image-container {
												position: relative;
												display: inline-block;
												margin-right: 10px;
											}

											.remove-icon {
												position: absolute;
												top: 5px;
												right: 5px;
												font-size: 14px;
												color: #ff0000;
												cursor: pointer;
											}
										</style>


										<p><label for="car-video">Car Video:</label></p>
										<div id="selected-videos"></div>
										<label for="car-video" class="btn btn-primary">
											<span>Select Video</span>
										</label>
										<input type="file" id="car-video" name="car-images" accept="video/*" multiple style="display: none;">

										<script>
											$(document).ready(function() {
										    // Listen for changes in the file input element
											$('#car-video').on('change', function() {
										      var file = $(this)[0].files[0]; // Get the selected file

										      // Clear the previously displayed video
										      $('#selected-videos').empty();

										      // Display the video
										      var video = $('<video>').attr('src', URL.createObjectURL(file)).prop('controls', true);
										      var container = $('<div>').addClass('video-container');
										      container.append(video);

										      // Create a remove button
										      var removeButton = $('<button>').addClass('remove-button').html('Remove');
										      removeButton.on('click', function() {
										        // Remove the video container when the remove button is clicked
										      	container.remove();
										      });
										      container.append(removeButton);

										      // Append the video container to the selected-videos div
										      $('#selected-videos').append(container);
										  });
											});
										</script>

										<style>
											.video-container {
												position: relative;
												display: inline-block;
												margin-right: 10px;
											}

											.video-container video {
												max-width: 300px;
												max-height: 200px;
											}

											.remove-button {
												position: absolute;
												top: 5px;
												right: 5px;
												background-color: transparent;
												border: none;
												color: red;
												cursor: pointer;
												font-size: 18px;
											}
										</style>




										<div class="form-inline d-flex w-100" id="parts_form" style="display: block;">
											<div class="form-group">
												<label for="service_type_parts">Service Type:</label>
												<select class="form-control ml-2" id="service_type_parts" onchange="toggleForms(this.value)">
													<option value="parts">Parts</option>
													<option value="labor">Labor</option>
												</select>
											</div>
											<div class="form-group mx-2">
												<label for="part_number">Part#:</label>
												<input type="text" class="form-control" id="part_number" name="part_number">
											</div>
											<div class="form-group mx-2">
												<label for="description_parts">Description:</label>
												<input type="text" class="form-control" id="description_parts" name="description_parts">
											</div>
											<div class="form-group mx-2">
												<label for="price">Price:</label>
												<input type="text" class="form-control" id="price" name="price">
											</div>
											<button type="button" class="btn btn-primary mx-2" onclick="addEntry()">Add</button>
										</div>

										<div class="form-inline d-flex w-100" id="labor_form" style="display: none;">
											<div class="form-group">
												<label for="service_type_labor">Service Type:</label>
												<select class="form-control ml-2" id="service_type_labor" onchange="toggleForms(this.value)">
													<option value="labor">Labor</option>
													<option value="parts">Parts</option>
												</select>
											</div>
											<div class="form-group mx-2">
												<label for="description_labor">Description:</label>
												<input type="text" class="form-control" id="description_labor" name="description_labor">
											</div>
											<div class="form-group mx-2">
												<label for="rate">Price:</label>
												<input type="text" class="form-control" id="rate" name="labor_price">
											</div>
											<button type="button" class="btn btn-primary mx-2" onclick="addEntry()">Add</button>
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

					//update the hidden value of customerId
					$('#customer_id').val(customerId);

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
			});

			$(document).ready(function() {
    // Get the customer and vehicle IDs from the URL
				var customerId = <?php echo isset($_GET['id']) ? $_GET['id'] : '0'; ?>;
				var vehicleId = <?php echo isset($_GET['vId']) ? $_GET['vId'] : '0'; ?>;

    // Set the selected values in the customer and vehicle selects
				if (customerId > 0) {
					$('#customerSelect').val(customerId);
        loadCustomerInfoAndVehicles(customerId); // Load customer info and vehicles
    }

    $('#customerSelect').on('change', function() {
        var customerId = $(this).val(); // Get the selected customer ID
        loadCustomerInfoAndVehicles(customerId); // Load customer info and vehicles
    });

    if (vehicleId > 0) {
    	$('#vehicleSelect').val(vehicleId);
    }

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
    				id: $('#customerSelect').val(),
    				vehicle_id: selectedVehicle,
    				user_id: <?php echo $_SESSION['userid']; ?>
    			},
    			dataType: 'json',
    			success: function(response) {
                    // Display the vehicle info
    				console.log(response);
    				$('#vehicleMake').text(response[0].make);
    				$('#vehicleModel').text(response[0].model);
    				$('#vehicleYear').text(response[0].manufactured_year);
    				$('#vehicleLicense').text(response[0].license_plate_number);
    			},
    			error: function(xhr, status, error) {
                    console.log(error); // Log any errors to the console
                }
            });
    	}
    });

    console.log(customerId);
    console.log(vehicleId);

    // Function to load customer info and vehicles
    function loadCustomerInfoAndVehicles(customerId) {
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

                // Update the hidden value of customerId
    			$('#customer_id').val(customerId);

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

                // Set the selected vehicle if available
                if (vehicleId > 0) {
                	$('#vehicleSelect').val(vehicleId);
                	$('#vehicleSelect').trigger('change');
                    vehicleId = 0; // Reset vehicleId to avoid reselecting it
                }
            },
            error: function(xhr, status, error) {
                console.log(error); // Log any errors to the console
            }
        });
    }
});


			function toggleForms(selectedType) {
				if (selectedType === "parts") {
					$("#parts_form").show();
					$("#labor_form").hide();
					$("#service_type_labor").val("labor");
        $("#service_type_parts").val("parts"); // Set selected option for parts form
    } else if (selectedType === "labor") {
    	$("#parts_form").hide();
    	$("#labor_form").show();
    	$("#service_type_parts").val("parts");
        $("#service_type_labor").val("labor"); // Set selected option for labor form
    }
}

$(document).ready(function() {
    // Initially toggle based on the selected value
	var selectedTypeParts = $("#service_type_parts").val();
	toggleForms(selectedTypeParts);

	var selectedTypeLabor = $("#service_type_labor").val();
	toggleForms(selectedTypeLabor);
});

document.addEventListener("DOMContentLoaded", function() {
	const imagePreview = document.getElementById("image-preview");
	const carImagesInput = document.getElementById("car-images");

	carImagesInput.addEventListener("change", function(event) {
		imagePreview.innerHTML = "";

		const files = event.target.files;
		for (let i = 0; i < files.length; i++) {
			const file = files[i];
			const reader = new FileReader();

			reader.onload = function(e) {
				const image = document.createElement("img");
				image.src = e.target.result;
				image.classList.add("preview-image");
				imagePreview.appendChild(image);
			}

			reader.readAsDataURL(file);
		}
	});
});

$('form').on('submit', function(event) {
  event.preventDefault(); // Prevent the default form submission

  // Retrieve the form data
  var formData = {
  	taskTitle: $('#taskTitle').val(),
  	taskDescription: $('#taskDescription').val(),
    // Add other form field values here
  };

  // Send the form data to the server using AJAX
  $.ajax({
    url: 'addtask.inc.php', // Replace with the actual URL for submitting the form data
    method: 'POST',
    data: formData,
    success: function(response) {
      // Handle the success response from the server
    },
    error: function(xhr, status, error) {
      // Handle the error response from the server
    }
});
});
</script>
<script>
	const imageInput = document.getElementById('image-input');
	const selectedImagesContainer = document.getElementById('selected-images');

	imageInput.addEventListener('change', function(event) {
		const files = event.target.files;

      // Clear the existing images
		selectedImagesContainer.innerHTML = '';

      // Iterate over the selected files
		for (let i = 0; i < files.length; i++) {
			const file = files[i];

        // Create an image element
			const img = document.createElement('img');
			img.src = URL.createObjectURL(file);

        // Append the image to the container
			selectedImagesContainer.appendChild(img);
		}
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
