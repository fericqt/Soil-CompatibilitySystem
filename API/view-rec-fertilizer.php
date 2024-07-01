<?php
	
	include("db/dbconnection.php");

	$id = (int)$_GET['id'];   
		
    $sql = "SELECT *
            FROM ((sc_choosen_fertilizer
            INNER JOIN sc_plant_info ON sc_choosen_fertilizer.plant_id = sc_plant_info.plant_id)
            INNER JOIN sc_fertilizer_info ON sc_choosen_fertilizer.fertilizer_id = sc_fertilizer_info.fertilizer_id) WHERE sc_plant_info.plant_id ='$id'";
    $result = $conn->query($sql);
    
      
      $response['data'] = array();
      while($row = $result->fetch_array()) {

			$view_fer = array();
			if($row["fertilizer_name"]==null){
			    $view_fer["Name"] = "NO DATA";
			}else{
			
			    $view_fer["Name"] = "<u><b>".$row["fertilizer_name"]."</b></u> - ".$row["fertilizer_details"]." Apply the fertilizer after ".$row["fertilizer_days"].".<br>";
			}
		  
          array_push($response['data'], $view_fer);
		  
		  

		  
      }
      
     echo json_encode($response);
      

    $conn->close();
?>