<?php 
include'../includes/connection.php';
include'../includes/sidebar.php';


        $delid= $_GET['delid'];

        $query = 'DELETE FROM subcategory WHERE SUB_ID='.$delid.'';

        $result = mysqli_query($db, $query) or die(mysqli_error($db));


      

            if ($query) {
                echo " <script type = \"text/javascript\">
                window.location = \"category.php?m=1\"
                </script>";
                // $alertStyle ="alert alert-success";
                // $statusMsg="Task Added Successfully!";
            }
            else
            {
                echo " <script type = \"text/javascript\">
                window.location = \"category.php?m=2\"
                </script>";
                // $alertStyle ="alert alert-danger";
                // $stat
            }
        

?>