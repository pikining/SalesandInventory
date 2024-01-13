<?php
include('../includes/connection.php');
            $subid =$_GET['subid'];
            $cat =$_POST['category'];
            $subcat =$_POST['subcat'];

           
            $query2 ='UPDATE subcategory SET SUB_NAME="'.$subcat.'",CAT_ID="'.$cat.'" WHERE SUB_ID="'.$subid.'"';
                
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
	<!-- <script type="text/javascript">
			alert("You've Update Product Successfully.");
			window.location = "inventory.php";
		</script> -->