<?php
@session_start();
include("includes/db.php");

if(isset($_GET['edit_account'])){
	$customer_email = $_SESSION['customer_email'];
	$get_customer = "select * from customers where customer_email = '$customer_email' ";
	$run_customer = mysqli_query($conn, $get_customer);
    $row = mysqli_fetch_array($run_customer);
	
	$id = $row['customer_id'];
	$name = $row['customer_name'];
	$email = $row['customer_email'];
	$pass = $row['customer_pass'];
	$country = $row['customer_country'];
	$city = $row['customer_city'];
	$contact = $row['customer_contact'];
	$address = $row['customer_address'];
	$image = $row['customer_image'];
	}
?>

<form action="" method="post">
 <table width="750" align="center">
                <tr align="center">
                	<td colspan="8"><h2> Update your account: </h2></td>
                    </tr>
                    
                    <tr>
                   	<td align="right"><b> Customer Name:</b></td>
                    <td><input type="text" name="c_name" value="<?php echo $name ?>" /></td>
                    </tr>
                    <tr>
                   	<td align="right"><b> Customer Email:</b></td>
                    <td><input type="text" name="c_email" value="<?php echo $customer_email ?>" /></td>
                    </tr>
                     <tr>
                   	<td align="right"><b> Customer Password:</b></td>
                    <td><input type="password" name="c_pass" value="<?php echo $pass?>" /></td>
                    </tr>
                     <tr>
                   	<td align="right"><b> Customer Country:</b></td>
                    <td>
                    <select name="c_country" disabled>
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
                    <td><input type="text" name="c_city" value="<?php echo $city ?>"/></td>
                    </tr>
                     <tr>
                   	<td align="right"><b> Customer Mobile No:</b></td>
                    <td><input type="text" name="c_contact" value="<?php echo $contact?>"/></td>
                    </tr>
                    <tr>
                   	<td align="right"><b> Customer Address:</b></td>
                    <td><input type="text" name="c_address" value="<?php echo $address ?>"/></td>
                    </tr>
                    <tr>
                   	<td align="right"><b> Customer Image:</b></td>
                    <td><input type="file" name="c_image" value="<?php echo $image ?>"/></td>
                    </tr>
                    <tr align="center">
                    	<td colspan="5"><input type="submit" name="update_account" value="Update Now"/></td>
                   
                    </tr>
                    
                   
                
                </table>

</form>
<?php
	
	if(isset($_POST['update_account'])){
	
		$update_id = $id;
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		
		
		
		
	 $update_c = "update customers set customer_name='$c_name', customer_email='$c_email', customer_pass='$c_pass', customer_city='$c_city', 
	              customer_contact='$c_contact', customer_address='$c_address', customer_image='$c_image' where customer_id='$update_id'";
				  
				  
	 	$run_c = mysqli_query($conn, $update_c);
		
		if($run_c){
			
			echo "<script>alert('Your account has been updated!')</script>";
			echo "<script>window.open('my_account.php','_self')</script>";
		}
		
			
		
		
	
	
		
	}



?>

	
	
	
	
	
		

		



