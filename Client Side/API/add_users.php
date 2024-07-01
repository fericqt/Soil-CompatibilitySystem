<?php


	include("db/dbconnection.php");
	
    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['user_name']) && isset($_POST['pwd'])){

        $firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$user_name = $_POST['user_name'];
		$pwd = $_POST['pwd'];


		
		
		if(isset($_POST['user_name']))
		{
			$sql = "SELECT * FROM sc_user_acc WHERE username='".$_POST['user_name']."'";
			$result = $conn->query($sql);
			
			if(mysqli_num_rows($result)>0)
			{
				echo '2';
			}
			else
			{
				$sql1 = "INSERT INTO sc_user_acc (username,password, firstname, lastname) VALUES ('$user_name', '$pwd', '$firstname', '$lastname')";
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