<?php

	include("db/dbconnection.php");
	
    $id = $_POST['id'];
    
    
   // sql to delete a record
    $sql = "DELETE FROM sc_suggested_plant WHERE 	id = '$id'";
    
		
		if ($conn->query($sql) === TRUE) {
			echo "<h3>Suggested plant successfully deleted</h3>";
		}
		else {
		  echo "Error deleting record: " . $conn->error;
		}
     
    
    $conn->close();
?>