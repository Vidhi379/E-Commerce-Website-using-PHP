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
                <?php 
				if(!isset($_SESSION['customer_email']))
				{
					include("customer/customer_login.php");
				}
				
					else
				    {
						
					include("payment_options.php");
					
					}
					
				
				
				?>
                
              
            
            
             </div>   
        </div>
        <div class="footer">
        <h1 style="color:#000; padding-top:30px; font-size:24pxpx; text-align:center;"> &copy; 2014- By Www.OnlineUstaad.com</h1>
        
        </div>
	</div> 
