<?php
include('../includes/connection.php');
            $id = $_GET['proid'];
			$pc = $_GET['code'];
			$pname = $_GET['name'];
            $desc = $_POST['description'];
            $pr = $_GET['price'];
            $cat = $_GET['cname'];
            $sub = $_GET['sub'];
            $qty = $_POST['quantity'];
            $onhand = $_POST['onhand'];
            $supp = $_POST['supplier'];
            $addby = $_POST['addby'];
            $dats = date("Y-m-d H:i:s");
            // $IDD = rand(10000, 99999);
          

            $query3 =  mysqli_query($db,"SELECT s.PRODUCT_CODE, s.total_stock FROM product as p LEFT JOIN stock as s ON s.PRODUCT_CODE = p.PRODUCT_CODE  WHERE p.PRODUCT_CODE = '".$pc."'");
            while ($row=mysqli_fetch_array($query3)) {
                
                $stock =  $row['total_stock'];

            }

            $query = "INSERT INTO product
            ( ID,PRODUCT_ID,PRODUCT_CODE, NAME, DESCRIPTION, QTY_STOCK, ON_HAND, PRICE, CATEGORY_ID,SUB_ID, SUPPLIER_ID, addby,DATE_STOCK_IN)
            VALUES (NULL,'{$id}','{$pc}','{$pname}','{$desc}','{$qty}','{$onhand}',{$pr},{$cat},{$sub},{$supp},{$addby},'{$dats}')";


            $query2 = 'UPDATE stock set total_stock='.$qty+$stock.' WHERE
            PRODUCT_CODE ="'.$pc.'"';
            
             mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
            mysqli_query($db,$query2)or die ('Error in updating product in Database '.$query2);
            if ($query) {
                echo " <script type = \"text/javascript\">
                window.location = \"product.php?o=1\"
                </script>";
                // $alertStyle ="alert alert-success";
                // $statusMsg="Task Added Successfully!";
            }
            else
            {
                echo " <script type = \"text/javascript\">
                window.location = \"product.php?o=2\"
                </script>";
                // $alertStyle ="alert alert-danger";
                // $stat
            }

							
?>	