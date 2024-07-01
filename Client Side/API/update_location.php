<?php
		include("db/dbconnection.php");
		
		if(isset($_POST['location_id']) && isset($_POST['add_city']) && isset($_POST['add_barangay']) && isset($_POST['add_purok']) && isset($_POST['add_latitude']) && isset($_POST['add_longitude'])){
	
			$location_id = $_POST['location_id'];
			$add_city = $_POST['add_city'];
			$add_barangay = $_POST['add_barangay'];
			$add_purok = $_POST['add_purok'];
			$add_latitude = $_POST['add_latitude'];
			$add_longitude = $_POST['add_longitude'];
		
			$sql = "UPDATE sc_locations SET city_name='$add_city', brgy_name='$add_barangay', purok='$add_purok', lattitude='$add_latitude', longitude='$add_longitude' where id='$location_id'";

				if ($conn->query($sql) === TRUE) {
				  echo "1";
				} else {
				  echo "0";
				}
			
			$conn->close();
		}
		
		
		
?>