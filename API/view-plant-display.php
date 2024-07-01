<?php
	include("db/dbconnection.php");
	
	$id = $_GET['id'];

    $sql = "SELECT * FROM sc_locations,sc_soil_info,sc_choosen_soil,sc_plant_info WHERE sc_locations.soil_id = sc_soil_info.soil_id AND sc_choosen_soil.soil_id = sc_soil_info.soil_id AND sc_choosen_soil.plant_id = sc_plant_info.plant_id AND sc_locations.brgy_name = '$id'";
	
    $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
      
            $response['data'] = array();
            // output data of each row
      
            while($row = $result->fetch_array()) {
				
				
			    $view_plants = array();
		    	$view_plants["ID"] = $row["plant_id"];
			    $view_plants["Plant Name"] = $row["plant_name"];
			    $view_plants["plant_picture"] = $row["plant_picture"];

                array_push($response['data'], $view_plants);
		  		  
	        }
      
            echo json_encode($response);
      
        } else {
        $sql = "SELECT DISTINCT sc_plant_info.plant_name,sc_plant_info.plant_id,sc_plant_info.plant_picture FROM sc_locations,sc_soil_info,sc_choosen_soil,sc_plant_info WHERE sc_locations.soil_id = sc_soil_info.soil_id AND sc_choosen_soil.soil_id = sc_soil_info.soil_id AND sc_choosen_soil.plant_id = sc_plant_info.plant_id AND sc_plant_info.plant_name = '$id'";
        
            $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
      
            $response['data'] = array();
            // output data of each row
      
            while($row = $result->fetch_array()) {
				
				
			    $view_plants = array();
		    	$view_plants["ID"] = $row["plant_id"];
			    $view_plants["Plant Name"] = $row["plant_name"];
			    $view_plants["plant_picture"] = $row["plant_picture"];

                array_push($response['data'], $view_plants);
		  		  
	        }
      
            echo json_encode($response);
        }
        }
    $conn->close();
?>