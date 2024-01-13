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
            ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Supplier&nbsp;<a  href="#" data-toggle="modal" data-target="#supplierModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                       <th>Company Name</th>
                       <th>Province</th>
                       <th>City</th>
                       <th>Phone Number</th>
                       <th>Option</th>
                   </tr>
               </thead>
          <tbody>
<?php                  
    $query = 'SELECT SUPPLIER_ID, COMPANY_NAME, l.PROVINCE, l.CITY, PHONE_NUMBER FROM supplier s join location l on s.LOCATION_ID=l.LOCATION_ID';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>'. $row['COMPANY_NAME'].'</td>';
                echo '<td>'. $row['PROVINCE'].'</td>';
                echo '<td>'. $row['CITY'].'</td>';
                echo '<td>'. $row['PHONE_NUMBER'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="sup_searchfrm.php?action=edit & id='.$row['SUPPLIER_ID'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="sup_edit.php?action=edit & id='.$row['SUPPLIER_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li> 
                                <li>
                                  <a type="button" class="delete btn btn-danger bg-gradient-danger btn-block" style="border-radius: 0px;" href="sup_del.php?delid='.$row['SUPPLIER_ID']. '">
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

  <!-- Customer Modal-->
  <div class="modal fade" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="sup_transac.php?action=add">
              
              <div class="form-group">
                <input class="form-control" placeholder="Company Name" id="companyname" name="companyname" required>
              </div>
              <!-- <div class="form-group">
                <select class="form-control" id="province" placeholder="Province" name="province" required></select>
              </div>
              <div class="form-group">
                <select class="form-control" id="city" placeholder="City" name="city" required></select>
              </div> -->
              <div class="form-group">
                <select class="form-control" id="province" placeholder="Province" name="province" required>
                <option value="">-- Select Province --</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" id="city" placeholder="City" name="city" required>
                <option value="">-- Select City --</option>
                </select>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Phone Number" maxlength="11" minlength="11" id="sup_num" name="phonenumber" required>
              </div>
            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
  </div> 

  <!-- PARA SA VALIDATION-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- PARA SA VALIDATION NG CUSTOMER-->
  <script>
     $(document).ready(function() {
      $('#companyname').on('input',function(){
         var expression= /[^a-zA-Z\s]/g;
          if($(this).val().match(expression)){
              $(this).val($(this).val().replace(expression,""));
          }
      })
     })
     $(document).ready(function() {
      $('#sup_num').on('input',function(){
          var expression= /[^0-9]/g;
          if($(this).val().match(expression)){
              $(this).val($(this).val().replace(expression,""));
          }
      })
     })
</script>

<?php
include'../includes/footer.php';
?>

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
                text: 'Supplier added successfully!'
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
                text: 'This Company Name already exist!'
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
        if (flashdata1 == 2){
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'Product Unsuccessfully Deleted. Please try again!'
            })
        }

    </script>
<!-- END -->
