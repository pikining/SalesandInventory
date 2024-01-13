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

$opt = "<select class='form-control' name='category' required>
        <option value='' disabled selected hidden>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$opt .= "</select>";



  $query = "SELECT  NAME,QTY_STOCK,PRODUCT_CODE,p.SUB_ID,sb.SUB_NAME, DESCRIPTION ,c.CATEGORY_ID, ON_HAND,PRICE, s.COMPANY_NAME , c.CNAME FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID join subcategory sb on p.SUB_ID=sb.SUB_ID join supplier s on p.SUPPLIER_ID=s.SUPPLIER_ID WHERE PRODUCT_ID =$_GET[proid]";
// printf("SELECT  QTY_STOCK, DESCRIPTION,PRICE, s.COMPANY_NAME , c.CNAME FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID join supplier s on p.SUPPLIER_ID=s.SUPPLIER_ID WHERE PRODUCT_ID =$_GET[id]");

  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {  
      $A = $row['NAME'];
      $B = $row['DESCRIPTION'];
      $C = $row['PRICE'];
      $D = $row['CNAME'];
      $DD = $row['CATEGORY_ID'];
      $S = $row['COMPANY_NAME'];
      $T = $row['ON_HAND'];
      $zzz = $row['PRODUCT_CODE'];
      $G= $row['SUB_NAME'];
      $GG= $row['SUB_ID'];
    }

    $ID = $_GET['proid'];

    $sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier order by COMPANY_NAME asc";
    $result2 = mysqli_query($db, $sql2) or die ("Bad SQL: $sql2");
    
    $sup = "<select class='form-control' name='supplier' required>
            <option value=''disabled selected hidden>Select a Supplier</option>";
      while ($row = mysqli_fetch_assoc($result2)) {
        $sup .= "<option value='".$row['SUPPLIER_ID']."'>".$row['COMPANY_NAME']."</option>";
      }
    
    $sup .= "</select>";   
    
    $addby = $_SESSION['MEMBER_ID'];
    // printf($addby);
?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Add New Stock of <?php echo $A; ?></h4>
            </div>
            <a href="product.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">

            <form role="form" method="post" action="pro_stock1.php?code=<?php echo $zzz;?>&name=<?php echo $A;?>&cname=<?php echo $DD;?>&price=<?php echo $C;?>&proid=<?php echo $ID;?>&sub=<?php echo $GG;?>">
              <input type="hidden" name="addby" value="<?php echo $addby; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Product Code:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Product Code" name="prodcode" value="<?php echo $zzz; ?>" disabled>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Product Name:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Product Name" name="prodname" value="<?php echo $A; ?>" disabled>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Category:
                </div>
                <div class="col-sm-9">
                <input class="form-control" placeholder="Category" name="category" value="<?php echo $D; ?>" disabled>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Subcategory:
                </div>
                <div class="col-sm-9">
                <input class="form-control" placeholder="Category" name="subcategory" value="<?php echo $G; ?>" disabled>
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
                 Price:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Price" name="price" value="<?php echo $C; ?>" disabled>
                </div>
              </div>
              <div class="row">
                <div class=" col-6 form-group">
                    <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity" required>
                </div>
                <div class="col-6 form-group">
                    <input class="form-control" placeholder="Unit ex. pcs, pack or box" name="onhand" value="<?php echo $T; ?>" required>
                </div>
                <!-- <div class="form-group">
                    <input type="number"  min="1" max="999999999" class="form-control" placeholder="On Hand" name="onhand" required>
                </div> -->
              </div>
              
              <hr>

                <button type="submit" class="btn btn-info btn-block"><i class="fa fa-plus fa-fw"> </i>Add Stock</button>    
              </form>  
            </div>
          </div></center>

<?php
include'../includes/footer.php';
?>