<?php
	
	include("db/dbconnection.php");

    $sql = "SELECT * FROM sc_latest_activity ORDER BY logs_id DESC";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      
      $response['data'] = array();
      // output data of each row
      
      while($row = $result->fetch_array()) {

			$activity = array();
			$activity["L-ID"] = $row["id"];
			$activity["Plant"] = $row["plant_name"];
			$activity["Activity"] = $row["activity"];
			$activity["Soil pH"] = $row["soil_ph_value"];
			$activity["Soil Moisture"] = $row["soil_moisture_value"];
			$activity["Category"] = $row["soil_ph_category"];
			$activity["Result"] = $row["result"];
			$activity["Date"] = $row["date"];
			$activity["Time"] = $row["time"];
			

          array_push($response['data'], $activity);
		  
		  

		  
	  }
      
      echo json_encode($response);
      
    } else {
      echo "0";
    }
    $conn->close();
?>