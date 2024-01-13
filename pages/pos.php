<script src="../js/sweetalert2.all.min.js"></script>
<?php
include'../includes/connection.php';
include'../includes/topp.php';
error_reporting(0);

// session_start();
$product_ids = array();
//session_destroy();
// Check the available stock
if (isset($_POST['addpos'])){

  $alertStyle ="";
  $statusMsg="";
  

  $quantity = $_POST['quantity'];
  $code = $_POST['code'];

  $query =mysqli_query($db, "SELECT PRODUCT_ID,p.PRODUCT_CODE,NAME,PRICE,s.total_stock FROM product p JOIN stock s on p.PRODUCT_ID=s.PRO_ID WHERE p.PRODUCT_CODE = '$code'  ");
    if($row = mysqli_fetch_assoc($query)){
        if($row){
            //$add_info = student_load_section($row['sectionId'],$_SESSION['global_session']);
            $stock = $row['total_stock'];
        }
    }

  if($quantity > $stock){
    echo"<script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Lack of stock!'
    })</script>
    ";
  }else{
    //check if Add to Cart button has been submitted
if(filter_input(INPUT_POST, 'addpos')){
  if(isset($_SESSION['pointofsale'])){
      
      //keep track of how mnay products are in the shopping cart
      $count = count($_SESSION['pointofsale']); 
      
      //create sequantial array for matching array keys to products id's
      $product_ids = array_column($_SESSION['pointofsale'], 'id');

      if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
      $_SESSION['pointofsale'][$count] = array
          (
              'id' => filter_input(INPUT_GET, 'id'),
              'name' => filter_input(INPUT_POST, 'name'),
              'price' => filter_input(INPUT_POST, 'price'),
              'quantity' => filter_input(INPUT_POST, 'quantity'),
              'code' => filter_input(INPUT_POST, 'code')
          );   
      }
      else { //product already exists, increase quantity
          //match array key to id of the product being added to the cart
          for ($i = 0; $i < count($product_ids); $i++){
              if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                  //add item quantity to the existing product in the array
                  $_SESSION['pointofsale'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
              }
          }
      }
      
  }
  else { //if shopping cart doesn't exist, create first product with array key 0
      //create array using submitted form data, start from key 0 and fill it with values
      $_SESSION['pointofsale'][0] = array
      (
          'id' => filter_input(INPUT_GET, 'id'),
          'name' => filter_input(INPUT_POST, 'name'),
          'price' => filter_input(INPUT_POST, 'price'),
          'quantity' => filter_input(INPUT_POST, 'quantity'),
          'code' => filter_input(INPUT_POST, 'code')
      );
  }
}
  }
}




if(filter_input(INPUT_GET, 'action') == 'delete'){
    //loop through all products in the shopping cart until it matches with GET id variable
    foreach($_SESSION['pointofsale'] as $key => $product){
        if ($product['id'] == filter_input(INPUT_GET, 'id')){
            //remove product from the shopping cart when it matches with the GET id
            unset($_SESSION['pointofsale'][$key]);
        }
    }
    //reset session array keys so they match with $product_ids numeric array
    $_SESSION['pointofsale'] = array_values($_SESSION['pointofsale']);
}

//pre_r($_SESSION);

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
                ?>
                <div class="row">
                <div class="col-lg-12">
                  <div class="card shadow mb-0">
                  <div class="card-header py-2">
                  <h4 class="m-2 font-weight-bold text-primary">Product</h4>
                  </div>
                        <!-- /.panel-heading -->
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <!-- <ul class="nav nav-tabs">
                              <li class="nav-item">
                                <a class="nav-link" href="#" data-target="#keyboard" data-toggle="tab">Keyboard</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#" data-target="#mouse" data-toggle="tab">Mouse</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#headset" data-toggle="tab">Headset</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#cpu" data-toggle="tab">CPU</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#monitor" data-toggle="tab">Monitor</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#motherboard" data-toggle="tab">Motherboard</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#processor" data-toggle="tab">Processor</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#powersupply" data-toggle="tab">Power Supply</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#others" data-toggle="tab">Others</a>
                              </li>
                            </ul> -->

                            <form method="post" action="pos.php">
                              <div class="row">
                              <button class="btn btn-dark" name="submit"> Find It</button>
                              <input type="text" class="col-3 form-control " placeholder="Find Product" name="search" id="search"> 
                              </div>
                            </form>
              <div class="container my-3 table-responsive" id="searchresult">
                <table class="table table-bordered" width="100%" cellspacing="0"> 
                  <?php 
                  if(isset($_POST['submit'])){
                    $search=$_POST['search'];

                    $sql="SELECT * FROM product WHERE PRODUCT_CODE like '%$search%' or NAME like '%$search%' Group By PRODUCT_CODE";
                    $result=mysqli_query($db,$sql);
                    if($result){
                      if(mysqli_num_rows($result)>0){
                        echo '
                        <thead>
                                <tr>
                                  <th>Product Code</th>
                                  <th>Product Name</th>
                                  <th>Price</th>
                                  <th>Quantity</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                        ';
                       while($row=mysqli_fetch_assoc($result)){
                        echo '<tbody>
                        <form method="post" action="pos.php?action=add&id='. $row['PRODUCT_ID'].'">
                        
                                <td>'. $row['PRODUCT_CODE'].'<input type="hidden" name="code" value="'. $row['PRODUCT_CODE'].'"</td>
                                <td>'. $row['NAME'].'<input type="hidden" name="name" value="'. $row['NAME'].'"</td>
                                <td>'. $row['PRICE'].'<input type="hidden" name="price" value="'. $row['PRICE'].'"</td>
                                <td class ="col-2"><input type="number" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" name="quantity" class="form-control" value="1" /></td>
                                <td><input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                                value="Add"/></td>
                        
                              </tbody>
                              <div class="<?php echo $alertStyle;?>" role="alert"><?php echo $statusMsg;?></div>
                              </form>
                        ';
                       }
                      }else{
                        echo' <h2 class="text-danger"> Data Not Found </h2>';
                      }
                    }
                  }
                  
                  ?>
              
                                    
                                </tbody>
                            </table>
                        </div>

