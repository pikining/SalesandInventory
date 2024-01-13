<?php
include('../includes/connection.php');
			$zz = $_POST['id'];
			$fname = $_POST['firstname'];
		    $lname = $_POST['lastname'];
			$phone = $_POST['phone'];
	   	
		
	 			$query = 'UPDATE customer set FIRST_NAME ="'.$fname.'",
					LAST_NAME ="'.$lname.'", PHONE_NUMBER="'.$phone.'" WHERE
					CUST_ID ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

					if ($query == TRUE) {
						echo " <script type = \"text/javascript\">
						window.location = \"customer.php?m=1\"
						</script>";
					}
					else
					{
						echo " <script type = \"text/javascript\">
						window.location = \"cust_edit.php?id=".$zz."&m=2\"
						</script>";
					}
							
?>	