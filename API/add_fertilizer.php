<?php

	include("db/dbconnection.php");
    if(isset($_POST['product_name']) && isset($_POST['product_details']) && isset($_POST['product_days'])){
		
		$product_name = $_POST['product_name'];
        $product_details = $_POST['product_details'];
		$product_days = $_POST['product_days'];
        
			
			$sql = "INSERT INTO sc_fertilizer_info (fertilizer_name, fertilizer_details, fertilizer_days) VALUES ('$product_name', '$product_details', '$product_days')";
				if ($conn->query($sql) === TRUE) 
				{
					echo "1";
				}else {
					echo "0";
				}
		
	
        
        $conn->close();
    }
	

?>