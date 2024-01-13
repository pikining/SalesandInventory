<?php
include'../includes/connection.php';
          
	
	$proid = $_GET['proid'];
	$delid = $_GET['delid'];
    

    $query3 =  mysqli_query($db,"SELECT PRO_ID, total_stock FROM stock as s WHERE s.PRO_ID = '".$proid."'");
            // printf("SELECT PRO_ID, total_stock FROM stock as s WHERE s.PRODUCT_CODE = '".$ss."'");
            while ($row=mysqli_fetch_array($query3)) {
                
                $stock =$row['total_stock'];

            }
            $query4 =  mysqli_query($db,"SELECT ID, QTY_STOCK FROM product as p WHERE p.ID ='".$delid."'");
            while ($row=mysqli_fetch_array($query4)) {
                
                $prevqty =$row['QTY_STOCK'];
            }

            $newstock = $stock-$prevqty;
            // $totalstock = $a+$newstock;
            // printf($newstock);
                $query2 = mysqli_query($db,"UPDATE stock set total_stock='$newstock' WHERE PRO_ID ='$proid'"); 
                $query = mysqli_query($db,"DELETE FROM product WHERE ID='$delid'");
                

    if ($query == TRUE) {
            

           echo "<script type = \"text/javascript\">
            window.location = (\"pro_searchfrm.php?proid=$proid&m=1\")
            </script>";
        
    }
    else{
        
            echo "<script type = \"text/javascript\">
            window.location = (\"pro_searchfrm.php?proid=$proid&m=2\")
            </script>";

        
    }
?>