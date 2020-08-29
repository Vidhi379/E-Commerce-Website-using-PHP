<?php
$servername = "localhost";
$username = "root";
$password = "9913184889";
$dbname = "myshop";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn){
echo "";
}
else
{
die("connection failed because" .msqli_connect_error());
}
?>
