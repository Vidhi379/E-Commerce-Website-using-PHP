<!DOCTYPE html>
<html>
<head>
	<title> Payment Options</title>
    </head>

<body>
<?php
include("includes/db.php");
include_once("functions/functions.php");


?>
    


<div align="center" style="padding:20px;">
<h2> Payment Options for you</h2>
<?php
$ip = getRealIpAddr();
$get_customer = "select * from customers where customer_ip = '$ip'";
$run_customer = mysqli_query($conn,$get_customer);
$customer = mysqli_fetch_array($run_customer);
$customer_id = $customer['customer_id'];
?>

<b>Pay with</b>&nbsp;<a href="http://www.paypal.com"><img src="images/paypal.jpg" width="200" height="100" /></a> <b>Or<a href="order.php?c_id=<?php echo $customer_id; ?>">Pay Offline</a></b><br/><br/>

<b> If you selected "Pay Offline" option then please check your email or account to find the Invoice No for your order</b>




</div>
</body>
</html>