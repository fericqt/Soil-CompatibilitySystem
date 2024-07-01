<?php
	include("db/dbconnection.php");
	
    $user = "Admin";
    $sql = "SELECT * FROM sc_user_acc where role='$user' ORDER By user_acc_id";
    $result = $conn->query($sql);
	
	$row = mysqli_num_rows($result);
	
	echo $row;
	
?>