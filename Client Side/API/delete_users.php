<?php

	include("db/dbconnection.php");
	
    $id = $_POST['id'];
    
    
   // sql to delete a record
    $sql = "DELETE FROM sc_user_acc WHERE 	user_acc_id = '$id'";
    
		
		if ($conn->query($sql) === TRUE) {
			echo "<h3>Account user successfully deleted</h3>";
		}
		else {
		  echo "Error deleting record: " . $conn->error;
		}
     
    
    $conn->close();
?>