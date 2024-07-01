<?php

	include("db/dbconnection.php");
	
    $id = $_GET['id'];
    
    $sql = "UPDATE sc_plant_info SET status = '1' WHERE plant_id='$id'";
    if ($conn->query($sql) === TRUE) {
	echo "Status updated successfully";
	}
	else {
		echo "Error in updating status: " . $conn->error;
	}  
    
    $conn->close();
?>