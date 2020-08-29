<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="styles/styles.css" media="all"/>

<body>
<div class="wrapper">
	<div class="header"></div>
    
    <div class="right">
    <h2>Manage Content </h2>
    <a href="index.php?insert_product">Insert New Product </a>
     <a href="index.php?view_products">View all Products </a>
      <a href="index.php?insert_cat">Insert New Category </a>
       <a href="index.php?view_cats">View All Categories  </a>
        <a href="index.php?insert_brand">Insert New Brand </a>
         <a href="index.php?view_brands">View all Brands </a>
          <a href="index.php?view_customers">View Customers </a>
           <a href="index.php?view_orders">View Orders </a>
            <a href="index.php?view_payments">View Payments </a>
             <a href="logout.php?view_orders">Admin Logout </a>
    
    
    
    </div>
<div class="left"> 
<?php
include("includes/db.php");

if(isset($_GET['insert_product'])){

include("Insert.php");	
	
}
if(isset($_GET['view_products'])){

include("view_products.php");	
	
}

if(isset($_GET['edit_pro'])){

include("edit_pro.php");	
	
}
if(isset($_GET['insert_cat'])){

include("insert_cat.php");	
	
}
if(isset($_GET['view_cats'])){

include("view_cats.php");	
	
}

if(isset($_GET['edit_cat'])){

include("edit_cat.php");	
	
}

if(isset($_GET['delete_cat'])){

include("delete_cat.php");	
	
}
if(isset($_GET['insert_brand'])){

include("insert_brand.php");	
	
}
if(isset($_GET['view_brands'])){

include("view_brands.php");	
	
}
if(isset($_GET['delete_brand'])){

include("delete_brand.php");	
	
}



?>





 </div>

</div>
</body>
</html>