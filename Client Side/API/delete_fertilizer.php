<?php

	include("db/dbconnection.php");
	
    $id = $_POST['id'];
    

	 
        $sql = "DELETE FROM sc_fertilizer_info WHERE fertilizer_id='".$id."'";
        if ($conn->query($sql) === TRUE) {
		echo "<h3>Fertilizer data successfully deleted</h3>";
		}
		else {
			echo "Error deleting record: " . $conn->error;
		}  
	
    
    $conn->close();
?>