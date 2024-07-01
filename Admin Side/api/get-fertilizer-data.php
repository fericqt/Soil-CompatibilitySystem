<?php 

    $id = (int)$_GET['id']; 
   
    $query = "SELECT *
    FROM sc_fertilizer_info
    WHERE fertilizer_id = '".$id."'";

    $search_result= filterTable($query);
   
    
    while ($row = $search_result->fetch_assoc()) {
      
       
        $get_fertilizer = $row["fertilizer_id"] . "/" . $row["fertilizer_name"] . "/" . $row["fertilizer_details"] . "/" . $row["fertilizer_days"];
       
    }
        echo $get_fertilizer;
  
    
    function filterTable($query){
        $connect = mysqli_connect("localhost", "id18018970_sc_db", "Negative098*", "id18018970_soil_compatibility_db");
        $filter_Result = mysqli_query($connect, $query);
        
        return $filter_Result;
    }

?>