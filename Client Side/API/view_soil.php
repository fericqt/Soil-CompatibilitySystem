<?php
	
	include("db/dbconnection.php");
    
    $sql = "SELECT * FROM sc_soil_info";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      
      $response['data'] = array();
      // output data of each row
      
      while($row = $result->fetch_array()) {
		  $view_soil = array();
		  $view_soil["ID"] = $row["soil_id"];
          $view_soil["Soil Quality"] = $row["soil_quality"];
          $view_soil["PH Level"] = $row["ph_level"];
		  $view_soil["Moisture"] = $row["moisture"];
		  $view_soil["Moisture Condition"] = $row["moisture_condition"];
		  
		  
          array_push($response['data'], $view_soil);

		  
	  }
      
      echo json_encode($response);
      
    } else {
      echo "0 results";
    }
    $conn->close();
?>