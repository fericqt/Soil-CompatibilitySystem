<?php
	include("db/dbconnection.php");
    
    $sql = "SELECT * FROM sc_user_rating where rated_score='5'  ORDER By id ";
    $result = $conn->query($sql);
	
	$row = mysqli_num_rows($result);
	
	echo $row;
	
?>