<?php
	include("db/dbconnection.php");
	
	$id = $_GET['id'];

    $sql = "SELECT * FROM sc_locations,sc_soil_info,sc_plant_info,sc_choosen_soil WHERE sc_locations.soil_id = sc_soil_info.soil_id AND sc_choosen_soil.soil_id = sc_soil_info.soil_id AND sc_choosen_soil.plant_id = sc_plant_info.plant_id AND sc_plant_info.plant_name = '$id'";
	
    $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
      
            $response['data'] = array();
            // output data of each row
      
            while($row = $result->fetch_array()) {
				
				
			    $view_plants = array();
		    	$view_plants["Brgy"] = $row["purok"].", ".$row["brgy_name"];
			    $view_plants["Plant"] = $row["plant_name"];
			    $view_plants["Soil pH"] = $row["ph_level"];
			    $view_plants["Soil Moisture"] = $row["moisture"];

                array_push($response['data'], $view_plants);
		  		  
	        }
      
            echo json_encode($response);
      
        } else {
        echo "0 results";
        }	    
    $conn->close();
?>