<?php
	include("db/dbconnection.php");
    
    $sql = "SELECT * FROM sc_soil_info ORDER By soil_id";
    $result = $conn->query($sql);
	
	$row = mysqli_num_rows($result);
	
	if($row == 0){
	    
	    echo "No soil has been tested yet";
	    
	}else
	{
	    echo $row;
	}

	
?>