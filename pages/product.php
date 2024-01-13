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





$sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier order by COMPANY_NAME asc";
$result2 = mysqli_query($db, $sql2) or die ("Bad SQL: $sql2");

$sup = "<select class='form-control' name='supplier' required>
        <option disabled selected hidden>Select Supplier</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['SUPPLIER_ID']."'>".$row['COMPANY_NAME']."</option>";
  }

$sup .= "</select>";

$addby = $_SESSION['MEMBER_ID'];
    // printf($addby);
?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Product&nbsp;<a  href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Product Code</th>
                     <th>Product Name</th>
                     <th>Price</th>
                     <th>Category</th>
                     <th>Supplier</th>
                     <!-- <th>Date Created</th> -->
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
    $query = 'SELECT PRODUCT_ID, ID,PRODUCT_CODE, NAME, PRICE, CNAME, COMPANY_NAME, DATE_STOCK_IN, p.CATEGORY_ID FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID join supplier s on p.SUPPLIER_ID=s.SUPPLIER_ID GROUP BY PRODUCT_CODE ';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['PRODUCT_CODE'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $row['PRICE'].'</td>';
                echo '<td>'. $row['CNAME'].'</td>';
                echo '<td>'. $row['COMPANY_NAME'].'</td>';
                // echo '<td>'. $row['DATE_STOCK_IN'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="pro_searchfrm.php?proid='.$row['PRODUCT_ID'] .'"><i class="fas fa-fw fa-list-alt"></i></a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-info bg-gradient-info btn-block" style="border-radius: 0px;" href="pro_stock.php?proid='.$row['PRODUCT_ID']. '">
                                    <i class="fas fa-fw fa-plus"></i> Add Stock
                                  </a>
                                </li>
                                <li>
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="pro_edit.php?id='.$row['ID'].'&proid='.$row['PRODUCT_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="delete btn btn-danger bg-gradient-danger btn-block" style="border-radius: 0px;" href="pro_del.php?delid='.$row['ID']. '&proid='.$row['PRODUCT_ID']. '">
                                    <i class="fas fa-fw fa-trash"></i> Delete
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
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

  <!-- Product Modal-->
  <div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="pro_transac.php?action=add">
          <input type="hidden" name="addby" value="<?php echo $addby; ?>" />
           <div class="form-group">
             <input class="form-control" placeholder="Product Code" name="prodcode" required>
           </div>
           <div class="form-group">
             <input class="form-control" placeholder="Product Name" name="prodname" required>
           </div>
           <div class="form-group">
             <textarea rows="5" cols="50"  class="form-control" placeholder="Description" name="description" required></textarea>
           </div>
           <div class="row">
              <div class=" col-6 form-group">
                <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity" required>
              </div>
              <div class="col-6 form-group">
                <input class="form-control" placeholder="Unit ex. pcs, pack or box" name="onhand" required>
              </div>
              <!-- <div class="form-group">
                <input type="number"  min="1" max="999999999" class="form-control" placeholder="On Hand" name="onhand" required>
              </div> -->
           </div>
            <div class="form-group">
              <input type="number"  min="1" max="9999999999" class="form-control" placeholder="Price per pcs, pack, etc." name="price" required>
            </div>
              <!-- <div class="col-6 form-group">
                <input class="form-control" placeholder="Price per ex. pcs or pack " name="p_unit" required>
              </div> -->
              <!-- <div class="form-group">
                <input type="number"  min="1" max="999999999" class="form-control" placeholder="On Hand" name="onhand" required>
              </div> -->
           <div class="form-group">
             <?php
               echo $sup;
             ?>
           </div>
           <div class="row">
              <div class="col-6 form-group">
              <select class="form-control" id="category" name="category" required>
              <option disabled selected hidden>Select Category</option>
              <?php 
                // require_once 'data.php';
                // $category= loadcategorys();
                // foreach ($category as $categorys){
                //   echo'<option id="'.$categorys['CATEGORY_ID'].'" value="'.$categorys['CATEGORY_ID'].'" >'.$categorys['CNAME'].'</option>';
                // }

                $query = "SELECT * FROM category order by CNAME asc";
                $result = mysqli_query($db, $query) or die ("Bad SQL: $query");
                //         echo'<select class="category form-control" name="category" required>';
                //       echo'<option disabled selected hidden>Select Category</option>';
                    while ($row = mysqli_fetch_array($result)) {
                        echo'<option value="'.$row['CATEGORY_ID'].'" >'.$row['CNAME'].'</option>';
                    }
                // echo '</select>';
              ?>
              </select>
              </div>
              
              <div class="col-6 form-group">
                <select class="form-control" id="subcategory" name="subcategory" required>
                <option disabled selected hidden>Select Subcategory</option>
                    <?php 
                      // echo ' <select class="form-control" id="subcategory" name="subcategory" required>';
                      // echo'<option disabled selected hidden>Select Subcategory</option>';
                      // echo '</select>';
                    ?>  
                </select>
              </div>
           </div>
           
           <!-- <div class="form-group">
             <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Date Stock In" name="datestock" required>
           </div> -->
            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>

  <!-- FOR DELETING -->
<?php if (isset($_GET['m'])) :?>
    <div class="flash-data" data-flashdata="<?= $_GET['m'];?>"></div>
<?php endif; ?>
<!-- FOR ADDING -->
<?php if (isset($_GET['n'])) :?>
    <div class="flash-data1" data-flashdata="<?= $_GET['n'];?>"></div>
<?php endif; ?>
<!-- FOR ADDING STOCK -->
<?php if (isset($_GET['o'])) :?>
    <div class="flash-data2" data-flashdata="<?= $_GET['o'];?>"></div>
<?php endif; ?>

<script src="../js/sweetalert2.all.min.js"></script>
<!-- ADD PRODUCT -->
<script>
//  SUCCESS FLAG NG PRODUCT
const flashdata1= $('.flash-data1').data('flashdata')
        if (flashdata1 == 1){
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Product added successfully!'
            })
        }
        if (flashdata1 == 2){
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'Something went wrong!'
            })
        }
        if (flashdata1 == 3){
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'This Product Name already exist!'
            })
        }
        if (flashdata1 == 4){
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'This Product Code already exist!'
            })
        }
    </script>
<!-- END -->
<!-- ADD STOCK PRODUCT -->
<script>
//  SUCCESS FLAG NG PRODUCT
const flashdata2= $('.flash-data2').data('flashdata')
        if (flashdata2 == 1){
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Stock added successfully!'
            })
        }
        if (flashdata2 == 2){
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'Something went wrong!'
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
        if (flashdata == 2){
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'Product Unsuccessfully Deleted. Please try again!'
            })
        }

    </script>
<!-- END -->
