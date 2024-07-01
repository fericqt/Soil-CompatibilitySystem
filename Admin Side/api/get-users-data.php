<?php 
     header('Access-Control-Allow-Origin: *');
    $id = (int)$_GET['id']; 
   
    $query = "SELECT *
    FROM sc_user_acc
    WHERE user_acc_id = '".$id."'";

    $search_result= filterTable($query);
   
    
    while ($row = $search_result->fetch_assoc()) {
      
       
        $get_user = $row["user_acc_id"] . "/" . $row["firstname"] . "/" . $row["lastname"] . "/" . $row["username"] . "/" . $row["password"];
       
    }
        echo $get_user;
  
    
    function filterTable($query){
        $connect = mysqli_connect("localhost", "id18018970_sc_db", "Negative098*", "id18018970_soil_compatibility_db");
        $filter_Result = mysqli_query($connect, $query);
        
        return $filter_Result;
    }

?>