<?php
include("includes/db.php");
include("functions/functions.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Shop</title>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>

	<div class="main_wrapper">
    
    
    	<div class="header_wrapper">
        	<a href="index.php"><img src="images/logo.jpg" style="float:left;" /></a>
            <img src="images/banner.jpg" style="float:right;" /> 
        </div>
        <div id="navbar">
        	<ul id="menu">
            	<li><a href="index.php"> Home</a></li>
                <li><a href="all_products.php"> All Products</a></li>
                <li><a href="my_account.php">My Account </a></li>
                <li><a href="user_register.php">Sign Up </a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="contact.php">Contact Us</a></li>
              </ul>
              
              <div id="form">
              		<form method="get" action="results.php" enctype="multipart/form-data">
                    
                    <input type="text" name="user_query" placeholder= "Search a Product"/>
                    <input type="submit" name="search" value="Search"/>
                   </form>
                    
                </div>    
                    
                    
          
              
           
        </div>
        <div class="content_wrapper">
        	<div id="left_sidebar"> 
            
            <div id="sidebar_title"> Categories </div>
            
            	<ul id="cats">
                 
                <?php  
				getCats();
				 ?>
				
                    </ul>
                      <div id="sidebar_title"> Brands </div>
                      <ul id="cats">
                      
                      <?php 
					  getBrands();
					  
					  
					  
				       ?>
                			
                           </ul>
                         
             </div>
            <div id="right_content">
            
            <?php 
			cart();
			
			echo $ip_add=getRealIpAddr();
			?>
            
            	<div id="headline">
                	<div id="headline_content"> 
                    <b> Welcome Guest!</b>
                    <b style="color:#FF0;"> Shopping Cart: </b>
                    <span>- Items: <?php items(); ?>  - Price: <?php total_price(); ?> - <a href="cart.php" style="color:#FF0;">Go to Cart</a></span>
                    </div>
                </div>
               
                <div id="products_box"> 
                <form action="cart.php" method="post" enctype="multipart/form-data">
                
                	<table width="740" align="center"  bgcolor="#0099FF">
                    
                    <tr align="center">
                    	<td><b>Remove</b></td>
                        <td><b>Product(s)</b></td>
                        <td><b>Quantity</b></td>
                        <td><b>Total Price</b> </td>
                    </tr>
                    
                
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
                   
   <?php                
    
	
	$total = 0;
	
	$ip_add=getRealIpAddr();
	$sel_price = "select * from cart where ip_add='$ip_add'";
	$run_price = mysqli_query($conn,$sel_price);
	
	while ($record = mysqli_fetch_array($run_price)){
	$pro_id = $record['p_id'];
	$pro_price = "select * from products where product_id='$pro_id'";
	
	$run_pro_price = mysqli_query($conn,$pro_price);
	
	while($p_price=mysqli_fetch_array($run_pro_price)){
		
	$product_price = array($p_price['product_price']);
	$product_title = $p_price['product_title'];
	$product_image = $p_price['product_img1'];
	$only_price = $p_price['product_price'];
	
	$values = array_sum($product_price);
	$total +=$values;	
		
	

		?>
		
                    
                    <tr>
                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"  /> </td>
                    <td><?php echo $product_title;?><br><img src="admin_area/product_images/<?php echo $product_image; ?>" height="80" width="80"> </td>
                    <td><input type="text" name="qty" value="1" size="3px"/></td>
                    <td><?php echo $only_price; ?></td>
                    <?php
					
						global $conn;
					if(isset($_POST['update']))
					{
						$qty = $_POST['qty'];
						
						$insert_qty = "update cart set qty='$qty' where ip_add='$ip_add'";
						
						$run_qty = mysqli_query($conn,$insert_qty);
						
						$total = $total*$qty;
					}
					
					
					
					
					?>
                    </tr>
                    <?php }} ?>
                    <tr>
                    <td colspan="3" align="right"><b> Sub Total </b></td>
                    <td><b><?php echo $total; ?></b></td>
                    </tr>
                    <tr>
                    
                    </tr>
                    <tr>
                    
                    
                    
                    </tr>
                    
                    <tr>
                    	<td colspan="2"><input type="submit" name="update" value="Update Cart"/> </td>
                        <td><input type="submit" name="continue" value="Continue Shopping"/> </td>
                        <td><button><a href="payment_options.php" style="text-decoration:none; color:#000">Checkout</button></a></td>
                    
                    
                    
                    
                    </table>
                
              
            </form>
          <?php
		  
		  function updatecart() {
		   global $conn;
		  if(isset($_POST['update']))
		  {
			  foreach($_POST['remove'] as $remove_id)
			  {
				  $delete_products = "delete from cart where p_id='$remove_id'";
				  $run_delete = mysqli_query($conn, $delete_products);
				  if($run_delete)
				  {
					  echo "<script>window.open('cart.php','_self')</script>";
				  }
				  }
		  }
			 if(isset($_POST['continue']))
			 {
				 echo "<script>window.open('index.php','_self')</script>";
			  }
			  
		  }
		   
			echo @$up_cart = updatecart();  
		  
		  ?>
            
                
        </div>
        
        </div>
      