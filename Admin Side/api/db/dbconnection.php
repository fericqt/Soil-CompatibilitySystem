<?php
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
		
		$servername="localhost";
		$username="id18018970_sc_db";
		$password="Negative098*";
		$database="id18018970_soil_compatibility_db";
		
		//Create connection
		
		$conn=mysqli_connect($servername, $username, $password, $database);
		
		//Check connection
		
		if(!$conn){
			die("Connection failed!". mysqli_connect_error());
		}
?>