<?php

	include("db/dbconnection.php");
	
    if(isset($_POST['product_name']) && isset($_POST['product_name']) && isset($_POST['product_details']) && isset($_POST['product_days'])){
		
		$fertilizer_id = $_POST['fertilizer_id'];
		$product_name = $_POST['product_name'];
        $product_details = $_POST['product_details'];
		$product_days = $_POST['product_days'];
        
        
        

			
			$sql = "UPDATE sc_fertilizer_info SET  fertilizer_name='$product_name', fertilizer_details='$product_details', fertilizer_days='$product_days' where fertilizer_id='$fertilizer_id'";
				
				if ($conn->query($sql) === TRUE) 
				{
					echo "1";
				}
				else 
				{
					echo "0";
				}
	
        
        $conn->close();
    }
	

?>