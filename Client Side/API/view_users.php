<?php
	
	include("db/dbconnection.php");
    
    $sql = "SELECT * FROM sc_user_acc";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      
      $response['data'] = array();
      // output data of each row
      
      while($row = $result->fetch_array()) {
		  $view_user = array();
		  $view_user["ID"] = $row["user_acc_id"];
          	  $view_user["First Name"] = $row["firstname"];
                  $view_user["Last Name"] = $row["lastname"];
		  $view_user["Username"] = $row["username"];
		  $view_user["Password"] = $row["password"];
		  
		  
          array_push($response['data'], $view_user);

		  
	  }
      
      echo json_encode($response);
      
    } else {
      echo "0 results";
    }
    $conn->close();
?>