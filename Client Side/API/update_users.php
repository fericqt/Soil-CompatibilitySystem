<?php
		include("db/dbconnection.php");
		
		if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['user_name']) && isset($_POST['pwd']) && isset($_POST['user_id'])){
	
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$user_name = $_POST['user_name'];
			$pwd = $_POST['pwd'];
			$user_id = $_POST['user_id'];
		
			$sql = "UPDATE sc_user_acc SET firstname='$firstname', lastname='$lastname', username='$user_name', password='$pwd' where user_acc_id='$user_id'";

				if ($conn->query($sql) === TRUE) {
				  echo "1";
				} else {
				  echo "0";
				}
			
			$conn->close();
		}
		
		
		
?>