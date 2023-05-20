<?php 
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
 ?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vehicle-Repair-and-Maintenance-Management-System</title>
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="../assets/css/datepicker3.css" rel="stylesheet">
	<link href="../assets/css/styles.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<style>
    label {
      margin-top: 10px;
    }
    .error-message {
      color: red;
    }
  </style>
</head>