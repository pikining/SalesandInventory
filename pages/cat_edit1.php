<?php
include('../includes/connection.php');
            $catid =$_GET['catid'];
            $cat =$_POST['category'];

            $query2 ='UPDATE category SET CNAME="'.$cat.'" WHERE CATEGORY_ID='.$catid.'';
                
					$result = mysqli_query($db, $query2) or die(mysqli_error($db));

            if ($query2) {
                echo " <script type = \"text/javascript\">
                window.location = \"category.php?o=1\"
                </script>";
                // $alertStyle ="alert alert-success";
                // $statusMsg="Task Added Successfully!";
            }
            else
            {
                echo " <script type = \"text/javascript\">
                window.location = \"category.php?o=2\"
                </script>";
                // $alertStyle ="alert alert-danger";
                // $stat
            }

?>	
