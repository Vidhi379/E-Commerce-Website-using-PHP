<?php
include("includes/db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
  <script>tinymce.init({selector:'textarea'});
  </script>

</head>

<body bgcolor="#999999">

<form method="post" action="insert_product.php" enctype="multipart/form-data">

	<table width="700" align="center" border="1" bgcolor="#00CCCC">
    
    	<tr align="center">
        
        <td colspan="2"><h1>Insert new product:</h1></td> 
        </tr>
        
        <tr>
        	<td align="right"><b>Product Title</b></td>
        <td><input type="text" name="product_title" size="50" /></td>
        </tr>
        
        <tr>
        	<td align="right"><b>Product Category</b></td>
        <td>
        <select name="product_cat">
        	<option> Select a category </option>
             <?php
				
				$get_cats = "select * from categories";
				
				$run_cats = mysqli_query($conn, $get_cats);
				
				while ($row_cats = mysqli_fetch_array($run_cats)) {
				
				$cat_id = $row_cats['cat_id'];
				
				$cat_title = $row_cats['cat_title'];
				
				echo "<option value='$cat_id'>$cat_title</option>";
				
				}
				?>
                </select>
            
        
        </td>
        </tr>
        
        <tr>
        <td align="right"><b>Product Brand</b></td>
        <td>
        
         <select name="product_brand">
         
         <option> Select Brand </option>
         
         <?php
				
						$get_brands = "select * from brands";
				
						$run_brands = mysqli_query($conn, $get_brands);
				
						while ($row_brands = mysqli_fetch_array($run_brands)) {
				
						$brand_id = $row_brands['brand_id'];
				
						$brand_title = $row_brands['brand_title'];
				
						echo "<option value='$brand_id'>$brand_title</option>";	
				
						}
						?>
						
        </td>
        </tr>
        
         <tr>
          <td align="right"><b>Product Image 1</b></td>
        <td><input type="file" name="product_img1" /></td>
        </tr>
        
         <tr>
         <td align="right"><b>Product Image 2</b></td>
        <td><input type="file" name="product_img2" /></td>
        </tr>
        
         <tr>
          <td align="right"><b>Product Image 3</b></td>
        <td><input type="file" name="product_img3" /></td>
        </tr>
        
         <tr>
          <td align="right"><b>Product Price</b></td>
        <td><input type="text" name="product_price" /></td>
        </tr>
        
         <tr>
         <td align="right"><b>Product Description</b></td>
        <td><textarea name="product_desc" cols="35" rows="10"></textarea></td>
        </tr>
        
        <tr>
        <td align="right"><b>Product Keywords</b></td>
        <td><input type="text" name="product_keywords" size="50" /></td>
        </tr>
        
        <tr align="center">
        <td colspan="2"><input type="submit" name="insert_product" value="Insert Product" /></td>
        </tr>
        
        
    
    
    
    
    </table>




</form>
</body>
</html>

<?php

	if(isset($_POST['insert_product']))
	 {
		
	$title = $_POST['product_title'];
	$cat = $_POST['product_cat'];
	$brand = $_POST['product_brand'];
	$price = $_POST['product_price'];
	$desc = $_POST['product_desc'];
	$status = 'on';
	$keyword = $_POST['product_keywords'];
	
	$img1 = $_FILES['product_img1']['name'];
	$img2 = $_FILES['product_img2']['name'];
	$img3 = $_FILES['product_img3']['name'];
	
	$temp_name1 = $_FILES['product_img1']['tmp_name'];
	$temp_name2 = $_FILES['product_img2']['tmp_name'];
	$temp_name3 = $_FILES['product_img3']['tmp_name'];
	
	if($title=='' OR $cat=='' OR $brand=='' OR $price=='' OR $desc=='' OR $keyword=='' OR $img1==''){
		
	
	   echo  "<script> alert('please fill all the feilds!') </script>";
	  
	   
	   
	   }
	   
	   else{
		   
		    move_uploaded_file($temp_name1,"product_images/$img1");
			move_uploaded_file($temp_name2,"product_images/$img2");
			move_uploaded_file($temp_name3,"product_images/$img3");
			
		   
	
							   
		   
	   }
	}
	?>