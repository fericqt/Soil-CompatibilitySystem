
<?php 

   
    $query = "SELECT AVG(rated_score) AS avg_score FROM sc_user_rating";

    $search_result= filterTable($query);
   
    
    while ($row = $search_result->fetch_assoc()) {
      
       
        $avg_score = $row["avg_score"];
       
    }
		echo number_format ($avg_score, 2);
  
    
    function filterTable($query){
        $connect = mysqli_connect("localhost", "id18018970_sc_db", "Negative098*", "id18018970_soil_compatibility_db");
        $filter_Result = mysqli_query($connect, $query);
        
        return $filter_Result;
    }

?>