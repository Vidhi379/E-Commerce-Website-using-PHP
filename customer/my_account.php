<?php
session_start();
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
        	<a href="../index.php"><img src="../images/logo.jpg" style="float:left;" /></a>
            <img src="../images/banner.jpg" style="float:right;" /> 
        </div>
        <div id="navbar">
        	<ul id="menu">
            	<li><a href="../index.php"> Home</a></li>
                <li><a href="../all_products.php"> All Products</a></li>
                <li><a href="../customer/my_account.php">My Account </a></li>
                <li><a href="../user_register.php">Sign Up </a></li>
                <li><a href="../cart.php">Shopping Cart</a></li>
                <li><a href="../contact.php">Contact Us</a></li>
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
            
            <div id="sidebar_title"> Manage Account! </div><br />
            
            	<ul id="cats">
                
                     <?php
				     
						
						$customer_session = $_SESSION['customer_email'];
						$get_customer_pic = "select * from customers where customer_email='$customer_session'";
						$run_customer = mysqli_query($conn, $get_customer_pic);
						$row_customer = mysqli_fetch_array($run_customer);
						$customer_pic = $row_customer['customer_image'];
                        echo "<img src='customer_photos/$customer_pic' width='150' height='150'>";						  
					
						
				
				      ?>
                 
                	<li><a href="my_account.php?my_orders">My Orders</a></li>
                    <li><a href="my_account.php?edit_account">Edit Account</a></li>
                    <li><a href="my_account.php?change_pass">Change Password</a></li>
                    <li><a href="my_account.php?delete_account">Delete Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
				
                    </ul>
                      
             </div>
            <div id="right_content">
            
            <?php 
			cart();
			
			echo $ip_add=getRealIpAddr();
			?>
            
            	<div id="headline">
                	<div id="headline_content">
                   <?php
				   if(isset($_SESSION['customer_email'])){
					   echo "<b>Welcome:" . $_SESSION['customer_email'] . "</b>"; 
					   
					   
					   }
					   ?>
                    <a href="logout.php" style="color:#F90;">Logout</a>
                    </span>
                    </div>
                </div>
               
                <div>
                
                <h2 style="background:#000; color:#FC9; padding:20px; text-align:center; border-top:2px solid #FFF;"> Manage Your Account Here </h2>
                
                <?php getDefault()?>
                
                <?php
				if(isset($_GET['my_orders']))
				{
					include("my_orders.php");
					
					}
			     if(isset($_GET['edit_account']))
				{
					include("edit_account.php");
					
					}
					 if(isset($_GET['change_pass']))
				{
					include("change_pass.php");
					
					}
					
					 if(isset($_GET['delete_account']))
				{
					include("delete_account.php");
					
					}
				
				
				?>
              
                
              
            
            
             </div>   
        </div>
        <div class="footer">
        <h1 style="color:#000; padding-top:30px; font-size:24pxpx; text-align:center;"> &copy; 2014- By Www.OnlineUstaad.com</h1>
        
        </div>
	</div> 
