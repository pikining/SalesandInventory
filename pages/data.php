<?php 
require'../includes/connection.php';
    // if(isset($_POST['aid'])){
    //     $conn= new Dbconnect;
    //     $db = $conn->connect();

    //     $stmt = $db->prepare("SELECT * FROM subcategory WHERE CAT_ID =" .$_POST['aid'] );
    //     $stmt->execute();
    //     $subcategory = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     echo json_encode( $subcategory);
    // }

    // function loadcategorys(){
    //     $conn= new Dbconnect;
    //     $db = $conn->connect();

    //     $stmt = $db->prepare("SELECT * FROM category");
    //     $stmt->execute();
    //     $category = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $category;
    // }


    // if(isset($_POST['category'])) {
	// 	$category = $_POST['category'];
	// 	$query = mysqli_query($con,"SELECT * FROM subcategory WHERE CAT_ID = '".$category."'");
                     
	// 		$count = mysqli_num_rows($query);
	// 		if($count > 0){                       
	// 			echo ' <select  name="subcategory" class="form-control">';
	// 			echo'<option value="" >Select Subcategory</option>';
	// 			while ($row = mysqli_fetch_array($query)) {
	// 				echo'<option value="'.$row['SUB_ID'].'" >'.$row['SUB_NAME'].'</option>';
	// 			}
	// 			echo '</select>';
	// 		}

	// }

    $ouput='';
    $query = "SELECT * FROM subcategory WHERE CAT_ID = '".$_POST['CATEGORYID']."' ORDER BY SUB_NAME";
    $result = mysqli_query($db, $query);
        $ouput.='<option value="" disabled selected hidden> Select Subcategory</option>';
        while($row=mysqli_fetch_array($result)){
            $ouput .= '<option value="'.$row["SUB_ID"].'" > '.$row["SUB_NAME"].'</option>';
        } 
        echo $ouput;
?>