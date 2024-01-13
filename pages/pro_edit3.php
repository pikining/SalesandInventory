<?php
include('../includes/connection.php');
            $proid =$_GET['proid'];
            $id = $_GET['id'];
			$ss= $_GET['procode'];
            $a = $_POST['qty'];
            $b = $_POST['oh'];
            $sup = $_POST['supplier'];

            $query3 =  mysqli_query($db,"SELECT PRO_ID, total_stock FROM stock as s WHERE s.PRODUCT_CODE = '".$ss."'");
            // printf("SELECT PRO_ID, total_stock FROM stock as s WHERE s.PRODUCT_CODE = '".$ss."'");
            while ($row=mysqli_fetch_array($query3)) {
                
                $stock =$row['total_stock'];

            }
            $query4 =  mysqli_query($db,"SELECT PRODUCT_ID, QTY_STOCK FROM product as p WHERE p.ID ='".$id."'");
            // printf("SELECT PRODUCT_ID, QTY_STOCK FROM product as p WHERE p.ID ='".$id."'");
            while ($row=mysqli_fetch_array($query4)) {
                
                $prevqty =$row['QTY_STOCK'];
            }

            $newstock = $stock-$prevqty;
            $totalstock = $a+$newstock;
            // printf($totalstock);

		
	 			$query = 'UPDATE product set SUPPLIER_ID="'.$sup.'", QTY_STOCK="'.$a.'", ON_HAND="'.$b.'" WHERE
					ID ="'.$id.'"';

                $query2 = 'UPDATE stock set total_stock="'.$totalstock.'", unit="'.$b.'" WHERE
					PRODUCT_CODE ="'.$ss.'"'; 
                // printf('UPDATE stock set total_stock="'.$totalstock.'", unit="'.$b.'" WHERE
                // PRO_ID ="'.$ss.'"');

					$result = mysqli_query($db, $query) or die(mysqli_error($db));

				mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
            mysqli_query($db,$query2)or die ('Error in updating product in Database '.$query2);
            if ($query) {
                echo " <script type = \"text/javascript\">
                window.location = \"pro_searchfrm.php?proid=".$proid."&o=1\"
                </script>";
            }
            else
            {
                echo " <script type = \"text/javascript\">
            alert(\"An error Occurred!\");
                window.location = \"pro_edit2.php?id=".$id."&proid=".$proid."&procode=".$ss."&o=2\"
                </script>";
            }

?>	
	<!-- <script type="text/javascript">
			alert("You've Update Product Successfully.");
			window.location = "inventory.php";
		</script> -->