<?php

    include("db/dbconnection.php");
    
	$id = (int)$_GET['id']; 
	
    $sql = "SELECT * FROM sc_locations, sc_soil_info where sc_locations.soil_id=sc_soil_info.soil_id and sc_locations.soil_id='$id' ";
    $result = $conn->query($sql);
 
	  if ($result->num_rows > 0) {
      
      $response['data'] = array();
      // output data of each row
      
      while($row = $result->fetch_array()) {

			
			$view_location = array();
			$view_location["ID"] = $row["id"];
			$view_location["City"] = $row["city_name"];
			$view_location["Barangay"] = $row["brgy_name"];
			$view_location["Purok"] = $row["purok"];
			$view_location["Lattitude"] = $row["lattitude"];
			$view_location["Longitude"] = $row["longitude"];
		  
		  
          array_push($response['data'], $view_location);
		  
		  

		  
	  }
      
      echo json_encode($response);
      
    } else {
      echo "0";
    }
    $conn->close();
?>