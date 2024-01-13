<!-- Employee select and script -->
<?php
$sqlforjob = "SELECT DISTINCT JOB_TITLE, JOB_ID FROM job order by JOB_ID asc LIMIT 4";
$result = mysqli_query($db, $sqlforjob) or die ("Bad SQL: $sqlforjob");

$job = "<select class='form-control' name='jobs' required>
        <option value='' disabled selected hidden>Select Job</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $job .= "<option value='".$row['JOB_ID']."'>".$row['JOB_TITLE']."</option>";
  }

$job .= "</select>";

?>


<!-- <script>  
window.onload = function() {  

  // ---------------
  // basic usage
  // ---------------
  var $ = new City();
  $.showProvinces("#province");
  $.showCities("#city");
  $.showBarangays("#barangay");

  // ------------------
  // additional methods 
  // -------------------

  // will return all provinces 
  console.log($.getProvinces());
  
  // will return all cities 
  console.log($.getAllCities());
  
  // will return all cities under specific province (e.g Batangas)
  console.log($.getCities("Batangas")); 
}
</script> -->

<!-- <script>
  window.onload = function() {  
  var $ = new Barangay();
  $.showCities("#city");
  $.showBarangays("#barangay");
      // will return all provinces 
    console.log($.getCities());
    // will return all barangay
    console.log($.getAllBarangays());

    // will return all brgy under specific city (e.g Canlubang)
    console.log($.getBarangays("Agtangao")); 
  }
</script> -->

<script>
         $(function() {
            $( "#hiredDate" ).datepicker();
         });
      </script>
<!-- end of Employee select and script -->

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><?php echo  $_SESSION['FIRST_NAME']; ?> are you sure do you want to logout?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Customer Modal-->
  <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="cust_transac.php?action=add">
            <div class="form-group">
              <input class="form-control" placeholder="First Name" id="cust_first" name="firstname" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Last Name" id="cust_last" name="lastname" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Phone Number" id="cust_num" name="phonenumber" maxlength="11" minlength="11" required>
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
  <!-- Customer Modal-->
  <div class="modal fade" id="poscustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button> 
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="cust_pos_trans.php?action=add">
            <div class="form-group">
              <input class="form-control" placeholder="First Name" id="cust_pos_first" name="firstname" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Last Name" id="cust_pos_last" name="lastname" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Phone Number" id="cust_pos_num" name="phonenumber" maxlength="11" minlength="11" required>
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
  <!-- Employee Modal-->
  <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="emp_transac.php?action=add">          
              <div class="form-group">
                <input class="form-control" placeholder="First Name" id="emp_first" name="firstname" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Last Name" id="emp_last" name="lastname" required>
              </div>
              <div class="form-group">
                  <select class='form-control' name='gender' required>
                    <option value="" disabled selected hidden>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Email" name="email" type="email" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Phone Number" id="emp_num"  maxlength="11" minlength="11" name="phonenumber" required>
              </div>
              <div class="form-group">
                <?php
                  echo $job;
                ?>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Employee ID" name="employeeid" required>
              </div>
              <div class="form-group">
                <input placeholder="Hired Date" type="date"  id="hiredDate" name="hireddate" min="" max="" class="form-control" />
              </div>
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
                <select class="form-control" id="barangay" placeholder="Barangay" name="barangay" required>
                <option value="">-- Select Barangay --</option>
                </select>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Unit #" name="unit" required>
              </div>
              <hr>
            <button type="submit" class="btn btn-success" name="send"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>



  <!-- Delete Modal-->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="DeleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure do you want to delete?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger btn-ok">Delete</a>
        </div>
      </div>
    </div>
  </div>
    <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>

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
 <!-- PARA SA VALIDATION NG CUSTOMER CASHIER SIDE-->
 <script>
     $(document).ready(function() {
      $('#cust_pos_first').on('input',function(){
         var expression= /[^a-zA-Z\s]/g;
          if($(this).val().match(expression)){
              $(this).val($(this).val().replace(expression,""));
          }
      })
     })
     $(document).ready(function() {
      $('#cust_pos_last').on('input',function(){
          var expression= /[^a-zA-Z\s]/g;
          if($(this).val().match(expression)){
              $(this).val($(this).val().replace(expression,""));
          }
      })
     })
     $(document).ready(function() {
      $('#cust_pos_num').on('input',function(){
          var expression= /[^0-9]/g;
          if($(this).val().match(expression)){
              $(this).val($(this).val().replace(expression,""));
          }
      })
     })
</script>


  <!-- PARA SA VALIDATION NG EMPLOYEE-->

  <script>
     $(document).ready(function() {
      $('#emp_first').on('input',function(){
         var expression= /[^a-zA-Z\s]/g;
          if($(this).val().match(expression)){
              $(this).val($(this).val().replace(expression,""));
          }
      })
     })
     $(document).ready(function() {
      $('#emp_last').on('input',function(){
          var expression= /[^a-zA-Z\s]/g;
          if($(this).val().match(expression)){
              $(this).val($(this).val().replace(expression,""));
          }
      })
     })
     $(document).ready(function() {
      $('#emp_num').on('input',function(){
          var expression= /[^0-9]/g;
          if($(this).val().match(expression)){
              $(this).val($(this).val().replace(expression,""));
          }
      })
     })
</script>

<!-- PARA SA VALIDATION NG HIRED DATE-->

<script>
  var date = new Date();
  // var tdate = date.getDate();
  // var month = date.getMonth();
  var tdate = 1;
  var month = 1;
  if(tdate < 10 ){
    tdate = '0' + tdate;
  }
  if(month < 10 ){
    month = '0' + month;
  }
  var year = date.getUTCFullYear();
  // var minDate = year + "-" + month + "-" + tdate;
  var minDate = year + "-" + month + "-" + tdate;
  document.getElementById("hiredDate").setAttribute('min', minDate);
  
  // console.log(minDate);

</script>
<script>
  var date = new Date();
  // var tdate = date.getDate();
  // var month = date.getMonth()+1;
  var tdate = 31;
  var month = 12;
  if(tdate < 10 ){
    tdate = '0' + tdate;
  }
  if(month < 10 ){
    month = '0' + month;
  }
  
  var year = date.getUTCFullYear();
  // var minDate = year + "-" + month + "-" + tdate;
  var maxDate = year + "-" + month + "-" + tdate;
  document.getElementById("hiredDate").setAttribute('max', maxDate);
  
  // console.log(month);

</script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
<script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script>
<script type="text/javascript">
            
            var my_handlers = {

                fill_provinces:  function(){

                    var region_code = $(this).val();
                    $('#province').ph_locations('fetch_list', [{"region_code": region_code}]);
                    
                },

                fill_cities: function(){

                    var province_code = $(this).val();
                    $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
                },


                fill_barangays: function(){

                    var city_code = $(this).val();
                    $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
                }
            };

            $(function(){
                // $('#region').on('change', my_handlers.fill_provinces);
                $('#province').on('change', my_handlers.fill_cities);
                $('#city').on('change', my_handlers.fill_barangays);

                // $('#region').ph_locations({'location_type': 'regions'});
                $('#province').ph_locations({'location_type': 'provinces'});
                $('#city').ph_locations({'location_type': 'cities'});
                $('#barangay').ph_locations({'location_type': 'barangays'});

                $('#province').ph_locations('fetch_list');
            });
        </script> -->