<?php
	
	include("db/dbconnection.php");

	// get today's date
	// get the season dates
	date_default_timezone_set('Asia/Singapore');
	$currentSeason="";
    $today = new DateTime();
    $spring = new DateTime('March 20');
    $summer = new DateTime('June 20');
    $automn = new DateTime('September 20');
    $winter = new DateTime('December 20');

    switch(true) {
        case $today >= $spring && $today < $summer:
            $currentSeason="Spring Season";
            break;

        case $today >= $summer && $today < $automn:
            $currentSeason="Summer Season";
            break;

        case $today >= $automn && $today < $winter:
            $currentSeason="Autumn Season";
            break;

        default:
            $currentSeason="Winter Season";
    }
	 
		
    $sql = "SELECT * FROM sc_plant_info WHERE season_to_plant = '$currentSeason'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      
      $response['data'] = array();
      // output data of each row
      
      while($row = $result->fetch_array()) {

			$plant = array();
			$plant["Plant"] = "• ".$row["plant_name"];

          array_push($response['data'], $plant);
		  
		  

		  
	  }
      
      echo json_encode($response);
      
    } else {
      echo "0";
    }
    $conn->close();
?>