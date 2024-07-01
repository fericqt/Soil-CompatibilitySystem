<?php 

    $id = (int)$_GET['id']; 
   
    $query = "SELECT *
    FROM sc_plant_info
    WHERE plant_id = '".$id."'";

    $search_result= filterTable($query);
   
    
    while ($row = $search_result->fetch_assoc()) {
		
        $get_plant = $row["plant_id"] . "/" . $row["plant_name"] . "/" . $row["plant_desc"] . "/" . $row["plant_type"] . "/" . $row["season_to_plant"] . "/" . $row["month_from"] . "/" . $row["month_to"] . "/" . $row['plant_picture'];
       
    }
        echo $get_plant;
  
    
    function filterTable($query){
        $connect = mysqli_connect("localhost", "id18018970_sc_db", "Negative098*", "id18018970_soil_compatibility_db");
        $filter_Result = mysqli_query($connect, $query);
        
        return $filter_Result;
    }

?>