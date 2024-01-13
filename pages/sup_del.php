<?php
include'../includes/connection.php';

						
  $delid = $_GET['delid'];

    	$query = 'DELETE FROM supplier WHERE SUPPLIER_ID = ' . $_GET['delid'];
    	$result = mysqli_query($db, $query) or die(mysqli_error($db));			
		
		if ($query == TRUE) {
            ?>

            <script type = "text/javascript">
            window.location = "supplier.php?m=1";
            </script>
        <?php
		}
		else{
			?>
				<script type = "text/javascript">
				window.location = "supplier.php?m=2";
				</script>

			<?php
		}
?>		