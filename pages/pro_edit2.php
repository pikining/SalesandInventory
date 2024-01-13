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
$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='category'>
        <option disabled selected>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$opt .= "</select>";

  $query = 'SELECT PRODUCT_ID,PRODUCT_CODE, NAME,QTY_STOCK, ON_HAND,COMPANY_NAME, c.CNAME FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID JOIN supplier s ON p.SUPPLIER_ID=s.SUPPLIER_ID WHERE ID ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      // $zz = $row['PRODUCT_ID'];
      $zzz = $row['PRODUCT_CODE'];
      $A = $row['NAME'];
      $B = $row['QTY_STOCK'];
      $C = $row['ON_HAND'];
      $D = $row['COMPANY_NAME'];
      $E = $row['CNAME'];
    }
      $proid = $_GET['proid'];
      $id = $_GET['id'];
      $procode = $_GET['procode'];

      $sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier order by COMPANY_NAME asc";
    $result2 = mysqli_query($db, $sql2) or die ("Bad SQL: $sql2");
    
    $sup = "<select class='form-control' name='supplier' required>
            <option value=''disabled selected hidden>Select a Supplier</option>";
      while ($row = mysqli_fetch_assoc($result2)) {
        $sup .= "<option value='".$row['SUPPLIER_ID']."'>".$row['COMPANY_NAME']."</option>";
      }
    
    $sup .= "</select>";     
?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Inventory for : <?php echo $A ?></h4>
            </div>
            <a type="button" class="btn btn-primary bg-gradient-primary" href="pro_searchfrm.php?proid=<?php echo $proid ?>"><i class="fas fa-fw fa-flip-horizontal fa-share"></i> Back</a>
                
            <div class="card-body">

            <form role="form" method="post" action="pro_edit3.php?id=<?php echo $id ?>&proid=<?php echo $proid ?>&procode=<?php echo $procode ?>">
              <!-- <input type="hidden" name="idd" value="<?php echo $zz; ?>" /> -->
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Product Code:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" value="<?php echo $zzz; ?>" readonly>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Product Name:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" value="<?php echo $A; ?>" readonly>
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
                 Quantity:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Quantity" name="qty" value="<?php echo $B; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Unit:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="On Hand" name="oh" value="<?php echo $C; ?>" required>
                </div>
              </div>
             <!--  <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Category:
                </div>
                <div class="col-sm-9">
                   <input class="form-control"value="<?php echo $E; ?>" readonly>
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