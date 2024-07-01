<?php
	include("db/dbconnection.php");
	
	$id = $_GET['id'];

    $sql = "SELECT DISTINCT plant_name FROM sc_locations,sc_soil_info,sc_choosen_soil,sc_plant_info WHERE sc_locations.soil_id = sc_soil_info.soil_id AND sc_choosen_soil.soil_id = sc_soil_info.soil_id AND sc_choosen_soil.plant_id = sc_plant_info.plant_id AND sc_soil_info.ph_level = '$id'";
	
    $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
      
            $response = array();
            // output data of each row
      
            while($row = $result->fetch_array()) {
				
				
			    $view_plants = array();
		    	$view_plants = $row["plant_name"];

                array_push($response, $view_plants);
		  		  
	        }
      
            echo json_encode($response);
      
        } else {
        echo "0 results";
        }	    
    $conn->close();
?>