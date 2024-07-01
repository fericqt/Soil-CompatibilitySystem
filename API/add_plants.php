<?php
		
		include("db/dbconnection.php");
	
	    
		$plant_picture = $_FILES['file']['name'];
        $plant_name = $_POST['plant_name'];
        $plant_type = $_POST['plant_type'];
		$plant_desc = $_POST['plant_desc'];
		$seasons = $_POST['seasons'];
		$month_from = $_POST['month_from'];
        $month_to = $_POST['month_to'];
        
		  
		  $randomno = rand(0,100000);
		  $renames = 'upload'.$randomno;
		  
		  $newName= $renames.$plant_picture;
		  $target_dir = "../upload/plant/";
		  $target_file = $target_dir . $newName;

		  // Select file type
		  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
		  // Valid file extensions
		  $extensions_arr = array("jpg","jpeg","png","gif");

		  // Check extension
		  if( in_array($imageFileType,$extensions_arr) ){
			 // Upload file
			 compressImage($_FILES["file"]["tmp_name"], $target_file, 20);
				// Insert record
				$sql= "INSERT INTO sc_plant_info (plant_name, plant_desc, plant_type, season_to_plant, month_from, month_to, plant_picture) VALUES ('$plant_name', '$plant_desc', '$plant_type', '$seasons', '$month_from', '$month_to', '$newName')";
		
				if ($conn->query($sql) === TRUE) 
				{
				    $sql1 = "SELECT * FROM sc_suggested_plant WHERE sc_suggested_plant.plant_name='$plant_name'";
		        	$result1 = $conn->query($sql1);
			       if(mysqli_num_rows($result1)>0)
		        	{
				        $sql3 = "UPDATE sc_suggested_plant SET status='APPROVED' WHERE sc_suggested_plant.plant_name = '$plant_name'";
				        if ($conn->query($sql3) === TRUE)
				        {
				            echo "1";
				        }
				        
			        }else{
					echo "1";
			        }
				}
				else 
				{
					echo "0";
				}
			 

		  }
		  else
		  {
			  echo "noresult";
		  }
  
		
		
	
        
        $conn->close();
    
function compressImage($source, $destination, $quality) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($source);
        } elseif ($info['mime'] == 'image/gif') {
            $image = imagecreatefromgif($source);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($source);
        }

        imagejpeg($image, $destination, $quality);

    }	

?>