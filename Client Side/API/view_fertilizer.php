<?php
	
	include("db/dbconnection.php");
    
    $sql = "SELECT * FROM sc_fertilizer_info";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      
      $response['data'] = array();
      // output data of each row
      
      while($row = $result->fetch_array()) {
		  $view_fertilizer = array();
		  $view_fertilizer["ID"] = $row["fertilizer_id"];
          $view_fertilizer["Product Name"] = $row["fertilizer_name"];
          $view_fertilizer["Product Details"] = $row["fertilizer_details"];
           $view_fertilizer["Days"] = $row["fertilizer_days"];
		  
		  
          array_push($response['data'], $view_fertilizer);

		  
	  }
      
      echo json_encode($response);
      
    } else {
      echo "0 results";
    }
    $conn->close();
?>