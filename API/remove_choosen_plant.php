<?php

	include("db/dbconnection.php");
	
    $id = $_POST['id'];
    
    
		
	$sql = "DELETE FROM sc_choosen_soil WHERE plant_id = '$id'";
    
    if ($conn->query($sql) === TRUE) {
		echo "<h3>Plant successfully remove</h3>";
	}
	else {
		echo "Error deleting record: " . $conn->error;
	}
     
    
    
    $conn->close();
?>