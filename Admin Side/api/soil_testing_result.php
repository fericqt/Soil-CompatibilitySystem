<?php 
	
    header('Access-Control-Allow-Origin: *');
    
     $id = $_GET['id']; 
    
   $query = "SELECT * FROM sc_latest_activity WHERE id = '$id'";

    $search_result= filterTable($query);
   
    
    while ($row = $search_result->fetch_assoc()) {
      
       $result = 
              $row["id"] . 
		"/" . $row["plant_name"] . 
		"/" . $row["activity"] .
		"/" . $row["soil_ph_value"] .
		"/" . $row["soil_moisture_value"] .
		"/" . $row["soil_ph_category"] .
		"/" . $row["result"] .
		"/" . $row["date"] .
		"/" . $row["time"];
        
       
    }
        echo $result;
  
    
    function filterTable($query){
        $connect = mysqli_connect("localhost", "id18018970_sc_db", "Negative098*", "id18018970_soil_compatibility_db");
        $filter_Result = mysqli_query($connect, $query);
        
        return $filter_Result;
    }

?>