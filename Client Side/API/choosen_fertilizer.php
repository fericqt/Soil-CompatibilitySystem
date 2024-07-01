<?php

	include("db/dbconnection.php");
	
    if(isset($_POST['selected_plant']) && isset($_POST['selected_fertilizer'])){
        
        $selected_plant = $_POST['selected_plant'];
        $selected_fertilizer = $_POST['selected_fertilizer'];
    
        if(isset($_POST['selected_plant']))
		{
			$sql = "SELECT * FROM sc_choosen_fertilizer WHERE plant_id = '".$_POST['selected_plant']."' and fertilizer_id='".$_POST['selected_fertilizer']."'";
			$result = $conn->query($sql);
			
			if(mysqli_num_rows($result)>0)
			{
				echo '2';
			}
			else
			{
				$sql1 = "INSERT INTO sc_choosen_fertilizer (plant_id, fertilizer_id) VALUES ('$selected_plant', '$selected_fertilizer')";
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