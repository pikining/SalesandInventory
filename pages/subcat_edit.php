<?php
include'../includes/connection.php';
include'../includes/sidebar.php';

$query = 'SELECT SUB_NAME,SUB_ID FROM subcategory s WHERE SUB_ID='.$_GET['subid'] ;
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $sub_name = $row['SUB_NAME'];
      $subid =$row['SUB_ID'];
    }



      $sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
      $result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");
      
      $catid = "<select class='form-control' name='category' required>
              <option value='' disabled selected hidden>Select Product Category</option>";
        while ($row = mysqli_fetch_assoc($result)) {
          $catid .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
        }
      
      $catid .= "</select>";
?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Subcategory</h4>
            </div>
            <a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="category.php?"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
      
            <form role="form" method="post" action="subcat_edit1.php?subid=<?php echo $subid;?>">
              <!-- <input type="hidden" name="id" value="<?php echo $zz; ?>" /> -->
              <div class="form-group">
             <?php
               echo $catid;
             ?>
           </div>
           <div class="form-group">
             <input class="form-control" placeholder="Subcategory Name" name="subcat" value="<?php echo $sub_name;?>"required>
           </div>
              <hr>

                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>    
              </form>  
            </div>
          </div></center>

<?php
include'../includes/footer.php';
?>

<!-- FOR UPDATING -->
<?php if (isset($_GET['o'])) :?>
    <div class="flash-data2" data-flashdata="<?= $_GET['o'];?>"></div>
<?php endif; ?>

<script src="../js/sweetalert2.all.min.js"></script>

<!-- UPDATE CATEGORY & SUBCAT -->
<script>
// BOTH SUCCESS FLAG NG SUBCAT AT CAT
const flashdata2= $('.flash-data2').data('flashdata')
        if (flashdata2 == 3){
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'This Subcategory Name already exist!'
            })
        }
    </script>
<!-- END -->