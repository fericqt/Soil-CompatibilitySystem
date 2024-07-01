<?php
	
	include("db/dbconnection.php");

	    $id = (int)$_GET['id'];   
		
    $sql = "SELECT * FROM sc_fertilizer_info, sc_choosen_fertilizer where sc_choosen_fertilizer.plant_id='$id' and sc_fertilizer_info.fertilizer_id=sc_choosen_fertilizer.fertilizer_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      
      $response['data'] = array();
      // output data of each row
      
      while($row = $result->fetch_array()) {

			$view_fertilizer = array();
			$view_fertilizer["ID"] = $row["fertilizer_id"];
			$view_fertilizer["Product Name"] = $row["fertilizer_name"];
			$view_fertilizer["Product Details"] = $row["fertilizer_details"];
		  
		  
          array_push($response['data'], $view_fertilizer);
		  
		  

		  
	  }
      
      echo json_encode($response);
      
    } else {
      echo "0";
    }
    $conn->close();
?>