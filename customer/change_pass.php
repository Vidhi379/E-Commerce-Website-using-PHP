<form action="" method="post">

	<table width="500"  align="center">
    <tr align="center">
    	<td colspan="4"><h2> Change your Password </h2></td>
    </tr>
    <tr>
    <td align="right">Enter current Password:</td>
    <td><input type="password" name="old_pass"/> </td>
    </tr>
    
    <tr>
    <td align="right">Enter New Password:</td>
    <td><input type="password" name="new_pass"/> </td>
    </tr>
    <tr>
    <td align="right">Enter New Password Again:</td>
    <td><input type="password" name="new_pass_again"/> </td>
    </tr>
    
    <tr align="center">
    <td colspan="4"><input type="submit" name="change_pass"  value="Change Password"/> </td>
    
    </td>
    </tr>
    </table>


</form>
<?php
include("includes/db.php");

	$c = $_SESSION['customer_email'];
	
	if(isset($_POST['change_pass'])){
		
		$old_pass = $_POST['old_pass'];
		$new_pass = $_POST['new_pass'];
		$new_pass_again = $_POST['new_pass_again'];
		
		$get_real_pass = "select * from customers where customer_pass='$old_pass'";
		
		$run_real_pass = mysqli_query($conn, $get_real_pass);
		
		if(mysqli_num_rows($run_real_pass)==0) {
			
			echo "<script>alert('Your current password is not valid, try again')</script>";
			exit();
		}
		if($new_pass!=$new_pass_again){
			
			echo "<script>alert('New password did not match, try again')</script>";
			exit();
			
			}
			else{
				
				$update_pass = "update customers set customer_pass='$new_pass' where customer_email='$c'";
				$run_pass = mysqli_query($conn, $update_pass);
				echo "<script>alert('Your password has been successfully changed!')</script>";
				echo "<script>window.open('my_account.php','_self')</script>";
			}
		
		
		}





?>