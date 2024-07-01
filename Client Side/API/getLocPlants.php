<?php
    header('Access-Control-Allow-Origin: *');
?>
<?php 
	
    $id = $_GET['id'];
   
    $query = "SELECT plant_name,brgy_name,lattitude,longitude,purok,ph_level,moisture,moisture_condition,soil_quality FROM sc_locations,sc_soil_info,sc_choosen_soil,sc_plant_info 
              WHERE sc_locations.soil_id = sc_soil_info.soil_id 
              AND sc_choosen_soil.soil_id = sc_soil_info.soil_id
              AND sc_choosen_soil.plant_id = sc_plant_info.plant_id
              ANd sc_plant_info.plant_name = '$id'";

    $search_result= filterTable($query);
    
    $coordinates1 = array();
    
    while ($r = $search_result->fetch_assoc()) {
     
       $coordinates1[] =$r;
       $brgy[] = $r["brgy_name"];
       $lat[] = $r["lattitude"]; 
	   $lng[] = $r["longitude"];
	   $prk[] = $r["purok"];
	   $ph[] = $r["ph_level"];
	   $moi[] = $r["moisture"];
	   $moiCat[] = $r["soil_quality"];
	   $phCat[] = $r["moisture_condition"];
	   $plnt[] = $r["plant_name"];
    
       
    }

    print json_encode($coordinates1);

  
    
    function filterTable($query){
        $connect = mysqli_connect("localhost", "id18018970_sc_db", "Negative098*", "id18018970_soil_compatibility_db");
        $filter_Result = mysqli_query($connect, $query);
        
        return $filter_Result;
    }

?>