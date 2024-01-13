    <?php

require('../includes/connection.php');
require('session.php');
// error_reporting(0);

if (isset($_POST['btnlogin'])) {


  $users = trim($_POST['user']);
  $upass = trim($_POST['password']);
  // $h_upass = $upass;
  
  $datelog = date("Y-m-d H:i:s");
  //$h_upass = sha1($upass);
if ($users == '' AND $upass == ''){
     ?>    <script type="text/javascript">
                alert("Username and password are empty!");
                window.location = "login.php";
                </script>
        <?php
}elseif ($users == ''){
  ?>    <script type="text/javascript">
                alert("Username is empty!");
                window.location = "login.php";
                </script>
        <?php
}elseif ($upass == ''){
  ?>    <script type="text/javascript">
                alert("Password is empty!");
                window.location = "login.php";
                </script>
        <?php
}

else{
//create some sql statement             
        $sql = mysqli_query($db,"SELECT EMP_ID,e.FIRST_NAME,e.LAST_NAME,e.GENDER,e.EMAIL,e.PHONE_NUMBER,e.designation,j.JOB_TITLE,l.PROVINCE,l.CITY,t.TYPE,u.PASSWORD
        FROM  `users` u
        join `employee` e on e.EMPLOYEE_ID=u.EMP_ID
        JOIN `location` l ON e.LOCATION_ID=l.LOCATION_ID
        join `job` j on e.JOB_ID=j.JOB_ID
        join `type` t ON t.TYPE_ID=u.TYPE_ID
        WHERE  `USERNAME` ='" . $users . "'");
        $count = mysqli_num_rows($sql);
        $found_user = mysqli_fetch_array($sql);

        //if ($result){
        //get the number of results based n the sql statement
        //check the number of result, if equal to one   
        //IF theres a result
            if ( $count > 0) {
              $verify= password_verify($upass,$found_user['PASSWORD']);
              if($verify == '1'){
                //store the result to a array and passed to variable found_user
                //$found_user  = mysqli_fetch_array($result);
                //fill the result to session variable
                $_SESSION['MEMBER_ID']  = $found_user['EMP_ID']; 
                $_SESSION['FIRST_NAME'] = $found_user['FIRST_NAME']; 
                $_SESSION['LAST_NAME']  =  $found_user['LAST_NAME'];  
                $_SESSION['GENDER']  =  $found_user['GENDER'];
                $_SESSION['EMAIL']  =  $found_user['EMAIL'];
                $_SESSION['PHONE_NUMBER']  =  $found_user['PHONE_NUMBER'];
                $_SESSION['JOB_TITLE']  =  $found_user['JOB_TITLE'];
                $_SESSION['PROVINCE']  =  $found_user['PROVINCE']; 
                $_SESSION['CITY']  =  $found_user['CITY']; 
                $_SESSION['TYPE']  =  $found_user['TYPE'];
                $_SESSION['designation']  =  $found_user['designation'];
                $AAA = $_SESSION['MEMBER_ID'];

        //this part is the verification if admin or user ka
        $query = mysqli_query($db,"INSERT INTO user_logs
                              (LOGS, EMP, date_log)
                              VALUES (Null,'{$AAA}','{$datelog}')");
        
        if ($_SESSION['designation'] == 0){
            ?>
              <script type="text/javascript">
                // alert("This Account is Inactive! Contact Your administrator to activate your account.");
                window.location = "login.php?o=1";
                </script>
            <?php

        } 
        elseif ($_SESSION['JOB_TITLE']=='Manager'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected to index.php
                      window.location = "index.php";
                  </script>
             <?php        
           
        }elseif ($_SESSION['JOB_TITLE']=='Cashier'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected to index.php
                  
                      window.location = "pos.php";
                  </script>
             <?php        
           
        }elseif ($_SESSION['JOB_TITLE']=='Inventory Clerk'){
           
          ?>    <script type="text/javascript">
                   //then it will be redirected to index.php
               
                   window.location = "index.php";
               </script>
          <?php        
        
        }elseif ($_SESSION['JOB_TITLE']=='Sales Employee'){
              
          ?>    <script type="text/javascript">
                  //then it will be redirected to index.php
              
                  window.location = "index.php";
              </script>
          <?php        
        
        }
             //else {
            //IF theres no result
             // 
              // <!-- <script type="text/javascript">
                //alert("Username or Password Not Registered! Contact Your administrator.");
               // window.location = "login.php";
               // </script>-->
             }else{
              ?>
          <script type="text/javascript">
                alert("Please enter correct password!");
                window.location = "login.php";
                </script>
          <?php

             }   

         } 
         else {
          ?>
          <script type="text/javascript">
                alert("Username Not Registered! Please try again.");
                window.location = "login.php";
                </script>
          <?php
        //          # code...
        // //echo "Error: " . $sql . "<br>" . $db->error;
        // }
        
    }      
 }
}
 $db->close();
?>