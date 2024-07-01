<?php

	include("db/dbconnection.php");
	
    $id = $_POST['id'];
    
    
     
       $query = "SELECT * FROM sc_plant_info WHERE plant_id='".$id."'";
        $result = $conn->query($query);
	if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            $image = $row['plant_picture'];
            $file= '../upload/plant/'.$image;
            unlink($file);
        }
	}
        $sql = "DELETE FROM sc_plant_info WHERE plant_id='".$id."'";
        if ($conn->query($sql) === TRUE) {
		echo "<h3>Plant data successfully deleted</h3>";
		}
		else {
			echo "Error deleting record: " . $conn->error;
		}  
    
    $conn->close();
?>