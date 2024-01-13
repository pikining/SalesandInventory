<?php
include('../includes/connection.php');
			$zz = $_GET['proid'];
			$pc = $_POST['prodcode'];
			$pname = $_POST['prodname'];
            $desc = $_POST['description'];
            $pr = $_POST['price'];
			// $p_unit = $_POST['p_unit'];
            $cat = $_POST['category'];
			$sub = $_POST['subcategory'];
			$sup = $_POST['supplier'];

		
	 			$query = 'UPDATE product set NAME="'.$pname.'", PRODUCT_CODE ="'.$pc.'",
					DESCRIPTION="'.$desc.'", PRICE="'.$pr.'", CATEGORY_ID ="'.$cat.'" ,SUB_ID ="'.$sub.'" , SUPPLIER_ID ="'.$sup.'" WHERE
					PRODUCT_ID ="'.$zz.'"';
				
				$query2 = 'UPDATE stock set PRODUCT_CODE ="'.$pc.'" WHERE PRO_ID ="'.$zz.'"';

					$result = mysqli_query($db, $query) or die(mysqli_error($db));
					$result = mysqli_query($db, $query2) or die(mysqli_error($db));

					if ($query) {
						echo " <script type = \"text/javascript\">
						window.location = \"pro_searchfrm.php?proid=".$zz."&o=1\"
						</script>";
					}
					else
					{
						echo " <script type = \"text/javascript\">
						window.location = \"pro_edit.php?proid=".$zz."&o=2\"
						</script>";
					}
?>	