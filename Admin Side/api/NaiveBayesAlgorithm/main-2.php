<?php

    require_once('NaiveBayesClassifier.php');
    date_default_timezone_set('Asia/Singapore');
    include("db_connect.php");
    
if(isset($_POST['soilPH']) && isset($_POST['soilMoisture'])){
    
    $classifier = new NaiveBayesClassifier();
    $comp = Category::$Compatible;
    $notComp = Category::$notCompatible;
    $soilPH = $_POST['soilPH'];
    $soilMO = $_POST['soilMoisture'];
	$plantID = $_POST['plantID'];
	$plantNAME ="";
	$id = $_POST['uid'];
	$activity = "Soil pH & Moisture Testing";
	$date = date("Y-m-d");
	$time = date('h:i A');

	
    $sql = "SELECT * FROM sc_plant_info WHERE plant_id='$plantID'";
    
    $result1 = $conn->query($sql);
	
    if ($result1->num_rows > 0) {
        while($row = $result1->fetch_array()) {
             $plantNAME = $row['plant_name'];
        }
    }
	$plant = $plantNAME;
	
	if($plant == "Grapes"){
	
	//not compatible soil ph for grapes
    $classifier -> trainGrapes($plant,'3.0', $notComp);
    $classifier -> trainGrapes($plant,'3.1', $notComp);
    $classifier -> trainGrapes($plant,'3.2', $notComp);
    $classifier -> trainGrapes($plant,'3.3', $notComp);
    $classifier -> trainGrapes($plant,'3.4', $notComp);
    $classifier -> trainGrapes($plant,'3.5', $notComp);
    $classifier -> trainGrapes($plant,'3.6', $notComp);
    $classifier -> trainGrapes($plant,'3.7', $notComp);
    $classifier -> trainGrapes($plant,'3.8', $notComp);
    $classifier -> trainGrapes($plant,'3.9', $notComp);
    $classifier -> trainGrapes($plant,'4.0', $notComp);
    $classifier -> trainGrapes($plant,'4.1', $notComp);
    $classifier -> trainGrapes($plant,'4.2', $notComp);
    $classifier -> trainGrapes($plant,'4.3', $notComp);
    $classifier -> trainGrapes($plant,'4.4', $notComp);
    $classifier -> trainGrapes($plant,'4.5', $notComp);
    $classifier -> trainGrapes($plant,'4.6', $notComp);
    $classifier -> trainGrapes($plant,'4.7', $notComp);
    $classifier -> trainGrapes($plant,'4.8', $notComp);
    $classifier -> trainGrapes($plant,'4.9', $notComp);
    $classifier -> trainGrapes($plant,'5.0', $notComp);
	$classifier -> trainGrapes($plant,'5.1', $notComp);
	$classifier -> trainGrapes($plant,'5.2', $notComp);
	$classifier -> trainGrapes($plant,'5.3', $notComp);
	$classifier -> trainGrapes($plant,'5.4', $notComp);	
    $classifier -> trainGrapes($plant,'5.5', $notComp);
    $classifier -> trainGrapes($plant,'5.6', $notComp);
    $classifier -> trainGrapes($plant,'5.7', $notComp);
    $classifier -> trainGrapes($plant,'5.8', $notComp);
    $classifier -> trainGrapes($plant,'5.9', $notComp);
    $classifier -> trainGrapes($plant,'6.5', $notComp);
    $classifier -> trainGrapes($plant,'5.9', $notComp);
    $classifier -> trainGrapes($plant,'6.5', $notComp);
    $classifier -> trainGrapes($plant,'5.9', $notComp);
	$classifier -> trainGrapes($plant,'7.1', $notComp);
	$classifier -> trainGrapes($plant,'7.2', $notComp);
	$classifier -> trainGrapes($plant,'7.3', $notComp);
	$classifier -> trainGrapes($plant,'7.4', $notComp);
	$classifier -> trainGrapes($plant,'7.5', $notComp);
	$classifier -> trainGrapes($plant,'7.6', $notComp);
	$classifier -> trainGrapes($plant,'7.7', $notComp);
	$classifier -> trainGrapes($plant,'7.8', $notComp);
	$classifier -> trainGrapes($plant,'7.9', $notComp);
	$classifier -> trainGrapes($plant,'8.0', $notComp);
    //Compatible soil ph for grapes
    $classifier -> trainGrapes($plant,'6.0', $comp);
    $classifier -> trainGrapes($plant,'6.1', $comp);
	$classifier -> trainGrapes($plant,'6.2', $comp);
    $classifier -> trainGrapes($plant,'6.3', $comp);
    $classifier -> trainGrapes($plant,'6.4', $comp);
    $classifier -> trainGrapes($plant,'6.5', $comp);
	$classifier -> trainGrapes($plant,'6.6', $comp);
	$classifier -> trainGrapes($plant,'6.7', $comp);
	$classifier -> trainGrapes($plant,'6.8', $comp);
	$classifier -> trainGrapes($plant,'6.9', $comp);
	$classifier -> trainGrapes($plant,'7.0', $comp);

	
	}else if($plant == "Strawberry"){
		
		//Not Compatible Soil pH for Strawberry
		$classifier -> trainStrawberry($plant,'6.3', $notComp);
		$classifier -> trainStrawberry($plant,'6.4', $notComp);
		$classifier -> trainStrawberry($plant,'6.5', $notComp);
		$classifier -> trainStrawberry($plant,'5.4', $notComp);
		$classifier -> trainStrawberry($plant,'5.5', $notComp);
		$classifier -> trainStrawberry($plant,'5.6', $notComp);
		$classifier -> trainStrawberry($plant,'5.7', $notComp);
		$classifier -> trainStrawberry($plant,'5.8', $notComp);
		$classifier -> trainStrawberry($plant,'5.9', $notComp);
		$classifier -> trainStrawberry($plant,'3.0', $notComp);
		$classifier -> trainStrawberry($plant,'3.1', $notComp);
		$classifier -> trainStrawberry($plant,'3.2', $notComp);
		$classifier -> trainStrawberry($plant,'3.3', $notComp);
		$classifier -> trainStrawberry($plant,'3.4', $notComp);
		$classifier -> trainStrawberry($plant,'3.5', $notComp);
		$classifier -> trainStrawberry($plant,'3.6', $notComp);
		$classifier -> trainStrawberry($plant,'3.7', $notComp);
		$classifier -> trainStrawberry($plant,'3.8', $notComp);
		$classifier -> trainStrawberry($plant,'3.9', $notComp);
		$classifier -> trainStrawberry($plant,'4.0', $notComp);
		$classifier -> trainStrawberry($plant,'4.1', $notComp);
		$classifier -> trainStrawberry($plant,'4.2', $notComp);
		$classifier -> trainStrawberry($plant,'4.3', $notComp);
		$classifier -> trainStrawberry($plant,'4.4', $notComp);
		$classifier -> trainStrawberry($plant,'4.5', $notComp);
		$classifier -> trainStrawberry($plant,'4.6', $notComp);
		$classifier -> trainStrawberry($plant,'4.7', $notComp);
		$classifier -> trainStrawberry($plant,'4.8', $notComp);
		$classifier -> trainStrawberry($plant,'4.9', $notComp);
		$classifier -> trainStrawberry($plant,'5.0', $notComp);
		$classifier -> trainStrawberry($plant,'5.1', $notComp);
		$classifier -> trainStrawberry($plant,'5.2', $notComp);
		$classifier -> trainStrawberry($plant,'5.3', $notComp);
		$classifier -> trainStrawberry($plant,'6.6', $notComp);
		$classifier -> trainStrawberry($plant,'6.7', $notComp);
		$classifier -> trainStrawberry($plant,'6.8', $notComp);
		$classifier -> trainStrawberry($plant,'6.9', $notComp);
		$classifier -> trainStrawberry($plant,'7.0', $notComp);
		$classifier -> trainStrawberry($plant,'7.1', $notComp);
		$classifier -> trainStrawberry($plant,'7.2', $notComp);
		$classifier -> trainStrawberry($plant,'7.3', $notComp);
		$classifier -> trainStrawberry($plant,'7.4', $notComp);
		$classifier -> trainStrawberry($plant,'7.5', $notComp);
		$classifier -> trainStrawberry($plant,'7.6', $notComp);
		$classifier -> trainStrawberry($plant,'7.7', $notComp);
		$classifier -> trainStrawberry($plant,'7.8', $notComp);
		$classifier -> trainStrawberry($plant,'7.9', $notComp);
		$classifier -> trainStrawberry($plant,'8.0', $notComp);
		//Compatible Soil pH for Stawberry
		$classifier -> trainStrawberry($plant,'6.0', $comp);
		$classifier -> trainStrawberry($plant,'6.1', $comp);
		$classifier -> trainStrawberry($plant,'6.2', $comp);
	}
	
	if($soilPH < 4.5 ){
	    
	    $category = "Extremely Acid";
	    
	}else if($soilPH >= 4.5 && $soilPH <= 5.0){
	    
	    $category = "Very Strongly Acid";
	    
	}else if($soilPH >= 5.1 && $soilPH <= 5.5){
	    
	    $category = "Strongly Acid";
	    
	}
	else if($soilPH >= 5.6 && $soilPH <= 6.0){
	    
	    $category = "Moderately Acid";
	    
	}
	else if($soilPH >= 6.1 && $soilPH <= 6.5){
	    
	    $category = "Slightly Acid";
	    
	}
	else if($soilPH >= 6.6 && $soilPH <= 7.3){
	    
	    $category = "Neutral";
	    
	}
	else if($soilPH >= 7.4 && $soilPH <= 8.0){
	    
	    $category = "Alkaline";
	    
	}


	$phLevel = strval($soilPH);
		
	$categoryResult = $classifier -> classify($phLevel,$plant);
    
    if($soilMO <= 3)
    {
        $categoryResult = "Not Compatible";
    }
    
	$sql1 = "INSERT INTO sc_latest_activity (id,plant_name,activity,soil_ph_value,soil_moisture_value,soil_ph_category,result, date, time) VALUES ('$id','$plantNAME','$activity','$soilPH','$soilMO','$category', '$categoryResult', '$date','$time')";
		if ($conn->query($sql1) === TRUE) 
		{
		    
			echo "1";
			
		} else {
			echo "0";
		}
		
        $conn->close();
    }

	
?>
