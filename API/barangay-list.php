<?php
	
	include("db/dbconnection.php");
	
	$id = $_GET['id'];
		
    $sql = "SELECT DISTINCT brgy_name FROM sc_locations WHERE city_name = '$id' ORDER BY brgy_name";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      
      $response = array();
      // output data of each row
      
      while($row = $result->fetch_array()) {
		$view_plants = array();
		$view_plants = $row["brgy_name"];
        array_push($response, $view_plants);
	  }
      
      echo json_encode($response);
      
    } else {
      echo "0 results";
    }
    $conn->close();
?>