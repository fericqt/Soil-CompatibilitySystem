<?php

	include("db/dbconnection.php");
	
    if(isset($_POST['selected_soil']) && isset($_POST['selected_plant'])){

        $selected_soil = $_POST['selected_soil'];
        $selected_plant = $_POST['selected_plant'];
        
       
		
	
        if(isset($_POST['selected_plant']))
		{
			$sql = "SELECT * FROM sc_choosen_soil WHERE soil_id = '".$_POST['selected_soil']."' and plant_id='".$_POST['selected_plant']."'";
			$result = $conn->query($sql);
			
			if(mysqli_num_rows($result)>0)
			{
				echo '2';
			}
			else
			{
				$sql1 = "INSERT INTO sc_choosen_soil (soil_id, plant_id) VALUES ('$selected_soil', '$selected_plant')";
				if ($conn->query($sql1) === TRUE) 
				{
					echo "1" ;			
						
				}else 
				{
					echo "0";
				}
				
			}

        }
        $conn->close();
    }
	

?>