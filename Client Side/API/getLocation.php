<?php
    header('Access-Control-Allow-Origin: *');
?>
<?php 
	
    $id = $_GET['id'];
   
    $query = "SELECT * FROM sc_locations,sc_soil_info 
              WHERE sc_locations.soil_id = sc_soil_info.soil_id 
              AND sc_locations.brgy_name = '$id'";

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
    
       
    }

    print json_encode($coordinates1);

  
    
    function filterTable($query){
        $connect = mysqli_connect("localhost", "id18018970_sc_db", "Negative098*", "id18018970_soil_compatibility_db");
        $filter_Result = mysqli_query($connect, $query);
        
        return $filter_Result;
    }

?>