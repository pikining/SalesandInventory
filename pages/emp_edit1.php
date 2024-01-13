<?php
include'../includes/connection.php';

			$zz = $_POST['id'];
			$fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $gen = $_POST['gender'];
            $email = $_POST['email'];
			$empid = $_POST['employeeid'];
            $phone = $_POST['phone'];
            $hdate = $_POST['hireddate'];
            $prov = $_POST['province'];
            $cit = $_POST['city'];
			$brgy = $_POST['barangay'];
            $unit = $_POST['unit'];


	 			$query = 'UPDATE employee e join location l on l.LOCATION_ID=e.LOCATION_ID join users u on u.EMP_ID=e.EMPLOYEE_ID set FIRST_NAME="'.$fname.'",
					LAST_NAME="'.$lname.'",
					GENDER="'.$gen.'", EMAIL="'.$email.'", emp_email="'.$email.'", employeeid="'.$empid.'", USERNAME="'.$empid.'", PHONE_NUMBER="'.$phone.'", HIRED_DATE ="'.$hdate.'", l.PROVINCE ="'.$prov.'", l.CITY ="'.$cit.'", l.Barangay ="'.$brgy.'", l.Unit ="'.$unit.'" WHERE
					EMPLOYEE_ID ="'.$zz.'"';
				
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

                    if($query == TRUE){
                      
                        echo " <script type = \"text/javascript\">
                        window.location = \"employee.php?o=1\"
                        </script>";
                      }
                      else
                      {
                        echo " <script type = \"text/javascript\">
                        window.location = \"emp_edit.php?id=".$zz."o=2\"
                        </script>";
                    }
?>	