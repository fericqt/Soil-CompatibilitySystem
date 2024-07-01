<?php 

    $user_name = $_GET['id']; 
   
    $query = "SELECT *
    FROM sc_user_acc
    WHERE username = '".$user_name."'";

    $search_result= filterTable($query);
	
    
    while ($row = $search_result->fetch_assoc()) {
		
        $get_username = $row["firstname"]. " " . $row["lastname"];
       
    }
        echo $get_username;
  
    
    function filterTable($query){
        $connect = mysqli_connect("localhost", "id18018970_sc_db", "Negative098*", "id18018970_soil_compatibility_db");
        $filter_Result = mysqli_query($connect, $query);
        
        return $filter_Result;
    }

?>