<?php
  require('session.php');
  confirm_logged_in();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style type="text/css">
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}

</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sales and Inventory System</title>
  <link rel="icon" href="https://www.freeiconspng.com/uploads/sales-icon-7.png">

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 
<!-- jQuery library -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script> -->

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

</head>

<body id="page-top">
          
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color:#FFAE42;" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          
        </div>
        <div class="sidebar-brand-text mx-3">Sales and Inventory System</div>
      </a> -->

      <!-- Divider -->
      <!-- <hr class="sidebar-divider my-0"> -->

      <!-- Nav Item - Dashboard -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"style="font-size:20px;color:lightblue;"></i>
          <span>Home</span></a>
      </li> -->
      <!-- Divider -->
      <!-- <hr class="sidebar-divider"> -->

      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        Tables
      </div> -->
      <!-- Tables Buttons -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="customer.php">
          <i class="fas fa-fw fa-user"style="font-size:20px;color:lightblue;"></i>
          <span>Customer</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="employee.php">
          <i class="fas fa-fw fa-user"style="font-size:20px;color:lightblue;"></i>
          <span>Employee</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="product.php">
          <i class="fas fa-fw fa-table"style="font-size:20px;color:lightblue;"></i>
          <span>Product</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="inventory.php">
          <i class="fas fa-fw fa-archive"style="font-size:20px;color:lightblue;"></i>
          <span>Inventory</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="transaction.php">
          <i class="fas fa-fw fa-retweet"style="font-size:20px;color:lightblue;"></i>
          <span>Transaction</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="supplier.php">
          <i class="fas fa-fw fa-cogs"style="font-size:20px;color:lightblue;"></i>
          <span>Supplier</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="user.php">
          <i class="fas fa-fw fa-users"style="font-size:20px;color:lightblue;"></i>
          <span>Accounts</span></a>
      </li> -->
      <!-- Divider -->
      <!-- <hr class="sidebar-divider d-none d-md-block"> -->

      <!-- Sidebar Toggler (Sidebar) -->
      <!-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div> -->

      <?php if ($_SESSION['JOB_TITLE']  == 'Manager') {
          echo '
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
              <div class="sidebar-brand-icon rotate-n-15">
            
              </div>
              <div class="sidebar-brand-text mx-3">Sales and Inventory System</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-home"style="font-size:20px;color:darkblue;"></i>
                <span>Home</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
              Tables
            </div>
            
            <!-- Content -->
            <li class="nav-item">
              <a class="nav-link" href="employee.php">
              <i class="fas fa-fw fa-user"style="font-size:20px;color:darkblue;"></i>
              <span>Employee</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="inventory.php">
                <i class="fas fa-fw fa-archive"style="font-size:20px;color:darkblue;"></i>
                <span>Inventory</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="transaction.php">
                <i class="fas fa-fw fa-retweet"style="font-size:20px;color:darkblue;"></i>
                <span>Transaction</span></a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="sales_invoice.php">
              <i class="fas fa-chart-line"style="font-size:20px;color:darkblue;"></i>
              <span>Sales Invoice</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="supplier.php">
                <i class="fas fa-fw fa-users"style="font-size:20px;color:darkblue;"></i>
                <span>Supplier</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user.php">
                <i class="fas fa-fw fa-users"style="font-size:20px;color:darkblue;"></i>
                <span>Accounts</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user_logs.php">
                <i class="fas fa-fw fa-cogs"style="font-size:20px;color:darkblue;"></i>
                <span>User Logs</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            ';
        } elseif($_SESSION['JOB_TITLE']  == 'Inventory Clerk'){
          echo '
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon rotate-n-15">
          
            </div>
            <div class="sidebar-brand-text mx-3">Sales and Inventory System</div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="fas fa-fw fa-home"style="font-size:20px;color:darkblue;"></i>
              <span>Home</span></a>
          </li>
          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
            Tables
          </div>
          
          <!-- Content -->

          <li class="nav-item">
            <a class="nav-link" href="product.php">
              <i class="fas fa-fw fa-table"style="font-size:20px;color:darkblue;"></i>
              <span>Product</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="category.php">
              <i class="fas fa-fw fa-th"style="font-size:20px;color:darkblue;"></i>
              <span>Categories</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="inventory.php">
              <i class="fas fa-fw fa-archive"style="font-size:20px;color:darkblue;"></i>
              <span>Inventory</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="supplier.php">
              <i class="fas fa-fw fa-cogs"style="font-size:20px;color:darkblue;"></i>
              <span>Supplier</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">
          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>
          ';
        }elseif($_SESSION['JOB_TITLE']  == 'Sales Employee'){
          echo '
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon rotate-n-15">
          
            </div>
            <div class="sidebar-brand-text mx-3">Sales and Inventory System</div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="fas fa-fw fa-home"style="font-size:20px;color:darkblue;"></i>
              <span>Home</span></a>
          </li>
          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
            Tables
          </div>
          
          <!-- Content -->

          <li class="nav-item">
            <a class="nav-link" href="customer.php">
              <i class="fas fa-fw fa-user"style="font-size:20px;color:darkblue;"></i>
              <span>Customer</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="transaction.php">
              <i class="fas fa-fw fa-retweet"style="font-size:20px;color:darkblue;"></i>
              <span>Transaction</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sales_invoice.php">
              <i class="fas fa-chart-line"style="font-size:20px;color:darkblue;"></i>
              <span>Sales Invoice</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">
          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>
          ';
        }
        else {
          echo '<script type="text/javascript">
          alert("This User is not authorized to access this page!");
          window.location = "login.php";
          </script>';
        } ?>

    </ul>
    <!-- End of Sidebar -->
    <?php include_once 'topbar.php'; ?>
    <?php include_once 'function.php'; ?>
