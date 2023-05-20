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
                <li class="active">Team Member</li>
                <a href="add-employee.php" class="btn btn-info" style="margin-left:88%"><em class="fa fa-user-plus">&nbsp;</em> add member</a>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><em class="fa fa-user-secret">&nbsp;</em> Team Members</h1>
            </div>
        </div><!--/.row-->

        <div class="panel panel-container">
            <div style="margin:10px">
                <table id="example1" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="border-top-0">Full Name</th>
                            <th class="border-top-0">Designation</th>
                            <th class="border-top-0">Address</th>
                            <th class="border-top-0">Phone</th>
                            <th class="border-top-0">Account Status</th>
                            <th class="border-top-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once 'classes/employeeview.classes.php';

                        $userId = $_SESSION['userid'];
                        $employeesView = new EmployeesView();
                        $employeesView->displayEmployees($userId);
                        ?>
                    </tbody>
                </table>
            </div><!--/.row-->
        </div>
    </div>    <!--/.main-->

    <?php include 'includes/footer.php'; ?>
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
