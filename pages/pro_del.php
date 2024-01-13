<?php
include'../includes/connection.php';


    $proid = $_GET['proid'];
	$delid = $_GET['delid'];
    $query = mysqli_query($db,"DELETE FROM product WHERE ID='$delid'");
    $query1 = mysqli_query($db,"DELETE FROM stock WHERE PRO_ID='$proid'");
    if ($query == TRUE) {
            ?>

            <script type = "text/javascript">
            window.location = "product.php?m=1";
            </script>
        <?php
    }
    else{
        ?>
            <script type = "text/javascript">
            window.location = "product.php?m=2";
            </script>

        <?php
    }
?>