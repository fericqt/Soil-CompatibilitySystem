<?php
    include("db/dbconnection.php");
    
    if(isset($_POST['rate'])){

        $u_rate = $_POST['rate'];
        $u_feedback = $_POST['message'];
        $u_name = $_POST['name'];
		$date = date("Y-m-d");
		
		if($u_rate==0)
		{
		    echo '3';
		}
		else{
				$sql1 = "INSERT INTO sc_user_rating (user_name,rated_score,feedback, date) VALUES ('$u_name','$u_rate','$u_feedback', '$date')";
				if ($conn->query($sql1) === TRUE) 
				{
					echo "1" ;			
			
				} else 
				{
					 echo("Error description: " . $conn -> error);
				}
		}

        
        $conn->close();
    }
	

?>