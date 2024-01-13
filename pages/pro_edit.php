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
      <script type="text/javascript"> 
      $(document).ready(function(){
          $("#category").change(function(){
            var CATEGORY_ID = $(this).val();
            $.ajax({
                url: "data.php",
                method: "POST",
                data: {CATEGORYID:CATEGORY_ID},
                success:function(data){
                  $("#subcategory").html(data);
                }
            })
            })
          })
    </script>
 <?php  // }
             

//} 


  $query = 'SELECT PRODUCT_ID,ID,PRODUCT_CODE, NAME, DESCRIPTION, QTY_STOCK, PRICE, c.CNAME,c.CATEGORY_ID FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID WHERE PRODUCT_ID ='.$_GET['proid'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zz = $row['PRODUCT_ID'];
      $zzz = $row['PRODUCT_CODE'];
      $A = $row['NAME'];
      $B = $row['DESCRIPTION'];
      $C = $row['PRICE'];
      $D = $row['CNAME'];
      $CI = $row['CATEGORY_ID'];
      // $p_unit = $row['p_unit'];
    }
  
    $proid = $_GET['proid'];




$sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier order by COMPANY_NAME asc";
$result2 = mysqli_query($db, $sql2) or die ("Bad SQL: $sql2");

$sup = "<select class='form-control' name='supplier' required>
        <option value='' disabled selected hidden>Select Supplier</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['SUPPLIER_ID']."'>".$row['COMPANY_NAME']."</option>";
  }

$sup .= "</select>";

?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Product</h4>
            </div>
            <a href="product.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">

            <form role="form" method="post" action="pro_edit1.php?proid=<?php echo $proid ?>">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Product Code:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Product Code" name="prodcode" value="<?php echo $zzz; ?>" >
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Product Name:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Product Name" name="prodname" value="<?php echo $A; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Description:
                </div>
                <div class="col-sm-9">
                   <textarea class="form-control" placeholder="Description" name="description"><?php echo $B; ?></textarea>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Supplier:
                </div>
                <div class="col-sm-9">
                   <?php
                    echo $sup;
                   ?>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Category:
                </div>
                <div class="col-sm-9">
                  <select class="form-control" id="category" name="category" required>
                    <option disabled selected hidden>Select Category</option>
                    <?php 
                      $query = "SELECT * FROM category order by CNAME asc";
                      $result = mysqli_query($db, $query) or die ("Bad SQL: $query");
                          while ($row = mysqli_fetch_array($result)) {
                              echo'<option value="'.$row['CATEGORY_ID'].'" >'.$row['CNAME'].'</option>';
                          }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Subcategory:
                </div>
                <div class="col-sm-9">
                <select class="form-control" id="subcategory" name="subcategory" required>
                <option disabled selected hidden>Select Subcategory</option>
                </select>
                </div>
              </div>
              
                <div class="form-group row text-left text-warning">
                  <div class="col-sm-3" style="padding-top: 5px;">
                  Price:
                  </div>
                  <div class="col-sm-9">
                    <input class="form-control" type="number" placeholder="Price" name="price" value="<?php echo $C; ?>" required>
                  </div>
                </div>
                <!-- <div class="form-group row text-left text-warning">
                  <div class="col-sm-4" style="padding-top: 5px;">
                  Price Unit:
                  </div>
                  <div class="col-sm-8">
                    <input class="form-control" placeholder="Price Unit" name="p_unit" value="<?php echo $p_unit; ?>" required>
                  </div>
                </div> -->
              
              <hr>

                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>    
              </form>  
            </div>
          </div></center>

<?php
include'../includes/footer.php';
?>

<!-- FOR UPDATING -->
<?php if (isset($_GET['o'])) :?>
    <div class="flash-data2" data-flashdata="<?= $_GET['o'];?>"></div>
<?php endif; ?>

<script src="../js/sweetalert2.all.min.js"></script>

<!-- UPDATE PRODUCT -->
<script>
// ERROR FLAG NG PRODUCT
const flashdata2= $('.flash-data2').data('flashdata')
        if (flashdata2 == 2){
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'Something went wrong!'
            })
        }

    </script>
<!-- END -->