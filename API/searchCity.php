<?php
	include("db/dbconnection.php");
	
	$id = $_GET['id'];

    $sql = "SELECT * FROM sc_locations,sc_soil_info WHERE sc_locations.soil_id = sc_soil_info.soil_id AND city_name = '$id'";
	
    $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
      
            $response['data'] = array();
            // output data of each row
      
            while($row = $result->fetch_array()) {
				
				
			    $view_plants = array();
		    	$view_plants["Brgy"] = $row["brgy_name"];
			    $view_plants["Prk"] = $row["purok"];
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