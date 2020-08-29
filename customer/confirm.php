<?php
session_start();
include("includes/db.php");

if(isset($_GET['order_id'])){
	
	$order_id = $_GET['order_id'];
	
	
	}



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body bgcolor="#000000">
<form action="confirm.php" method="post">
<table width="500" align="center" border="2" bgcolor="#99CCCC">
	<tr align="center">
    	<td colspan="5"><h2>Please Confirm your Payment </h2></td> 
     </tr>
     
     <tr>
     
     	<td>Invoice No:</td>
        <td><input type="text" name="invoice_no"/></td>
     </tr>
      <tr>
     
     	<td>Amount Sent:</td>
        <td><input type="text" name="amount"/></td>
     </tr>


      <tr>
     
     	<td>Select Payment Mode</td>
        <td>
        <select name="payment_method">
        <option> Select Payment</option>
        <option> Bank Transfer </option>
        <option>EasyPaisa</option>
        <option>Western Union</option>
        <option>Paypal</option>
        </select>
        </td>
        </tr>
         <tr>
     
     	<td>Transaction/Refference ID:</td>
        <td><input type="text" name="tr"/></td>
     </tr>


        
         <tr>
     
     	<td>Payment Date:</td>
        <td><input type="text" name="date"/></td>
     </tr>
     
      <tr align="center">
        <td colspan="5"><input type="submit" name="confirm" value="Confirm Payment"/></td>
     </tr>




        


        
        
        </td>
     </tr>





</form>
</body>
</html>

<?php
if(isset($_POST['confirm'])){

$invoice = $_POST['invoice_no'];
$amount = $_POST['amount'];
$payment_method = $_POST['payment_method'];
$ref_no = $_POST['tr'];
$date = $_POST['date'];

$insert_payment = "INSERT INTO payments (invoice_no, amount, payment_mode, ref_no, payment_date) VALUES ('$invoice', '$amount', '$payment_method', '$ref_no', '$date')";
$run_payment = mysqli_query($conn, $insert_payment);
if($run_payment){
	echo "<h2 style='text-align:center; color:white;'>Payment recieved, your order will be completed within 24 hours</h2>";
}
 
 
	}
?>