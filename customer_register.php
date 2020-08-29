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
                 
                <?php  getCats(); ?>
				
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
               
                <div>
                
                <form action="customer_register.php" method="post" enctype="multipart/form-data"/>
                
                <table width="750" align="center">
                <tr align="center">
                	<td colspan="5"><h2> Create an account </h2></td>
                    </tr>
                    
                    <tr>
                   	<td align="right"><b> Customer Name:</b></td>
                    <td><input type="text" name="c_name" required/></td>
                    </tr>
                    <tr>
                   	<td align="right"><b> Customer Email:</b></td>
                    <td><input type="text" name="c_email" required/></td>
                    </tr>
                     <tr>
                   	<td align="right"><b> Customer Password:</b></td>
                    <td><input type="password" name="c_pass" required/></td>
                    </tr>
                     <tr>
                   	<td align="right"><b> Customer Country:</b></td>
                    <td>
                    <select name="c_country">
                    	<option>Select Country</option>
                        <option>India</option>
                        <option>Pakistan</option>
                        <option>Srilanka</option>
                        <option>Japan</option>
                        <option>China</option>
                        <option>United Kingdom</option>
                        <option>United States</option>
                    
                    </select>
                   
                    </tr>
                     <tr>
                   	<td align="right"><b> Customer City:</b></td>
                    <td><input type="text" name="c_city" required/></td>
                    </tr>
                     <tr>
                   	<td align="right"><b> Customer Mobile No:</b></td>
                    <td><input type="text" name="c_contact" required/></td>
                    </tr>
                    <tr>
                   	<td align="right"><b> Customer Address:</b></td>
                    <td><input type="text" name="c_address" required/></td>
                    </tr>
                    <tr>
                   	<td align="right"><b> Customer Image:</b></td>
                    <td><input type="file" name="c_image" required/></td>
                    </tr>
                    <tr align="center">
                    	<td colspan="5"><input type="submit" name="register" value="register"/></td>
                   
                    </tr>
                    
                   
                
                </table>
                </form>
                
            
             </div>   
        
</body>
</html>
<?php
if(isset($_POST['register'])){

$c_name = $_POST['c_name'];
$c_email = $_POST['c_email'];
$c_pass = $_POST['c_pass'];
$c_country = $_POST['c_country'];
$c_city = $_POST['c_city'];
$c_contact = $_POST['c_contact'];
$c_address = $_POST['c_address'];
$c_image = $_FILES['c_image']['name'];
$c_image_tmp = $_FILES['c_image']['tmp_name'];
$c_ip = getRealIpAddr();


move_uploaded_file($c_image_tmp,"customer/customer_photos/$c_image");	

$insert_customer = "INSERT INTO customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) VALUES ('$c_name', '$c_email', '$c_pass','$c_country', '$c_city', '$c_contact', '$c_address', '$c_image', '$c_ip')";
$result = mysqli_query($conn, $insert_customer);

if(!$result) 
        { 
		echo mysqli_error($conn); 
		}
    else
    {
        echo "Successfully Inserted <br />";
        
    }


$sel_cart = "select * from cart where ip_add='$c_ip'";

$run_cart = mysqli_query($conn,$sel_cart);
$check_cart = mysqli_num_rows($run_cart);

if($check_cart>0){
$_SESSION['customer_email']=$c_email;

echo "<script>alert('Account created successfully,Thank you!')</script>";

echo "<script>window.open('checkout.php','_self')</script>";
	
}
else{
	echo "<script>alert('Account created successfully,Thank you!')</script>";
	echo "<script>window.open('index.php','_self')</script>";
}
	
}
?>






