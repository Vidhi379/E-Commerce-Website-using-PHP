<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
form{margin:15%;}



</style>
</head>

<body>

	<form action="" method="post">
    
    	<b>Insert New Category</b>
        <input type="text" name="cat_title"/>
        <input type="submit" name="insert_cat" value="Insert Category" />
    </form>
   <?php
   include("includes/db.php");
   
   if(isset($_POST['insert_cat'])){
	   
	   $cat_title = $_POST['cat_title'];
	   
	   $insert_cat = "insert into categories (cat_title) values ('$cat_title') ";
	   
	   $run_cat = mysqli_query($conn, $insert_cat);
	   
	   if($run_cat){
		   
		   echo "<script>alert('New category has been inserted')</script>";
		   echo "<script>window.open('index.php?view_cats','_self')</script>";
		   
		   
		   
		   }
	   
	   
	   
	   
	   }
   
   
   
   ?>
</body>
</html>