<?php
		include("db/dbconnection.php");
		
		if(isset($_POST['soil_id']) && isset($_POST['soil_quality']) && isset($_POST['ph_level']) && isset($_POST['moisture']) && isset($_POST['moisture_condition'])){

			$soil_quality = $_POST['soil_quality'];
			$ph_level = $_POST['ph_level'];
			$moisture = $_POST['moisture'];
			$moisture_condition = $_POST['moisture_condition'];
			$soil_id = $_POST['soil_id'];
		
			$sql = "UPDATE sc_soil_info SET sc_soil_info.soil_quality='$soil_quality', sc_soil_info.ph_level='$ph_level', sc_soil_info.moisture='$moisture', sc_soil_info.moisture_condition='$moisture_condition'  where sc_soil_info.soil_id='$soil_id'";

				if ($conn->query($sql) === TRUE) {
				  echo "1";
				} else {
				  echo "0";
				}
			
			$conn->close();
		}
		
?>