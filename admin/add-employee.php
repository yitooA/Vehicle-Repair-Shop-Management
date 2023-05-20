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
				<li class="active">Employee</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><em class="fa fa-user-plus">&nbsp;</em> Add Employee</h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container">
			<div class="panel-body">
				<div class="col-md-12">
					<form role="form" method="POST" action="includes/addemployee.inc.php" enctype="multipart/form-data">
						<div class="form-group col-md-6">
							<label>First Name</label>
							<input class="form-control" type="text" name="first_name" required>
						</div>
						<div class="form-group col-md-6">
							<label>Last Name</label>
							<input class="form-control" type="text" name="last_name" required>
						</div>
						<div class="form-group col-md-6">
							<label>Phone</label>
							<input class="form-control" type="text" name="phone" required>
						</div>
						<div class="form-group col-md-6">
							<label>Address</label>
							<input class="form-control" type="text" name="address" required>
						</div>
						<div class="form-group col-md-6">
							<label>Picture</label>
							<input class="form-control" type="file" name="picture" required>
						</div>
						<div class="form-group col-md-6">
							<label>Position</label>
							<input class="form-control" type="text" name="position" required>
						</div>
						<div class="form-group col-md-12">
							<button type="submit" class="btn btn-danger" name="reset">Cancel</button>
							<button type="submit" class="btn btn-primary" name="submit">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> <!--/.main-->

	<?php include 'includes/footer.php'; ?>
	<!-- DataTables & Plugins -->
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
