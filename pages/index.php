<?php
include'../includes/connection.php';
$page="faculty"; 
include'../includes/sidebar.php';
?>
<?php 
// $products_sold   = find_higest_saleing_product('10');
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
          <div class="row show-grid">
          <?php if ($_SESSION['JOB_TITLE']  == 'Manager') {
            echo '
            <!-- Product ROW -->
            <div class="col-md-4">
            <!-- Product record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Product</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">';
                     
                      $query = "SELECT COUNT(PRO_ID) AS PRO_ID FROM stock ";
                      $result = mysqli_query($db, $query) or die(mysqli_error($db));
                      while ($row = mysqli_fetch_array($result)) {
                          echo "$row[0]";
                        }
                      echo ' Record(s)
                      </div>
                    </div>
                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Supplier record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Supplier</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">';
                        
                        $query = "SELECT COUNT(*) FROM supplier";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        echo ' Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
            <!-- Employee ROW -->
          <div class="col-md-4">
            <!-- Employee record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Employees</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">';
                       
                        $query = "SELECT COUNT(*) FROM employee";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                       echo ' Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- User record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Registered Account</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">';
                        
                        $query = "SELECT COUNT(*) FROM users ";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                       echo ' Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          
            ';
          } elseif($_SESSION['JOB_TITLE']  == 'Inventory Clerk'){
            echo '
            <!-- Product ROW -->
            <div class="col-md-4">
            <!-- Product record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Product</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">';
                      
                      $query = "SELECT COUNT(PRO_ID) AS PRO_ID FROM stock";
                      $result = mysqli_query($db, $query) or die(mysqli_error($db));
                      while ($row = mysqli_fetch_array($result)) {
                          echo "$row[0]";
                        }
                      echo ' Record(s)
                      </div>
                    </div>
                      <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            </div>

            <div class="col-md-4">
            <!-- Supplier record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Supplier</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">';
                        
                        $query = "SELECT COUNT(*) FROM supplier";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        echo ' Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            ';
          }elseif($_SESSION['JOB_TITLE']  == 'Sales Employee'){
            echo '
            <!-- Product ROW -->
            <div class="col-md-4">
            <!-- Product record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Product</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">';
                      
                      $query = "SELECT COUNT(PRO_ID) AS PRO_ID FROM stock";
                      $result = mysqli_query($db, $query) or die(mysqli_error($db));
                      while ($row = mysqli_fetch_array($result)) {
                          echo "$row[0]";
                        }
                    echo ' Record(s)
                      </div>
                    </div>
                      <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            </div>

            <div class="col-md-4">
            <!-- Supplier record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Supplier</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">';
                        
                        $query = "SELECT COUNT(SUPPLIER_ID) FROM supplier";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        echo ' Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            ';
          }
          ?>
          </div>

          <div class="row show-grid"> 
            <!-- RECENT PRODUCTS -->
            <div class="col-lg-4">
                  <div class="card shadow h-100">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">

                          <div class="col-auto">
                            <i class="fa fa-th-list fa-fw"></i> 
                          </div>

                        <div class="panel-heading"> Highest Selling Product
                        </div>
                        <div class="row no-gutters align-items-center mt-1">
                          <div class="col-auto">
                            <div class="h6 mb-0 mr-0 text-gray-800">
                        <!-- /.panel-heading -->
                        
                              <div class="panel-body">
                                <div class="table-responsive">
                              <table class="table table-striped table-bordered table-condensed">
                                    <thead>
                                    <tr>
                                      <th>Product</th>
                                      <th>Total Sold</th>
                                      <th>Total Quantity</th>
                                    <tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                      $query = "SELECT PRODUCTS, COUNT(PRODUCTS_CODE) AS totalSold, SUM(QTY) AS totalQty FROM transaction_details GROUP BY PRODUCTS_CODE order by SUM(QTY) DESC LIMIT 10";
                                      $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                      while ($row = mysqli_fetch_array($result)) {

                                          // echo "<a href='#' class='list-group-item text-gray-800'>
                                                // <i class='fa fa-tasks fa-fw'></i> $row[0]
                                                // </a>";

                                                echo '<tr>
                                                <td>'. $row['PRODUCTS'].'</td>
                                                <td>'.$row['totalSold'].'</td>
                                                <td>'.$row['totalQty'].'</td>
                                              </tr>';
                                        }
                                    ?>
                                        
                                    <tbody>
                                  </table>
                                </div>
                                  <!-- /.list-group -->
                                  <!-- <a href="product.php" class="btn btn-default btn-block">View All Products</a> -->
                              </div>
                        <!-- /.panel-body -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-lg-4">
                  <div class="card shadow h-100">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">

                          <div class="col-auto">
                            <i class="fa fa-th-list fa-fw"></i> 
                          </div>

                        <div class="panel-heading"> Latest Transactions
                        </div>
                        <div class="row no-gutters align-items-center mt-1">
                          <div class="col-auto">
                            <div class="h6 mb-0 mr-0 text-gray-800">
                        <!-- /.panel-heading -->
                        
                              <div class="panel-body">
                                <div class="table-responsive">
                              <table class="table table-striped table-bordered table-condensed">
                                    <thead>
                                    <tr>
                                      <th>Client</th>
                                      <th>Date</th>
                                      <th>Action</th>
                                    <tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                      $query = "SELECT c.FIRST_NAME,t.TRANS_ID, c.LAST_NAME, t.DATE  FROM transaction t
                                      JOIN customer c ON t.CUST_ID=c.CUST_ID ORDER BY t.DATE DESC LIMIT 5";
                                      $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                      while ($row = mysqli_fetch_array($result)) {

                                          // echo "<a href='#' class='list-group-item text-gray-800'>
                                                // <i class='fa fa-tasks fa-fw'></i> $row[0]
                                                // </a>";

                                                echo '<tr>
                                                <td>'. $row['FIRST_NAME'].' '. $row['LAST_NAME'].'</td>
                                                <td>'.$row['DATE'].'</td>
                                                <td><a type="text" class="btn btn-info bg-gradient-info" href="trans_view.php?action=edit & id='.$row['TRANS_ID'] . '"> View</a></td>
                                              </tr>';
                                        }
                                    ?>
                                        
                                    <tbody>
                                  </table>
                                </div>
                                  <!-- /.list-group -->
                                  <!-- <a href="product.php" class="btn btn-default btn-block">View All Products</a> -->
                              </div>
                        <!-- /.panel-body -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-lg-3">
                  <div class="card shadow h-100">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">

                          <div class="col-auto">
                            <i class="fa fa-th-list fa-fw"></i> 
                          </div>

                        <div class="panel-heading"> Recently Added Products
                        </div>
                        <div class="row no-gutters align-items-center mt-1">
                          <div class="col-auto">
                            <div class="h6 mb-0 mr-0 text-gray-800">
                        <!-- /.panel-heading -->
                        
                              <div class="panel-body">
                                  <div class="list-group">
                                    <?php 
                                      $query = "SELECT NAME, PRODUCT_CODE FROM product GROUP BY NAME order by PRODUCT_ID DESC LIMIT 10";
                                      $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                      while ($row = mysqli_fetch_array($result)) {

                                          echo "<a href='#' class='list-group-item text-gray-800'>
                                                <i class='fa fa-tasks fa-fw'></i> $row[0]
                                                </a>";
                                        }
                                    ?>
                                  </div>
                                  <!-- /.list-group -->
                                  <a href="product.php" class="btn btn-default btn-block">View All Products</a>
                              </div>
                        <!-- /.panel-body -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
          
<?php
include'../includes/footer.php';
?>

<!-- FOR UPDATING PROFILE -->
<?php if (isset($_GET['n'])) :?>
    <div class="flash-data1" data-flashdata="<?= $_GET['n'];?>"></div>
<?php endif; ?>

<!-- ADD PRODUCT -->
<script>
//  SUCCESS FLAG NG PRODUCT
const flashdata1= $('.flash-data1').data('flashdata')
        if (flashdata1 == 3){
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'You updated your account successfully!'
            })
        }
    </script>
<!-- END -->