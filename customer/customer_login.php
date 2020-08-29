<?php
@session_start();
include("includes/db.php");
include_once("functions/functions.php");
 
?>
<div>

	
    <form action="checkout.php" method="post">
         
         <table width="800" bgcolor="#FF0033" align="center">
         <tr>
         <td colspan="4"><h2><center>Login or Register</center></h2></td>
         <tr>
    	 <td align="right"><b>Enter your Email:</b> </td>
         <td> <input type="text" name="c_email" /></td>
         </tr>
         <tr>
          <td align="right"><b> Enter your Password:</b> </td>
          <td> <input type="password" name="c_pass" /></td>
          </tr>
          <tr align="center"><td colspan="4"> <a href="forgot_pass.php"> Forgot Password</a></td></tr>
          <tr>
        <td align="right"><input type="submit" name="c_login" value="Login"/></td>
        </tr>
        </table>
        
      
       </form>
        <h2 style="float:right"; padding:"10"> <a href="customer_register.php"> New? Register Here </a> </h2>
        
</div>

<?php
if(isset($_POST['c_login'])){
	
$customer_email = $_POST['c_email'];
$customer_pass = $_POST['c_pass'];

$sel_customer ="select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

$run_customer = mysqli_query($conn, $sel_customer);

$check_customer = mysqli_num_rows($run_customer);

$get_ip = getRealIpAddr();
$sel_cart = "select * from cart where ip_add='$get_ip'";

$run_cart = mysqli_query($conn,$sel_cart);
$check_cart = mysqli_num_rows($run_cart);
if($check_customer==0){
echo "<script>alert('Password or Email address is not correct,try gain!')</script>";
exit();

}
	
	
	if($check_customer==1 AND $check_cart==0){
	
	$_SESSION['customer_email']=$customer_email;
	echo "<script>window.open('customer/my_account.php','_self')</script>";
	}
	else
	{
		$_SESSION['customer_email']=$customer_email;
		include("payment_options.php");
		
		
		
	}

	
	
	
}


?>


