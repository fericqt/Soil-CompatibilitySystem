<?php 

    $id = (int)$_GET['id']; 
   
    $query = "SELECT *
    FROM sc_soil_info
    WHERE sc_soil_info.soil_id = '".$id."'";

    $search_result= filterTable($query);
   
    
    while ($row = $search_result->fetch_assoc()) {
      
       
        $get_soil = $row["soil_id"] . "/" . $row["soil_quality"] . "/" . $row["ph_level"] . "/" . $row["moisture"]. "/" . $row["moisture_condition"];
       
    }
        echo $get_soil;
  
    
    function filterTable($query){
        $connect = mysqli_connect("localhost", "id18018970_sc_db", "Negative098*", "id18018970_soil_compatibility_db");
        $filter_Result = mysqli_query($connect, $query);
        
        return $filter_Result;
    }

?>