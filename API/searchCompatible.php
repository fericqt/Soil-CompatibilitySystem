<?php
	include("db/dbconnection.php");
	
	$id = $_GET['id'];
	
    $soilData=explode('/',$id);
    $soil_ph = $soilData[0]; 
    $soil_moisture = $soilData[1]; 

    $sql = "SELECT DISTINCT plant_name FROM sc_locations,sc_soil_info,sc_plant_info,sc_choosen_soil WHERE sc_locations.soil_id = sc_soil_info.soil_id AND sc_choosen_soil.soil_id = sc_soil_info.soil_id AND sc_choosen_soil.plant_id = sc_plant_info.plant_id AND sc_soil_info.ph_level = '$soil_ph'";
	
    $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
      
            $response['data'] = array();
            // output data of each row
      
            while($row = $result->fetch_array()) {
				if($soil_moisture < 4)
				{
				    $result1 = "Low Soil Moisture";
				}else{
				    $result1 = "Good";
				}
				
			    $view_plants = array();
			    $view_plants["Plant"] = $row["plant_name"];
			    $view_plants["Result"] = $result1;

                array_push($response['data'], $view_plants);
		  		  
	        }
      
            echo json_encode($response);
      
        } else {
            $response['data'] = array();
     
			    $view_plants = array();
		    	$view_plants["Plant"] = "No plant compatible in our database";
			    $view_plants["Result"] =  "No data";

                array_push($response['data'], $view_plants);
		  		  
	        
      
            echo json_encode($response);
        }	    
    $conn->close();
?>