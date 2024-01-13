<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $name = $_POST['companyname'];
              $prov = $_POST['province'];
              $cit = $_POST['city'];
              $phone = $_POST['phonenumber'];

              $query=mysqli_query($db,"SELECT * FROM supplier where COMPANY_NAME ='$name'");
              $ret=mysqli_fetch_array($query);

              if($ret > 0){ 

               echo " <script type = \"text/javascript\">
                window.location = \"supplier.php?n=3\"
                </script>";               
               }
              else{   
                    $query = "INSERT INTO location
                              (LOCATION_ID, PROVINCE, CITY)
                              VALUES (Null,'{$prov}','{$cit}')";
                    mysqli_query($db,$query)or die ('Error in updating location in Database');

                    $query2 = "INSERT INTO supplier
                              (SUPPLIER_ID, COMPANY_NAME, LOCATION_ID, PHONE_NUMBER)
                              VALUES (Null,'{$name}',(SELECT MAX(LOCATION_ID) FROM location),'".$phone."')";
                    mysqli_query($db,$query2)or die ('Error in updating supplier in Database');

                if ($query && $query2 == TRUE) {
                  echo " <script type = \"text/javascript\">
                  window.location = \"supplier.php?n=1\"
                  </script>";
                }
                else
                {
                  echo " <script type = \"text/javascript\">
                  window.location = \"supplier.php?n=2\"
                  </script>";
              }
              }
            ?>
          </div>

<?php
include'../includes/footer.php';
?>