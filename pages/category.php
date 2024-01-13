<?php
include'../includes/connection.php';
include'../includes/sidebar.php';


$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$catid = "<select class='form-control' name='category' required>
        <option value='' disabled selected hidden>Select Product Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $catid .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$catid .= "</select>";
  ?>   

  <div class="row show-grid" align="center">
    <div class="col-md-6">
    <div class="card shadow col-md-20 mb-4">
        <div class="card-header">
            <h4 class="m-2 font-weight-bold text-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New Category</h4>
        </div>
        <div class="card-body">
            <form method="post" action="categorie.php">
                <div class="form-group">
                    <input type="text" class="form-control" name="category1" placeholder="Category Name" required>
                </div>
                <button type="submit" name="add_cat" class="submit btn btn-primary">Add Category</button>
            </form>
        </div>  
    </div>  
    </div>
    <div class="col-md-6">
    <div class="card shadow col-md-20 mb-4">
        <div class="card-header">
            <h4 class="m-2 font-weight-bold text-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New Subcategory</h4>
        </div>
        <div class="card-body">
            <form method="post" action="categorie2.php">
                <div class="form-group">
                    <?php
                    echo $catid;
                    ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subcat" placeholder="Subcategory Name" required>
                </div>
                <button type="submit" name="add" class="btn btn-primary">Add Subcategory</button>
            </form>
        </div>    
    </div>
    </div>
  </div>


<div class="row " align="center" >
    <div class="col-md-6">
        <div class="card shadow mb-2">
            <div class="card-header">
                <h4 class="m-2 font-weight-bold text-primary">List of Category</h4>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php                  
                        $query =mysqli_query($db,"SELECT CNAME,CATEGORY_ID FROM category order by CNAME asc") ;
                        
                        
                                while ($row = mysqli_fetch_assoc($query)) {
                                                    ?>
                                    <tr>
                                    <td> <?php echo count_id(); ?></td>
                                    <td> <?php echo $row['CNAME'] ;?></td>
                                    <td align="center">
                                        <a type="button" class="btn btn-warning " href="cat_edit.php?catid=<?php echo $row['CATEGORY_ID'] ;?>"><i class="fas fa-fw fa-edit"></i></a>
                                        <a type="button" class="delete btn btn-danger " href="cat_del.php?delid=<?php echo $row['CATEGORY_ID'] ;?>"><i class="fas fa-fw fa-trash"></i> </a>
                                        </td>
                                    </tr> 
                                    <?php
                                            }
                    ?> 
                    </tbody>
                </table>
               </div></div></div>
        </div>
        <div class="col-md-6">
        <div class="card shadow mb-2">
            <div class="card-header">
                <h4 class="m-2 font-weight-bold text-primary">List of Subcategory</h4>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php                  
                        $query =mysqli_query($db,"SELECT CNAME, SUB_NAME,SUB_ID FROM category c join subcategory s on c.CATEGORY_ID= s.CAT_ID order by SUB_NAME asc") ;
                        
                        
                                while ($row = mysqli_fetch_assoc($query)) {
                                                    ?>
                                    <tr>
                                    <td> <?php echo count_id1(); ?></td>
                                    <td> <?php echo $row['SUB_NAME'] ;?></td>
                                    <td> <?php echo $row['CNAME'] ;?></td>
                                    <td align="center">
                                        <a type="button" class="btn btn-warning " href="subcat_edit.php?subid=<?php echo $row['SUB_ID'];?>"><i class="fas fa-fw fa-edit"></i></a>
                                        <a type="button" class="delete2 btn btn-danger " href="subcat_del.php?delid=<?php echo $row['SUB_ID']; ?>"><i class="fas fa-fw fa-trash"></i> </a>
                                        </td>
                                    </tr> 
                                    <?php
                                            }
                                    ?> 
                    </tbody>
                </table>
               </div></div>
            </div>
        </div>
    </div>



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
<!-- FOR UPDATING -->
<?php if (isset($_GET['o'])) :?>
    <div class="flash-data2" data-flashdata="<?= $_GET['o'];?>"></div>
<?php endif; ?>

<script src="../js/sweetalert2.all.min.js"></script>
<!-- ADD CATEGORY & SUBCAT -->
<script>
// BOTH SUCCESS FLAG NG SUBCAT AT CAT
const flashdata1= $('.flash-data1').data('flashdata')
        if (flashdata1 == 1){
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Data added successfully!'
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
                text: 'This Category Name already exist!'
            })
        }
        if (flashdata1 == 4){
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'This Subcategory Name already exist!'
            })
        }

    </script>
<!-- END -->
<!-- ADD CATEGORY & SUBCAT -->
<script>
// BOTH SUCCESS FLAG NG SUBCAT AT CAT
const flashdata2= $('.flash-data2').data('flashdata')
        if (flashdata2 == 1){
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Data edited successfully!'
            })
        }
        if (flashdata2 == 2){
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'Something went wrong!'
            })
        }
        if (flashdata2 == 3){
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'This Category Name already exist!'
            })
        }
        if (flashdata2 == 4){
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'This Subcategory Name already exist!'
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

    </script>
<!-- END -->
<!-- DELETE SUBCATEGORY -->
<script>
$('.delete2').on('click', function (e) {
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

    // BOTH SUCCESS FLAG NG SUBCAT AT CAT
    const flashdata= $('.flash-data').data('flashdata')
        if (flashdata == 1){
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Record has been deleted!'
            })
        }
        if (flashdata == 2){
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: 'Record Unsuccessfully Deleted. Please try again!'
            })
        }

    </script>
<!-- END -->