<?php

	include("db/dbconnection.php");
	
    if(isset($_POST['soil_quality']) && isset($_POST['ph_level']) && isset($_POST['moisture']) && isset($_POST['moisture_condition'])){

        $soil_quality = $_POST['soil_quality'];
		$ph_level = $_POST['ph_level'];
        $moisture = $_POST['moisture'];
        $moisture_condition = $_POST['moisture_condition'];
        
		
		$sql= "INSERT INTO sc_soil_info (soil_quality, ph_level, moisture, moisture_condition) VALUES ('$soil_quality', '$ph_level', '$moisture', '$moisture_condition')";
		
		if ($conn->query($sql) === TRUE) 
		{
            echo "1";
		}else {
			echo "0";
		}
		
	
        
        $conn->close();
    }
	

?>