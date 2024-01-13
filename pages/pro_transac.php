<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $pc = $_POST['prodcode'];
              $name = $_POST['prodname'];
              $desc = $_POST['description'];
              $qty = $_POST['quantity'];
              $oh = $_POST['onhand'];
              $pr = $_POST['price'];
              // $p_unit = $_POST['p_unit']; 
              $cat = $_POST['category'];
              $supp = $_POST['supplier'];
              $addby = $_POST['addby'];
              $sub = $_POST['subcategory'];
              // $dats = $_POST['datestock']; 
              $dats = date("Y-m-d H:i:s");
              $id = rand(10000, 99999);
          
                  $query=mysqli_query($db,"SELECT * FROM product where PRODUCT_CODE ='$pc'");
                  $ret=mysqli_fetch_array($query);

                  $query2=mysqli_query($db,"SELECT * FROM product where  NAME='$name'");
                  $ret2=mysqli_fetch_array($query2);

                  
                  if($ret > 0){ 

                   echo " <script type = \"text/javascript\">
                    window.location = \"product.php?n=4\"
                    </script>";
                  
                  }elseif($ret2 > 0){

                    echo " <script type = \"text/javascript\">
                     window.location = \"product.php?n=3\"
                     </script>";
                   
                   }
                  else{
                    $query = mysqli_query($db,"INSERT INTO product
                              (PRODUCT_ID, ID, PRODUCT_CODE, NAME, DESCRIPTION, QTY_STOCK, ON_HAND, PRICE, CATEGORY_ID,SUB_ID, SUPPLIER_ID,addby, DATE_STOCK_IN)
                              VALUES ('{$id}',Null,'{$pc}','{$name}','{$desc}','{$qty}','{$oh}','{$pr}','{$cat}','{$sub}','{$supp}','{$addby}','{$dats}')");
                    $query2 =mysqli_query($db,"INSERT INTO stock
                    (id, PRO_ID,PRODUCT_CODE, total_stock, unit)
                    VALUES (Null,'{$id}','{$pc}','{$qty}','{$oh}')");
                    // if($query){
                    //     $last_id = mysqli_insert_id($db);
                    //       mysqli_query($db,"INSERT INTO stock
                    //       (id, PRO_ID,PRODUCT_CODE, total_stock, unit)
                    //       VALUES (Null,'{$last_id}','{$pc}','{$qty}','{$oh}')");
                    // }

                    // mysqli_query($db,$query)or die ('Error in adding product in Database '.$query);
                    if ($query) {
                      echo " <script type = \"text/javascript\">
                      window.location = \"product.php?n=1\"
                      </script>";
                    }
                    else
                    {
                      echo " <script type = \"text/javascript\">
                      window.location = \"product.php?n=2\"
                      </script>";
                  }}
            ?>
              <!-- <script type="text/javascript">window.location = "product.php";</script> -->
          </div>

<?php
include'../includes/footer.php';
?>