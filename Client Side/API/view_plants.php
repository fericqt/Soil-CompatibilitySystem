<?php
	
	include("db/dbconnection.php");
		
    $sql = "SELECT * FROM sc_plant_info";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      
      $response['data'] = array();
      // output data of each row
      
      while($row = $result->fetch_array()) {
				
				
			$view_plants = array();
			$view_plants["plant_picture"] = $row["plant_picture"];
			$view_plants["ID"] = $row["plant_id"];
			$view_plants["Plant Name"] = $row["plant_name"];
			$view_plants["Plant Type"] = $row["plant_type"];
			$view_plants["Status"] = $row["status"];
		  
		  
          array_push($response['data'], $view_plants);
		  
		  

		  
	  }
      
      echo json_encode($response);
      
    } else {
      echo "0 results";
    }
    $conn->close();
?>