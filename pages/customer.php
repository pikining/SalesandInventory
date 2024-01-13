<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 

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
              <h4 class="m-2 font-weight-bold text-primary">Customer&nbsp;<a  href="#" data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php                  
                      $query = 'SELECT * FROM customer';
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                      echo '<tr>';
                      echo '<td>'. $row['FIRST_NAME'].'</td>';
                      echo '<td>'. $row['LAST_NAME'].'</td>';
                      echo '<td>'. $row['PHONE_NUMBER'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="cust_searchfrm.php?action=edit & id='.$row['CUST_ID'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="cust_edit.php?action=edit & id='.$row['CUST_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="delete btn btn-danger bg-gradient-danger btn-block" style="border-radius: 0px;" href="cust_del.php?delid='.$row['CUST_ID']. '">
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

<!-- FOR ADDING -->
<?php if (isset($_GET['n'])) :?>
    <div class="flash-data1" data-flashdata="<?= $_GET['n'];?>"></div>
<?php endif; ?>
<!-- FOR UPDATING -->
<?php if (isset($_GET['m'])) :?>
    <div class="flash-data" data-flashdata="<?= $_GET['m'];?>"></div>
<?php endif; ?>
<!-- FOR UPDATING -->
<?php if (isset($_GET['o'])) :?>
    <div class="flash-data2" data-flashdata="<?= $_GET['o'];?>"></div>
<?php endif; ?>

<script src="../js/sweetalert2.all.min.js"></script>

<!-- ADD CUSTOMER -->
<script>
// SUCCESS FLAG CUSTOMER
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

    </script>
<!-- END -->
<!-- UPDATING CUSTOMER -->
<script>
// SUCCESS FLAG CUSTOMER
const flashdata= $('.flash-data').data('flashdata')
        if (flashdata == 1){
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Customer edited successfully!'
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
        const flashdata2= $('.flash-data2').data('flashdata')
        if (flashdata2 == 1){
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Record has been deleted!'
            })
        }
        if (flashdata2 == 2){
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'Product Unsuccessfully Deleted. Please try again!'
            })
        }

    </script>
<!-- END -->
