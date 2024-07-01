<?php
	include("db/dbconnection.php");
    
    $sql = "SELECT * FROM sc_plant_info ORDER By plant_id";
    $result = $conn->query($sql);
	
	$row = mysqli_num_rows($result);
	
	echo $row;
	
?>