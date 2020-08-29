<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="794" align="center" bgcolor="#FF3366">
<tr >
	<td colspan="3"><h2>View All Brands</h2></td>
</tr>
<tr>
<th>Brand ID</th>
<th>Brand Title</th>
<th>Delete</th>
<th>Edit</th>
</tr>
<?php
include("includes/db.php");
$get_brands = "select * from brands ";
$run_brands = mysqli_query($conn, $get_brands);
while($row_brands=mysqli_fetch_array($run_brands)){
	
	$brand_id = $row_brands['brand_id'];
	$brand_title = $row_brands['brand_title'];
	
	
	
	


?>
<tr align="center">
<td><?php echo $brand_id; ?></td>
<td><?php echo $brand_title; ?></td>
<td><a href="index.php?edit_brand=<?php echo $brand_id;?>">Edit</a></td>
<td><a href="delete_brand.php?delete_brand=<?php echo $brand_id;?>">Delete</a></td>
</tr>
<?php } ?>

</table>
</body>
</html>