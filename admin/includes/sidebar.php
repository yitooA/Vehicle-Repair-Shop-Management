	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			
			<div class="profile-usertitle">
				<?php 
				if (isset($_SESSION['userid'])) {
				?><div class="profile-usertitle-name">
					<div style="background-color: #59d438;
					width: 10px;
					height: 10px;
					border-radius: 50%;
					display: inline-block;
					margin-right: 10px;"></div>
					<?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?></div>
					<?php 
				} else 
				{
					?>
					<div class="profile-usertitle-name">Not User Detected</div>
				<?php }
				?>
			</div>
			<div class="clear"></div>
		</div>
		
		<ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="customer.php"><em class="fa fa-users">&nbsp;</em> Customer</a></li>
			<li><a href="task-information.php"><em class="fa fa-line-chart">&nbsp;</em> Tasks</a></li>
			<li><a href="invoice.php"><em class="fa fa-file-text">&nbsp;</em> Invoice</a></li>
			<li><a href="team.php"><em class="fa fa-user-secret">&nbsp;</em> Team</a></li>
			<!-- <li><a href="payment.php"><em class="fa fa-money">&nbsp;</em> Payment</a></li> -->
			<li><a href="company-settings.php"><em class="fa fa-cogs">&nbsp;</em> Settings</a></li>
		<li><a href="income-report.php"><em class="fa fa-bar-chart">&nbsp;</em> Income Report</a></li>
		<li><a href="includes/logout.inc.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
	</ul>
	</div><!--/.sidebar-->