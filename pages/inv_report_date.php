<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
$results = '';
error_reporting(0);
?>
<?php
  if(isset($_POST['submit'])){

    $req_dates = array('start-date','end-date');
    validate_fields($req_dates);

    if(empty($errors)):
      $start_date   = $_POST['start-date'];
      $end_date     = $_POST['end-date'];
      $results      = find_sale_by_dates($start_date,$end_date);
    else:
        echo " <script type = \"text/javascript\">
        alert(\"An error Occurred!\");
            window.location = \"inv_date.php\"
            </script>";
    endif;

  } else {
    echo " <script type = \"text/javascript\">
        alert(\"An error Occurred!\");
            window.location = \"inv_date.php\"
            </script>";
  

  // $start_date = $_POST['start-date'];
  // $end_date = $_POST['end-date'];
  // $results = ($start_date.' '.$end_date);
  }
 
  // printf("SELECT p.DESCRIPTION, p.NAME, p.PRICE, p.PRODUCT_CODE, p.DATE_STOCK_IN,p.p_unit, p.ON_HAND, sp.COMPANY_NAME, sb.SUB_NAME, c.CNAME, s.total_stock FROM product p JOIN stock s ON p.PRODUCT_CODE = s.PRODUCT_CODE JOIN supplier sp ON p.SUPPLIER_ID=sp.SUPPLIER_ID JOIN subcategory sb ON p.SUB_ID=sb.SUB_ID JOIN category c ON p.CATEGORY_ID=c.CATEGORY_ID WHERE p.DATE_STOCK_IN BETWEEN '$start_date' AND '$end_date' GROUP BY p.PRODUCT_CODE ASC");

?>
<?php if($results): ?>
  <style>
  @media print{
    body * {
      visibility: hidden;
    }

    .print-invoice, .print-invoice *{
      visibility: visible;
      width: 100%;
    }

    .print_btn {
      visibility: hidden;
    }
    
    .print-invoice{
      position: absolute;
      left: 0px;
      top: 0px;
      margin: 0px;
    }
  }

</style>

    <div class="card shadow mb-4 print-invoice">
       <div class="card-header py-3">
           <center><h1>Inventory Report</h1>
           <strong><?php if(isset($start_date)){ echo $start_date;}?> TILL DATE <?php if(isset($end_date)){echo $end_date;}?> </strong></center>
           <button onclick="window.print()" type="button" class="btn btn-info print_btn" style="float: right;">Print</button>
       </div>
       <div class="card-body">
          <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
              <th>Date</th>
              <th>Product Code</th>
              <th>Product Name</th>
              <th>Category</th>
              <th>Subcategory</th>
              <th>Description</th>
              <th>Supplier</th>
              <th>Price</th>
              <th>Total Stock</th>
              <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php  
          foreach($results as $result): ?>
          <!-- // $sum = 0;
          // $sql  = "SELECT p.DESCRIPTION, p.NAME, p.PRICE,p.PRODUCT_ID, p.PRODUCT_CODE, p.DATE_STOCK_IN,p.p_unit, p.ON_HAND, sp.COMPANY_NAME, sb.SUB_NAME,p.PRICE*s.total_stock AS Totals, c.CNAME, s.total_stock FROM product p 
          // JOIN stock s ON p.PRODUCT_CODE = s.PRODUCT_CODE 
          // JOIN supplier sp ON p.SUPPLIER_ID=sp.SUPPLIER_ID 
          // JOIN subcategory sb ON p.SUB_ID=sb.SUB_ID 
          // JOIN category c ON p.CATEGORY_ID=c.CATEGORY_ID
          // WHERE p.DATE_STOCK_IN BETWEEN '$start_date' AND '$end_date' GROUP BY p.PRODUCT_CODE ASC";
          //  $result = mysqli_query($db, $sql) or die(mysqli_error($db));
          //  while($row = mysqli_fetch_array($result))
          //  { 
          //    $procode = $row['PRODUCT_CODE'];
          //    $name = $row['NAME'];
          //    $cname = $row['CNAME'];
          //    $subname = $row['SUB_NAME'];
          //    $desc = $row['DESCRIPTION'];
          //    $sup = $row['COMPANY_NAME'];
          //    $price = $row['PRICE'];
          //    $unit = $row['ON_HAND'];
          //    $stock = $row['total_stock'];
          //    $punit = $row['p_unit'];
          //    $date = $row['DATE_STOCK_IN'];
          //    $total = $price * $stock;
          //    $tots = $row['Totals'];
          //   //  $grands = $row['grands'];
          //   //  $tots[] = $price * $stock;
          //   $sum += $row['Totals'];
          //   //  $a = array($total);
          //   //  $grand = (count($a));
          //    printf($sum[]);
?> -->
           <tr>
              <td ><?php echo remove_junk($result['date']);?></td>
              <td >
                <h6><?php echo remove_junk($result['PRODUCT_CODE']);?></h6>
              </td>
              <td ><?php echo remove_junk($result['NAME']);?></td>
              <td ><?php echo remove_junk($result['CNAME']);?></td>
              <td ><?php echo remove_junk($result['SUB_NAME']);?></td>
              <td ><?php echo remove_junk($result['DESCRIPTION']);?></td>
              <td ><?php echo remove_junk($result['COMPANY_NAME']);?></td>
              <td ><?php echo remove_junk($result['PRICE']);?></td>
              <td ><?php echo remove_junk($result['total_stock']).''.remove_junk($result['ON_HAND']);?></td>
              <td ><?php echo remove_junk($result['Totals']);?></td>
          </tr>
          <!-- <tr>
              <td ><?php echo $date;?></td>
              <td >
                <h6><?php echo $procode;?></h6>
              </td>
              <td ><?php echo $name;?></td>
              <td ><?php echo $cname;?></td>
              <td ><?php echo $subname;?></td>
              <td ><?php echo $desc;?></td>
              <td ><?php echo $sup;?></td>
              <td ><?php echo  '&#8369 '.$price.' per '.$punit;?></td>
              <td ><?php echo $stock.''.$unit;?></td>
              <td ><?php echo $total;?></td>
          </tr> -->
          <?php endforeach; ?>
        </tbody>
        <tfoot>
         <tr class="text-right">
           <td colspan="8"></td>
           <td colspan="1">Grand Total</td>
           <td> 
           <?php echo '&#8369 '. number_format(total_price($results)[0], 2);?>
          </td>
         </tr>
        </tfoot>
        <?php  
      // }
      ?>
      </table>
                <?php
    else:
      echo " <script type = \"text/javascript\">
        alert(\"An error Occurred!\");
            window.location = \"inv_date.php\"
            </script>";
     endif;
  ?>
        <!-- </div> -->
       </div>
    </div>

    
<?php
include'../includes/footer.php';
?>
