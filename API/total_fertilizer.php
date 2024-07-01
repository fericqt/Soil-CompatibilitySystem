<?php
	include("db/dbconnection.php");
    
    $sql = "SELECT * FROM sc_fertilizer_info ORDER By fertilizer_id";
    $result = $conn->query($sql);
	
	$row = mysqli_num_rows($result);
	
	echo $row;
	
?>