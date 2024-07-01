<?php
    include("db/dbconnection.php");
    
    if(isset($_POST['plant_name'])){

        $p_name = $_POST['plant_name'];
        $p_info = $_POST['plant_info'];
		$status = "NEW ADDED";
		$date = date("Y-m-d");

        
        
		
		if(($p_name=="") or (ltrim($p_name, ' ') === ''))
		{
		    echo '3';
		}
		else{
			$sql = "SELECT * FROM sc_suggested_plant,sc_plant_info WHERE sc_plant_info.plant_name='".$_POST['plant_name']."' OR sc_suggested_plant.plant_name='".$_POST['plant_name']."'";
			$result = $conn->query($sql);
			
			if(mysqli_num_rows($result)>0)
			{
				echo '2';
			}
			else
			{
				$sql1 = "INSERT INTO sc_suggested_plant (plant_name,plant_info,status, date_added) VALUES ('$p_name','$p_info', '$status', '$date')";
				if ($conn->query($sql1) === TRUE) 
				{
					echo "1" ;			
			
				} else 
				{
					echo "0";
				}
			}

        }
        $conn->close();
    }
	

?>