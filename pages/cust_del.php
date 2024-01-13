<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 

                // $query = 'SELECT ID, t.TYPE
                //           FROM users u
                //           JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                // $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                // while ($row = mysqli_fetch_assoc($result)) {
                //           $Aa = $row['TYPE'];
                   
// if ($Aa=='User'){
           
          ?>   <!-- <script type="text/javascript">
//                       //then it will be redirected
//                       alert("Restricted Page! You will be redirected to POS");
//                       window.location = "pos.php";
//                   </script>-->
             <?php   //}
                         
           
//}
	//if (!isset($_GET['do']) || $_GET['do'] != 1) {
						
    	// switch ($_GET['type']) {
    	// 	case 'customer':
    	// 		$query = 'DELETE FROM customer WHERE CUST_ID = ' . $_GET['id'];
    	// 		$result = mysqli_query($db, $query) or die(mysqli_error($db));				
            ?>
    			<!--<script type="text/javascript">alert("Customer Successfully Deleted.");window.location = "customer.php";</script>	-->				
            <?php
    			//break;
          //  }
	//}

    $delid = $_GET['delid'];
    $query = mysqli_query($db,"DELETE FROM customer WHERE CUST_ID='$delid'");

    if ($query == TRUE) {
            ?>

            <script type = "text/javascript">
            window.location = "customer.php?o=1";
            </script>
        <?php
    }
    else{
        ?>
            <script type = "text/javascript">
            window.location = "customer.php?o=2";
            </script>

        <?php
    }
?>