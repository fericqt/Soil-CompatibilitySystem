<?php
	include("db/dbconnection.php");
    
    $sql = "SELECT * FROM sc_user_acc ORDER By user_acc_id";
    $result = $conn->query($sql);
	
	$row = mysqli_num_rows($result);
	
	echo $row;
	
?>