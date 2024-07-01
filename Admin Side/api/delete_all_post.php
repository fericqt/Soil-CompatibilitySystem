<?php

    include("db/dbconnection.php");
	
	$sql = "DELETE FROM sc_community_post";
    
    if ($conn->query($sql) === TRUE) {
		echo "<div color='green'>All post has been deleted successfully</div>";
	}
	else {
		echo "Error deleting record: " . $conn->error;
	}
    
    
    $conn->close();
?>