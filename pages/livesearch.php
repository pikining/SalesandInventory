<?php
include'../includes/connection.php';


if(isset($_POST['input'])){
    $input=$_POST['input'];

    $sql="SELECT * FROM product WHERE PRODUCT_CODE like '%$input%' or NAME like '%$input%' Group By PRODUCT_CODE";
    $result=mysqli_query($db,$sql);
    if($result){
      if(mysqli_num_rows($result)>0){
        echo '
        <table class="table table-bordered" width="100%" cellspacing="0"> 
        <thead>
                <tr>
                  <th>Product Code</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Action</th>
                </tr>
              </thead>
        ';
       while($row=mysqli_fetch_assoc($result)){
        echo '<tbody>
        <form method="post" action="pos.php?action=add&id='. $row['PRODUCT_ID'].'">
        
                <td>'. $row['PRODUCT_CODE'].'<input type="hidden" name="code" value="'. $row['PRODUCT_CODE'].'"</td>
                <td>'. $row['NAME'].'<input type="hidden" name="name" value="'. $row['NAME'].'"</td>
                <td>'. $row['PRICE'].'<input type="hidden" name="price" value="'. $row['PRICE'].'"</td>
                <td class ="col-2"><input type="number" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" name="quantity" class="form-control" value="1" /></td>
                <td><input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info"
                value="Add"/></td>
        
              </tbody>
              <div class="<?php echo $alertStyle;?>" role="alert"><?php echo $statusMsg;?></div>
              </form>
              
        ';
       }
      }else{
        echo' <h2 class="text-danger"> No Data Found </h2>';
      }
    }
  }
?>