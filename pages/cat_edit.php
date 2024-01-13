<?php
include'../includes/connection.php';
include'../includes/sidebar.php';

$query = 'SELECT CNAME,CATEGORY_ID FROM category c WHERE CATEGORY_ID='.$_GET['catid'].'' ;
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $cat_name = $row['CNAME'];
      $catid = $row['CATEGORY_ID'];
    }

?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Category</h4>
            </div>
            <a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="category.php?"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
      
            <form role="form" method="post" action="cat_edit1.php?catid=<?php echo $catid;?>">
              <!-- <input type="hidden" name="id" value="<?php echo $zz; ?>" /> -->
              
           <div class="form-group">
             <input class="form-control" placeholder="Category Name" name="category" value="<?php echo $cat_name;?>"required>
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
                text: 'This Category Name already exist!'
            })
        }
    </script>
<!-- END -->