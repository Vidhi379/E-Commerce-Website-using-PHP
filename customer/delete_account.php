<form action="" method="post">

	<table align="center" width="600">
    <tr align="center">
    	<td colspan="2"><h2>Do you really want to delete your account?</h2></td>
     </tr>
     
     <tr align="center">
     <td><input type="submit" name="yes" value="I want to delete"/>
    <input type="submit" name="no" value="I donot want to delete"/>
    </td> 
     </tr>
    
    
    </table>




</form>
<?php
@session_start();
include("includes/db.php");
$c = $_SESSION['customer_email'];
	if(isset($_POST['yes'])){
	
	$delete_customer = "delete from customers where customer_email='$c'";
	$run_delete = mysqli_query($conn, $delete_customer);
	
	if($run_delete){
		echo "<script>alert('Your account has been deleted, Good Bye!')</script>";
		echo "<script>window.open('../index.php','_self')</script>";
		
		
		
	}
		
		
		
		}
		
		if(isset($_POST['no'])) {
		
			echo "<script>window.open('my_account.php'.'_self')</script>";
				
		
			
		}
			
			
			
			





?>