<?php
		
	date_default_timezone_set("Asia/Singapore");
	$date = date("Y-m-d");
    
    include("db/dbconnection.php");
	
    $sql = "SELECT * FROM sc_community_post WHERE date='$date'";
    
    $result = $conn->query($sql);
	
	$row = mysqli_num_rows($result);
	
	if($row > 0)
	{
	   echo '1';
	}
	else
	{
	    echo '0';
	}
	
?>