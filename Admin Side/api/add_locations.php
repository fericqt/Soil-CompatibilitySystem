<?php
    include("db/dbconnection.php");
    
    if(isset($_POST['soil_id']) && isset($_POST['add_city']) && isset($_POST['add_barangay']) && isset($_POST['add_purok']) && isset($_POST['add_latitude']) && isset($_POST['add_longitude'])){

        $soil_id = $_POST['soil_id'];
        $add_city = $_POST['add_city'];
		$add_barangay = $_POST['add_barangay'];
        $add_purok = $_POST['add_purok'];
		$add_latitude = $_POST['add_latitude'];
        $add_longitude = $_POST['add_longitude'];
        
		
	
		
	    if(isset($_POST['add_latitude']) && isset($_POST['add_longitude'])&& isset($_POST['soil_id']))
		{
			$sql = "SELECT * FROM sc_locations WHERE lattitude='".$_POST['add_latitude']."'AND longitude='".$_POST['add_longitude']."' AND soil_id='".$_POST['soil_id']."' ";
			$result = $conn->query($sql);
			
			if(mysqli_num_rows($result)>0)
			{
				echo '2';
			}
			else
			{
				$sql= "INSERT INTO sc_locations (soil_id , city_name, brgy_name, purok, lattitude, longitude) VALUES ('$soil_id', '$add_city', '$add_barangay', '$add_purok', '$add_latitude', '$add_longitude')";
		
        		if ($conn->query($sql) === TRUE) 
        		{
        			echo "1";
        			
        		}else 
        		{
        			echo "0";
        		}
			}

        }
        
        $conn->close();
    }
	

?>