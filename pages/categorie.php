<?php
include('../includes/connection.php');
            $cat =$_POST['category1'];

            $query=mysqli_query($db,"select * from category where CNAME ='$cat'");
              $ret=mysqli_fetch_array($query);
              if($ret > 0){ //Check the LRN
                echo '<script type="text/javascript">
                window.location = "category.php?n=3";
                </script>';
              }else{
            $query2 =mysqli_query($db,"INSERT INTO category ( CATEGORY_ID,CNAME)
            VALUES (NULL,'{$cat}')");
                
					//  $result = mysqli_query($db, $query) or die(mysqli_error($db));

            if ($query2 == TRUE) {
                echo " <script type = \"text/javascript\">
                window.location = \"category.php?n=1\"
                </script>";
                // $alertStyle ="alert alert-success";
                // $statusMsg="Task Added Successfully!";
            }
            else
            {
                echo " <script type = \"text/javascript\">
                window.location = \"category.php?n=2\"
                </script>";
                // $alertStyle ="alert alert-danger";
                // $stat
            }}

?>	
	<!-- <script type="text/javascript">
			alert("You've Update Product Successfully.");
			window.location = "inventory.php";
		</script> -->