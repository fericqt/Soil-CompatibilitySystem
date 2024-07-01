<?php

    include('db/dbconnection.php');
    
    $id = $_GET['id'];
    $la = 0;
    
    $sql = "SELECT * FROM sc_locations WHERE brgy_name='$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      
      while($row = $result->fetch_array()) {
		  $la = $row["lattitude"];
	  }
      
      echo $la;
      
    } else {
      echo "0 results";
    }
    $conn->close();
?>