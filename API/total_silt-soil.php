<?php
	include("db/dbconnection.php");
    
    $sql = "SELECT * FROM sc_soil_info where soil_type='Silt Soil'  ORDER By soil_id ";
    $result = $conn->query($sql);
	
	$row = mysqli_num_rows($result);
	
	echo $row;
	
?>