<?php
	include("db/dbconnection.php");
	
	$id = $_GET['id'];
	
    $soilData=explode('/',$id);
    $soil_ph = $soilData[0]; 
    $soil_moisture = $soilData[1]; 

    $sql = "SELECT DISTINCT brgy_name,purok,ph_level,moisture FROM sc_locations,sc_soil_info,sc_plant_info,sc_choosen_soil WHERE sc_locations.soil_id = sc_soil_info.soil_id AND sc_choosen_soil.soil_id = sc_soil_info.soil_id AND sc_choosen_soil.plant_id = sc_plant_info.plant_id AND sc_soil_info.ph_level = '$soil_ph'";
	
    $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
      
            $response['data'] = array();
            // output data of each row
      
            while($row = $result->fetch_array()) {
				
			    $view_plants = array();
		    	$view_plants["Brgy"] = $row["purok"].", ".$row["brgy_name"];
			    $view_plants["Soil pH"] = $row["ph_level"];
			    $view_plants["Soil Moisture"] = $row["moisture"];  

                array_push($response['data'], $view_plants);
		  		  
	        }
      
            echo json_encode($response);
      
        } else {
            $response['data'] = array();
     
			    $view_plants = array();
		    	$view_plants["Brgy"] = "No barangay compatible in our database";
			    $view_plants["Prk"] =  "No purok compatible in our database";
			    $view_plants["Soil pH"] =  "No soil pH data compatible";
			    $view_plants["Soil Moisture"] =  "No soil moisture data compatible";  

                array_push($response['data'], $view_plants);
		  		  
	        
      
            echo json_encode($response);
        }	    
    $conn->close();
?>