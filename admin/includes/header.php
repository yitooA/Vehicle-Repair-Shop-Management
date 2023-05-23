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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-REjFFZHXvLMkbycK9gsjv+JjBXjyGzHJx3XdK9lj7Dg8Ev7K2cw8q9amTZ4p6H/N3t0EYJrBNMbcKlPYMPOX4w==" crossorigin="anonymous" />

	<style>
    label {
      margin-top: 10px;
    }
    .error-message {
      color: red;
    }

    #selected-images {
      display: flex;
      flex-wrap: wrap;
    }

    #selected-images img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      margin: 5px;
    }
  </style>
</head>
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