<?php

    session_start();
    error_reporting(0);
    include('../includes/connection.php');

  ?>


<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sales And Inventory</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-gradient-primary">

    
        <div class="container">
            <div class="row justify-content-center">

              <div class="col-xl-10 col-lg-12 col-md-9">
              <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                <div class="card-body">
                
                <!-- Nested Row within Card Body -->
            <div class="row shadow">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
                <div class="p-5">
               
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-1">Update Password</h1>
                    <p class="text-center small">Enter your new password to update</p>
                </div>
                <?php
                    if(isset($_SESSION['status']))
                    {
                        ?>
                        <div class="alert alert-success">
                            <h5><?= $_SESSION['status'];?></h5>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                    ?>
                    <form action="password-reset-code.php" method="POST" >
                    <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>">
                    
                        <!--<div class="form-group">
                            <input type="text" name="email" Required class="form-control" placeholder="">
                            <center><label>Email Address</label></center>
                        </div>-->
                        <div class="form-group">
                            <input type="password" name="new_password" Required class="form-control" placeholder="">
                            <center><label>New Password</label></center>
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm_password" Required class="form-control" placeholder="" >
                            <center><label>Password</label></center>
                        </div>
                        <br>
						
                        <button class="btn btn-primary w-100" type="submit" name="password_update">Update Password</button>
                    </form>
                    </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>


        
    


    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
