<?php

	// Connect to database
	include'../includes/connection.php';

	// Check if id is set or not if true toggle,
	// else simply go back to the page
	if (isset($_GET['id'])){

		// Store the value from get to a
		// local variable "course_id"
		$employee_id=$_GET['id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `employee` SET
			`designation`= 0 WHERE EMPLOYEE_ID='$employee_id'";

		// Execute the query
		mysqli_query($db,$sql);
	}

	// Go back to course-page.php
	header('location: employee.php');
?>