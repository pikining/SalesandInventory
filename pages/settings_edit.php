<?php
include('../includes/connection.php');
require_once('session.php');
			$zz = $_POST['id'];
			$a = $_POST['firstname'];
            $b = $_POST['lastname'];
            $c = $_POST['gender'];
            $d = $_POST['username'];
            $e = $_POST['password'];
            $f = $_POST['email'];
            $g = $_POST['phone'];
            $i = $_POST['hireddate'];
            $j = $_POST['province'];
            $k = $_POST['city'];

            $h_pw = password_hash($e, PASSWORD_DEFAULT);
		
	 			$query = 'UPDATE users u 
	 						join employee e on e.EMPLOYEE_ID=u.EMP_ID
	 						join location l on l.LOCATION_ID=e.LOCATION_ID
	 						set e.FIRST_NAME="'.$a.'", e.LAST_NAME="'.$b.'", GENDER="'.$c.'", USERNAME="'.$d.'", PASSWORD = "'.$h_pw.'",  EMAIL="'.$f.'", emp_email="'.$f.'", l.PROVINCE ="'.$j.'", l.CITY ="'.$k.'", PHONE_NUMBER ="'.$g.'",HIRED_DATE ="'.$i.'" WHERE
					ID ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
              <?php 

                $sql = 'SELECT ID
                          FROM users';
                $result2 = mysqli_query($db, $sql) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result2)) {
                          $a = $row['ID'];
                
        if ($_SESSION['JOB_TITLE']=='Cashier'){?> 

             <script type="text/javascript">
                alert("You've updated your account successfully.");
                window.location = "pos.php?n=3";
            </script><?php

        }else {?>

            <script type="text/javascript">
                alert("You've updated your account successfully.");
                window.location = "index.php?n=3";
            </script><?php
        }
?>

        <?php } ?>