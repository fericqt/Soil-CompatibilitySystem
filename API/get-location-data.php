<?php 

    $id = (int)$_GET['id']; 
   
    $query = "SELECT *
    FROM sc_locations
    WHERE sc_locations.id = '".$id."'";

    $search_result= filterTable($query);
   
    
    while ($row = $search_result->fetch_assoc()) {
      
       
        $get_location = $row["id"] . "/" . $row["city_name"] . "/" . $row["brgy_name"] . "/" . $row["purok"]. "/" . $row["lattitude"] . "/" . $row["longitude"]. "/" . $row["soil_id"];
       
    }
        echo $get_location;
  
    
    function filterTable($query){
        $connect = mysqli_connect("localhost", "id18018970_sc_db", "Negative098*", "id18018970_soil_compatibility_db");
        $filter_Result = mysqli_query($connect, $query);
        
        return $filter_Result;
    }

?>