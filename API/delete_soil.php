<?php
	include("db/dbconnection.php");

    $id = $_POST['id'];
    
	
	$sql = "DELETE FROM sc_soil_info WHERE soil_id = '$id'";
    
    if ($conn->query($sql) === TRUE) {
		echo "<h3>Soil data successfully deleted</h3>";
	}
	else {
		echo "Error deleting record: " . $conn->error;
	}
    
    
    $conn->close();
?>