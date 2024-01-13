<?php
include'../includes/connection.php';
          
	// if (!isset($_GET['do']) || $_GET['do'] != 1) {
						
    // 	switch ($_GET['type']) {
    // 		case 'product':
    // 			$query = 'DELETE FROM product WHERE PRODUCT_ID = ' . $_GET['id'];
    // 			$result = mysqli_query($db, $query) or die(mysqli_error($db));				
             ?>
     			<!--<script type="text/javascript">alert("Product Successfully Deleted.");window.location = "inventory.php";</script> -->					
            <?php
    			//break;
    //         }
	// }
	$proid = $_GET['proid'];
	$delid = $_GET['delid'];
    $query = mysqli_query($db,"DELETE FROM product WHERE ID='$delid'");

    if ($query == TRUE) {
            

           echo "<script type = \"text/javascript\">
            alert(\"Product Successfully Deleted.\");
            window.location = (\"inv_searchfrm.php?proid=$proid\")
            </script>";
        
    }
    else{
        
            echo "<script type = \"text/javascript\">
            alert(\"Product Unsuccessfully Deleted. Please try again.\");
            window.location = (\"inv_searchfrm.php?proid=$proid\")
            </script>";

        
    }
?>