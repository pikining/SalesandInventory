<?php
include'../includes/connection.php';
session_start();

              $date = $_POST['date'];
              $customer = $_POST['customer'];
              $subtotal = $_POST['subtotal'];
              $lessvat = $_POST['lessvat'];
              $netvat = $_POST['netvat'];
              $addvat = $_POST['addvat'];
              $total = $_POST['total'];
              $cash = $_POST['cash'];
              $emp = $_POST['employee'];
              $rol = $_POST['role']; 
              //imma make it trans uniq id
              $today = date("mdGis"); 
              $cashs= number_format($cash, 2);
              $countID = count($_POST['name']);
              // echo "<table>";
              if($total > $cashs){
                echo " <script type = \"text/javascript\">
                window.location = \"pos.php?z=1\"
                </script>";
              }else{
              switch($_GET['action']){ 
                case 'add':  
                for($i=1; $i<=$countID; $i++)
                  {
                    // echo "'{$today}', '".$_POST['name'][$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['price'][$i-1]."', '{$emp}', '{$rol}' <br>";
                      $quantity= $_POST['quantity'][$i-1];
                    $query = "INSERT INTO `transaction_details`
                               (`ID`, `TRANS_D_ID`,`PRODUCTS_CODE`, `PRODUCTS`, `QTY`, `PRICE`, `EMPLOYEE`, `ROLE`)
                               VALUES (Null, '{$today}', '".$_POST['code'][$i-1]."','".$_POST['name'][$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['price'][$i-1]."', '{$emp}', '{$rol}')";

                    mysqli_query($db,$query)or die (mysqli_error($db));

                    if($query){
                      $query3 =  mysqli_query($db,"SELECT PRO_ID, total_stock FROM stock as s WHERE s.PRODUCT_CODE = '".$_POST['code'][$i-1]."'");
                      // printf("SELECT PRO_ID, total_stock FROM stock as s WHERE s.PRODUCT_CODE = '".$_POST['code'][$i-1]."'");
                        while ($row=mysqli_fetch_array($query3)) {
                            
                            $stock =$row['total_stock'];
                        }
                    }

                    $newstock = $stock - $quantity;
                    $query2 = 'UPDATE stock set total_stock="'.$newstock.'" WHERE
					          PRODUCT_CODE ="'.$_POST['code'][$i-1].'"'; 
                    mysqli_query($db,$query2)or die (mysqli_error($db));

                    }
                    $query111 = "INSERT INTO `transaction`
                               (`TRANS_ID`, `CUST_ID`, `NUMOFITEMS`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`)
                               VALUES (Null,'{$customer}','{$countID}','{$subtotal}','{$lessvat}','{$netvat}','{$addvat}','{$total}','{$cash}','{$date}','{$today}')";
                    mysqli_query($db,$query111)or die (mysqli_error($db));

                    
                break;
              }}
                    unset($_SESSION['pointofsale']);
                    if ($query == TRUE && $query2 == TRUE && $query111 == TRUE ) {
                      echo " <script type = \"text/javascript\">
                      window.location = \"pos.php?o=1\"
                      </script>";
                  }
                  else
                  {
                      echo " <script type = \"text/javascript\">
                  alert(\"An error Occurred!\");
                      window.location = \"pos.php?o=2\"
                      </script>";
                  }
               ?>
          </div>



























<?php
              // switch($_GET['action']){
              //   case 'add':     
              //       $query = "INSERT INTO transaction_details
              //                  (`ID`, `PRODUCTS`, `EMPLOYEE`, `ROLE`)
              //                  VALUES (Null, 'here', '{$emp}', '{$rol}')";
              //       mysqli_query($db,$query)or die ('Error in Database '.$query);
              //       $query2 = "INSERT INTO `transaction`
              //                  (`TRANS_ID`, `CUST_ID`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`)
              //                  VALUES (Null,'{$customer}','{$subtotal}','{$lessvat}','{$netvat}','{$addvat}','{$total}','{$cash}','{$date}','{$today}'')";
              //       mysqli_query($db,$query2)or die ('Error in updating Database2 '.$query2);
              //   break;
              // }

              // mysqli_query($db,"INSERT INTO transaction_details
              //                 (`ID`, `PRODUCTS`, `EMPLOYEE`, `ROLE`)
              //                 VALUES (Null, 'a', '{$emp}', '{$rol}')");

              // mysqli_query($db,"INSERT INTO `transaction`
              //                 (`TRANS_ID`, `CUST_ID`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_DETAIL_ID`)
              //                 VALUES (Null,'{$customer}',{$subtotal},{$lessvat},{$netvat},{$addvat},{$total},{$cash},'{$date}',(SELECT MAX(ID) FROM transaction_details))");

              // header('location:posdetails.php');

            ?>
<!--  <script type="text/javascript">
      alert("Transaction successfully added.");
      window.location = "pos.php";
      </script> -->