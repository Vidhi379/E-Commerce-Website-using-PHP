<?php
	
	include("includes/db.php");

	if(isset($_GET['delete_brand'])){
		
		$delete_id = $_GET['delete_brand'];
		$delete_brand ="delete from brands where brand_id='$brand_id'";
		$run_delete = mysqli_query($conn, $delete_brand);
		
		if($run_delete)
		{
			echo "<script>alert('One Brand has been deleted')</script>";
			echo "<script>window.open('index.php?view_brands','_self')</script>";
		}
		
		
		
		
		
		}
