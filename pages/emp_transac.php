<?php
include'../includes/connection.php';
?>
            <?php
              $fname = $_POST['firstname'];
              $lname = $_POST['lastname'];
              $gen = $_POST['gender'];
              $email = $_POST['email'];
              $phone = $_POST['phonenumber'];
              $jobb = $_POST['jobs'];
              $empid = $_POST['employeeid'];
              $hdate = $_POST['hireddate'];
              $prov = $_POST['province'];
              $cit = $_POST['city'];
              $brgy = $_POST['barangay'];
              $unit = $_POST['unit'];

              $pw = strtoupper(substr($fname, 0, 1));
              $pw .= strtolower(substr($lname, 0, 1));
              $pw .= rand(10000, 99999);
              $pw .= "!";
              $h_pw = password_hash($pw, PASSWORD_DEFAULT);

              $query=mysqli_query($db,"select * from employee where employeeid ='$empid'");
              $ret=mysqli_fetch_array($query);
              if($ret > 0){ //Check the LRN
                echo '<script type="text/javascript">
                window.location = "employee.php?n=3";
                </script>';
              } 
              else{
              
              $query=mysqli_query($db,"INSERT INTO employee
                              (EMPLOYEE_ID, FIRST_NAME, LAST_NAME,GENDER, EMAIL, PHONE_NUMBER, JOB_ID, employeeid, HIRED_DATE, LOCATION_ID, designation)
                              VALUES (Null,'{$fname}','{$lname}','{$gen}','{$email}','{$phone}','{$jobb}', '{$empid}','{$hdate}',(SELECT MAX(LOCATION_ID) FROM location), '1')");
                  if($query){
                    $last_id = mysqli_insert_id($db);
              mysqli_query($db,"INSERT INTO users
              (ID,EMP_ID, USERNAME, PASSWORD, TYPE_ID, emp_email)
              VALUES (Null,'{$last_id}', '{$empid}','{$h_pw}','2','{$email}')");
              mysqli_query($db,"INSERT INTO location
              (LOCATION_ID, userId, PROVINCE, CITY, Barangay, Unit)
              VALUES (Null, '{$last_id}', '$prov','$cit','$brgy','$unit')");
                  
                    echo " <script type = \"text/javascript\">
                    window.location = \"employee.php?n=1\"
                    </script>";
                  }
                  else
                  {
                    echo " <script type = \"text/javascript\">
                    window.location = \"employee.php?n=2\"
                    </script>";
                }

                }


                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\SMTP;
                use PHPMailer\PHPMailer\Exception;
                
                //Load Composer's autoloader
                require '../vendor/autoload.php';
                
                if(isset($_POST["send"])){
                    $mail = new PHPMailer(true);
                    $mail ->SMTPDebug =2;
                    
                    $mail->isSMTP();       
                    $mail->Host       = 'smtp.gmail.com';                                     //Send using SMTP
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    
                                        //Set the SMTP server to send through
                    $mail->Username   = 'malabanangladys7@gmail.com';                     //SMTP username
                    $mail->Password   = 'lzuigqshvfpgangf';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                 
                    //Recipients
                    $mail->setFrom('malabanangladys7@gmail.com', 'Maquiling Builders Depot');
                    $mail->addAddress($email);  
                    $mail->addReplyTo('malabanangladys7@gmail.com', 'DONOTREPLY');
                
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = "Your account's username and password.";
                    
                    $email_template ="
                        <h2>Hello</h2>
                        <h3>This email is being sent to you because your job account has been created. To access your account, enter your username and password below this message.</h3>
                        <br/><br/>
                        <h3> <strong>Username:</strong> $empid <br/>
                        <strong>Password:</strong> $pw
                        </h3>
                    ";
                    $mail->Body = $email_template;
                    $mail->send();
                }
            ?>