<!-- TAB PANE AREA - ANG UNOD KA TABS ARA SA TABPANE.PHP -->
<?php include 'postabpane.php'; ?>
<!-- END TAB PANE AREA - ANG UNOD KA TABS ARA SA TABPANE.PHP -->

        <div style="clear:both"></div>  
        <br />  
        <div class="card shadow mb-4 col-md-12">
        <div class="card-header py-3 bg-white">
          <h4 class="m-2 font-weight-bold text-primary">Point of Sale</h4>
        </div>
        
      <div class="row">    
      <div class="card-body col-md-9">
        <div class="table-responsive">

        <!-- trial form lang   -->
<form role="form" method="post" action="pos_transac.php?action=add">
  <input type="hidden" name="employee" value="<?php echo $_SESSION['FIRST_NAME']; ?>">
  <input type="hidden" name="role" value="<?php echo $_SESSION['JOB_TITLE']; ?>">
  
        <table class="table">    
        <tr>  
             <th width="55%">Product Name</th>  
             <th width="10%">Quantity</th>  
             <th width="15%">Price</th>  
             <th width="15%">Total</th>  
             <th width="5%">Action</th>  
        </tr>  
        <?php  

        if(!empty($_SESSION['pointofsale'])):  
            
             $total = 0;  
        
             foreach($_SESSION['pointofsale'] as $key => $product): 
        ?>  
        <tr>  
          <td>
            <input type="hidden" name="name[]" value="<?php echo $product['name']; ?>">
            <?php echo $product['name']; ?>
          </td>  

           <td>
            <input type="hidden" name="quantity[]" value="<?php echo $product['quantity']; ?>">
            <?php echo $product['quantity']; ?>
          </td>  

           <td>
            <input type="hidden" name="price[]" value="<?php echo $product['price']; ?>">
            ₱ <?php echo number_format($product['price']); ?>
          </td>  
          
           <td>
            <input type="hidden" name="total" value="<?php echo $product['quantity'] * $product['price']; ?>">
            ₱ <?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>  
           <td>
               <a href="pos.php?action=delete&id=<?php echo $product['id']; ?>">
                    <div class="btn bg-gradient-danger btn-danger"><i class="fas fa-fw fa-trash"></i></div>
               </a>
           </td>  
           
            <input type="hidden" name="code[]" value="<?php echo $product['code']; ?>">
          
        </tr>
        <?php  
                  $total = $total + ($product['quantity'] * $product['price']);
             endforeach;  
        ?>


        <?php  
        endif;
        ?>  
        </table> 
         </div>
       </div> 

       <!-- JQUERY -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
       <!-- AUTO SEARCH -->
       <script>
          $(document).ready(function(){

              $("#search").keyup(function(){

                  var input = $(this).val();

                  if (input != ""){
                      $.ajax({
                          url:"livesearch.php",
                          method: "POST",
                          data:{input:input},

                          success:function(data){
                            $("#searchresult").html(data);
                          }
                      });
                  }else{
                    $("#searchresult").css("display","none");
                  }
              });
          });
       </script>
<?php
include 'posside.php';
include'../includes/footer.php';
?>
<!-- FOR UPDATING -->
<?php if (isset($_GET['n'])) :?>
    <div class="flash-data1" data-flashdata="<?= $_GET['n'];?>"></div>
<?php endif; ?>
<!-- FOR PAYMENT -->
<?php if (isset($_GET['z'])) :?>
    <div class="flash-data" data-flashdata="<?= $_GET['z'];?>"></div>
<?php endif; ?>
<!-- FOR TRANSACTION -->
<?php if (isset($_GET['o'])) :?>
    <div class="flash-data2" data-flashdata="<?= $_GET['o'];?>"></div>
<?php endif; ?>

<!-- ADD PRODUCT -->
<script>
//  SUCCESS FLAG NG PRODUCT
const flashdata1= $('.flash-data1').data('flashdata')
        if (flashdata1 == 1){
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Customer added successfully!'
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
                icon: 'success',
                title: 'Success',
                text: 'You updated your account successfully!'
            })
        }
    </script>
<!-- END -->
<!-- TRANSACTION -->
<script>
//  SUCCESS FLAG NG TRANSACTION
const flashdata2= $('.flash-data2').data('flashdata')
        if (flashdata2 == 1){
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Transaction added successfully!'
            })
        }
        if (flashdata1 == 2){
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'Something went wrong! Please try again.'
            })
        }
    </script>
<!-- END -->
<!-- ERROR PAYMENT -->
<script>
//  ERROR FLAG NG PAYMENT
const flashdata= $('.flash-data').data('flashdata')
        if (flashdata == 1){
            Swal.fire({
                icon: 'error',
                title: 'Opps',
                text: 'Payment is insufficient!'
            })
        }
    </script>
<!-- END -->