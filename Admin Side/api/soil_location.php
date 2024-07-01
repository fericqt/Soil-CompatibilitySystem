<?php
	
	include("db/dbconnection.php");

	$id = (int)$_GET['id']; 
		
    $sql = "SELECT * FROM sc_barangay where soil_id='$id' ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      
      $response['data'] = array();
      // output data of each row
      
      while($row = $result->fetch_array()) {

			$view_soil = array();
			$view_soil["Barangay"] = $row["brgy_name"];
			$view_soil["Purok"] = $row["purok"];
		  
		  
          array_push($response['data'], $view_soil);
		  
		  

		  
	  }
      
      echo json_encode($response);
      
    } else {
      echo "0 results";
    }
    $conn->close();
?>