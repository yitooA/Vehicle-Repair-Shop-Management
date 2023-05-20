<!DOCTYPE html>
<html>
<?php include 'includes/header.php'?>
<link rel="stylesheet" href="../assets/tables/datatables-bs4/css/dataTables.bootstrap4.min.css"> 
<body>
	
	<?php include 'includes/topbar.php'?>
	<?php include 'includes/sidebar.php'?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Customer</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><em class="fa fa-user-plus">&nbsp;</em> Add Customer</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="panel-body">
				<div class="col-md-12">
					<form role="form" method="POST" action="includes/addcustomer.inc.php">
						<div class="form-group col-md-12">
							<div class="row">
								<div class="col-md-6">
									<label>First Name</label>
									<input class="form-control" type="text" name="first_name" value="<?php echo isset($_SESSION['customerFirstName']) ? $_SESSION['customerFirstName'] : ''; ?>" required>
								</div>
								<div class="col-md-6">
									<label>Last Name</label>
									<input class="form-control" type="text" name="last_name" value="<?php echo isset($_SESSION['customerLastName']) ? $_SESSION['customerLastName'] : ''; ?>" required>
								</div>
							</div>
						</div>

						<div class="form-group col-md-12">
							<label>Address</label>
							<textarea class="form-control" name="address"><?php echo isset($_SESSION['customerAddress']) ? $_SESSION['customerAddress'] : ''; ?></textarea>
						</div>
						<div class="form-group col-md-12">
							<label>Email</label>
							<input class="form-control" type="email" name="email" value="<?php echo isset($_SESSION['customerEmail']) ? $_SESSION['customerEmail'] : ''; ?>" required>
						</div>
						<div class="form-group col-md-12">
							<label>Contact</label>
							<input class="form-control" type="text" name="phone" value="<?php echo isset($_SESSION['customerPhone']) ? $_SESSION['customerPhone'] : ''; ?>" required>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-danger" name="reset">Cancel</button>
			<button type="submit" class="btn btn-primary" name="submit">Save</button>
		</div>
	</form>
</div>
</div>
</div>
</div>	<!--/.main-->

<?php include 'includes/footer.php'?>
<!-- DataTables  & Plugins -->
<script src="../assets/tables/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script>
	$(function () {
		$("#example1").DataTable();
	});
</script>

</body>
</html>