<?php
	
	include("db/dbconnection.php");

	$id = (int)$_GET['id'];   
		
    $sql = "SELECT *
            FROM ((sc_choosen_soil
            INNER JOIN sc_plant_info ON sc_choosen_soil.plant_id = sc_plant_info.plant_id)
            INNER JOIN sc_soil_info ON sc_choosen_soil.soil_id = sc_soil_info.soil_id) WHERE sc_plant_info.plant_id ='$id'";
    $result = $conn->query($sql);
    

      $response['data'] = array();

      while($row = $result->fetch_array()) {
          $view_soil = array();
          if($row["ph_level"]==null){
              
			    $view_soil["Soil pH"] = "NO DATA";
              
          }else{
			    
			    $view_soil["Soil pH"] = "<u><b>".$row["ph_level"]." soil pH</b></u> and <u><b>".$row["moisture"]." soil moisture</b></u> (".$row["moisture_condition"]." Soil Moisture).<br>";
          }

		 
          array_push($response['data'], $view_soil);
		  
		  

		  
	  }
      
      echo json_encode($response);
      

    $conn->close();
?>