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
  $query = 'SELECT * FROM customer WHERE CUST_ID ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zz= $row['CUST_ID'];
      $i= $row['FIRST_NAME'];
      $a=$row['LAST_NAME'];
      $b=$row['PHONE_NUMBER'];
    }  
      $id = $_GET['id'];
?>
            
            <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Customer</h4>
            </div><a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="customer.php?"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
         
            <form role="form" method="post" action="cust_edit1.php">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 First Name:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="First Name" id="cust_first" name="firstname" value="<?php echo $i; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Last Name:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Last Name" id="cust_last" name="lastname" value="<?php echo $a; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Contact #:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Phone Number" id="cust_num" name="phone" value="<?php echo $b; ?>" maxlength="11" minlength="11" required>
                </div>
              </div>
              <hr>

                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button> 
              </form>  
          </div>
  </div>

<?php
include'../includes/footer.php';
?>

 <!-- PARA SA VALIDATION-->
    <!-- <script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo="
  crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- PARA SA VALIDATION NG CUSTOMER-->
  <script>
     $(document).ready(function() {
      $('#cust_first').on('input',function(){
         var expression= /[^a-zA-Z\s]/g;
          if($(this).val().match(expression)){
              $(this).val($(this).val().replace(expression,""));
          }
      })
     })
     $(document).ready(function() {
      $('#cust_last').on('input',function(){
          var expression= /[^a-zA-Z\s]/g;
          if($(this).val().match(expression)){
              $(this).val($(this).val().replace(expression,""));
          }
      })
     })
     $(document).ready(function() {
      $('#cust_num').on('input',function(){
          var expression= /[^0-9]/g;
          if($(this).val().match(expression)){
              $(this).val($(this).val().replace(expression,""));
          }
      })
     })
</script>

<!-- FOR UPDATING -->
<?php if (isset($_GET['m'])) :?>
    <div class="flash-data" data-flashdata="<?= $_GET['m'];?>"></div>
<?php endif; ?>

<script src="../js/sweetalert2.all.min.js"></script>

<!-- ADD CUSTOMER -->
<script>
// SUCCESS FLAG CUSTOMER
const flashdata= $('.flash-data').data('flashdata')
        if (flashdata == 2){
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'Something went wrong! Please try again.'
            })
        }

    </script>
<!-- END -->