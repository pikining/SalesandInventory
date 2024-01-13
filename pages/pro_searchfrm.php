<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
//                 $query = 'SELECT ID, t.TYPE
//                           FROM users u
//                           JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
//                 $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
//                 while ($row = mysqli_fetch_assoc($result)) {
//                           $Aa = $row['TYPE'];
                   
// if ($Aa=='User'){
           
  ?>   
  <!-- <script type="text/javascript">
          //then it will be redirected
          alert("Restricted Page! You will be redirected to POS");
          window.location = "pos.php";
      </script> -->
 <?php  // }
             

//} 
            ?>
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Product's Detail</h4>
            </div>
            <a href="product.php?action=add" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back</a>
            <div class="card-body">
          <?php 
            $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME,DESCRIPTION, PRICE, c.CNAME, s.COMPANY_NAME,sb.SUB_NAME FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID join supplier s on p.SUPPLIER_ID=s.SUPPLIER_ID join subcategory sb on p.SUB_ID=sb.SUB_ID WHERE PRODUCT_ID ='.$_GET['proid'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
                $zz= $row['PRODUCT_ID'];
                $zzz= $row['PRODUCT_CODE'];
                $i= $row['NAME'];
                $a=$row['DESCRIPTION'];
                $c=$row['PRICE'];
                // $p_unit=$row['p_unit'];
                $d=$row['CNAME'];
                $sub=$row['SUB_NAME'];
              } 
              $proid = $_GET['proid'];
          ?>

                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Product Code<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $zzz; ?><br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Product Name<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $i; ?> <br>
                        </h5>
                      </div>
                    </div>
                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Description<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $a; ?><br>
                        </h5>
                      </div>
                    </div>
                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Price <br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : &#8369 <?php echo $c; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <!-- <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Supplier<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $sup; ?><br>
                        </h5>
                      </div>
                    </div> -->
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Category<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $d; ?><br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Subcategory<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $sub; ?><br>
                        </h5>
                      </div>
                    </div>
                </div>
          </div></center>

          <div class="card shadow mb-4 col-xs-12 col-md-15 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Inventory</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Product Code</th>
                     <th>Product Name</th>
                     <th>Quantity</th>
                     <th>Supplier</th> 
                     <!-- <th>Unit</th> -->
                     <!-- <th>Category</th>-->
                     <th>Added By</th>
                     <th>Date Stock In</th>
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
    $query = 'SELECT PRODUCT_ID,PRODUCT_CODE,ID, NAME, QTY_STOCK,COMPANY_NAME,  ON_HAND, e.FIRST_NAME, e.LAST_NAME, DATE_STOCK_IN FROM product p join employee e on p.addby=e.EMPLOYEE_ID  JOIN supplier s ON p.SUPPLIER_ID=s.SUPPLIER_ID where PRODUCT_ID ='.$_GET['proid'].' ORDER BY DATE_STOCK_IN DESC';
    // join category c on p.CATEGORY_ID=c.CATEGORY_ID JOIN supplier s ON p.SUPPLIER_ID=s.SUPPLIER_ID
    // printf('SELECT PRODUCT_CODE, NAME, QTY_STOCK,  ON_HAND, CNAME, COMPANY_NAME, p.SUPPLIER_ID, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID JOIN supplier s ON p.SUPPLIER_ID=s.SUPPLIER_ID  where PRODUCT_CODE ='.$_GET['code'].'');
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['PRODUCT_CODE'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $row['QTY_STOCK'].''. $row['ON_HAND'].'</td>';
                echo '<td>'. $row['COMPANY_NAME'].'</td>';
                // echo '<td>'. $row['ON_HAND'].'</td>';
                // echo '<td>'. $row['CNAME'].'</td>';  
                echo '<td>'. $row['FIRST_NAME'].' '. $row['LAST_NAME'].'</td>';
                echo '<td>'. $row['DATE_STOCK_IN'].'</td>';
                echo '<td align="center">
                      <a type="button" class="btn btn-warning bg-gradient-warning" href="pro_edit2.php?id='.$row['ID'].'&procode='.$row['PRODUCT_CODE'].'&proid='.$row['PRODUCT_ID'].'"><i class="fas fa-fw fa-edit"></i> Edit</a>

                      <a type="button" class=" delete btn btn-danger bg-gradient-danger" href="pro_del2.php?delid='.$row['ID']. '&proid='.$row['PRODUCT_ID'].'"><i class="fas fa-fw fa-trash"></i> Delete</a>
                      </div></td>';
                echo '</tr> ';
                        }
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>


<?php
include'../includes/footer.php';
?>

<!-- FOR UPDATING -->
<?php if (isset($_GET['o'])) :?>
    <div class="flash-data2" data-flashdata="<?= $_GET['o'];?>"></div>
<?php endif; ?>
  <!-- FOR DELETING -->
<?php if (isset($_GET['m'])) :?>
    <div class="flash-data" data-flashdata="<?= $_GET['m'];?>"></div>
<?php endif; ?>

<script src="../js/sweetalert2.all.min.js"></script>

<!-- UPDATE PRODUCT -->
<script>
// SUCCESS FLAG NG PRODUCT
const flashdata2= $('.flash-data2').data('flashdata')
        if (flashdata2 == 1){
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Product Edited Successfully!'
            })
        }
    </script>
<!-- END -->
<!-- DELETE CATEGORY -->
<script>
$('.delete').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
        })
    });

        // SUCCESS FLAG NG DELETE PRODUCT
        const flashdata= $('.flash-data').data('flashdata')
        if (flashdata == 1){
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Record has been deleted!'
            })
        }
        if (flashdata1 == 2){
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'Product Unsuccessfully Deleted. Please try again!'
            })
        }

    </script>
<!-- END -->