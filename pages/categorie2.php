<?php
include('../includes/connection.php');
            $cat =$_POST['category'];
            $subcat =$_POST['subcat'];

            $query=mysqli_query($db,"select * from subcategory where SUB_NAME ='$subcat'");
              $ret=mysqli_fetch_array($query);
              if($ret > 0){ //Check the SUB_NAME
                echo '<script type="text/javascript">
                window.location = "category.php?n=4";
                </script>';
              }else{
            $query2 ="INSERT INTO subcategory ( SUB_ID,SUB_NAME,CAT_ID)
            VALUES (NULL,'{$subcat}','{$cat}')";
                
					$result = mysqli_query($db, $query2) or die(mysqli_error($db));

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