<?php

		include("db/dbconnection.php");
		
		$plant_id = $_POST['plant_id'];
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
		if(!empty($_FILES["file"]["name"]))
		{
			if( in_array($imageFileType,$extensions_arr) )
			{
			 // Upload file
				compressImage($_FILES["file"]["tmp_name"], $target_file, 5);
				
					$query = "SELECT * FROM sc_plant_info WHERE plant_id='".$plant_id."'";
						$result = $conn->query($query);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_array()) {
							$image = $row['plant_picture'];
							$file= '../upload/plant/'.$image;
							unlink($file);
						}
					}
					
					$sql = "UPDATE sc_plant_info SET  plant_name='$plant_name', plant_desc='$plant_desc', plant_type='$plant_type', season_to_plant='$seasons', month_from='$month_from', month_to='$month_to', plant_picture='$newName' where plant_id='$plant_id'";

					if ($conn->query($sql) === TRUE) 
					{
					echo "1";
					} else {
					echo "0";
					}
				

			}else
			{
			  echo "noresult";
			}
		}else
		{
			
				  $sql = "UPDATE sc_plant_info SET  plant_name='$plant_name', plant_desc='$plant_desc', plant_type='$plant_type', season_to_plant='$seasons', month_from='$month_from', month_to='$month_to' where plant_id='$plant_id'";

				if ($conn->query($sql) === TRUE) 
				{
					echo "1";
				}
				else 
				{
					echo "0";
				}
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