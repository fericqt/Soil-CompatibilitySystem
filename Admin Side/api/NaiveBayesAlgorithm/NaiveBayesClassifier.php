<?php


    require_once('Category.php');

	
    class NaiveBayesClassifier {
	
		

    	public function __construct() {
    	    
    	}
    	public function classify($phLevel,$plant) {
            
    
            
    		$keywordsArray = $this -> tokenize($phLevel);
			if($plant == "Grapes"){
				$category = $this -> decideGrapes($keywordsArray);
			}else if($plant == "Strawberry"){
				$category = $this -> decideStrawberry($keywordsArray);
			}

    		return $category;


    	}
    	public function trainGrapes($plant, $soilph, $category) {
    		$comp = Category::$Compatible;
    		$notComp = Category::$notCompatible;

    		if ($category == $comp || $category == $notComp) {
           
				require 'db_connect.php';
				
				$sql = "SELECT * FROM sc_plant_training_set WHERE soil_ph='$soilph' AND plant = '$plant'";
                $result = $conn->query($sql);
	            $row = mysqli_num_rows($result);
	            
            	if($row <= 0){
	                $sql = mysqli_query($conn, "INSERT into sc_plant_training_set (plant, soil_ph, category) values('$plant', '$soilph', '$category')");
	            }
	            
	    	    $keywordsArray = $this -> tokenize($soilph);
	    	    foreach ($keywordsArray as $phLevel) {

	    	    	$sql = mysqli_query($conn, "SELECT count(*) as total FROM sc_plant_training_set_frequency WHERE soil_ph = '$phLevel' and category= '$category' and plant = 'Grapes'");
	    	    	$count = mysqli_fetch_assoc($sql);
					
					
	    	    	if ($count['total'] == 0) {
	    	    		$sql = mysqli_query($conn, "INSERT into sc_plant_training_set_frequency (plant, soil_ph, category, count) values('$plant', '$phLevel', '$category', 1)");
	    	    	} else {
	    	    		$sql = mysqli_query($conn, "UPDATE sc_plant_training_set_frequency set count = count + 1 where soil_ph = '$phLevel' and plant = '$plant'");
	    	    	}
	    	    }
	    	    $conn -> close();

    		} else {
    			throw new Exception('Unknown category. Valid categories are: $notComp, $comp');
    		}
    	}
		
    	public function trainStrawberry($plant, $soilph, $category) {
    		$comp = Category::$Compatible;
    		$notComp = Category::$notCompatible;

    		if ($category == $comp || $category == $notComp) {
				
				require 'db_connect.php';
				$sql = "SELECT * FROM sc_plant_training_set WHERE soil_ph='$soilph' AND plant = '$plant'";
                $result = $conn->query($sql);
	            $row = mysqli_num_rows($result);
	            
            	if($row <= 0){
	                $sql = mysqli_query($conn, "INSERT into sc_plant_training_set (plant, soil_ph, category) values('$plant', '$soilph', '$category')");
	            }

	    	    $keywordsArray = $this -> tokenize($soilph);
	    	    foreach ($keywordsArray as $phLevel) {

	    	    	$sql = mysqli_query($conn, "SELECT count(*) as total FROM sc_plant_training_set_frequency WHERE soil_ph = '$phLevel' and category= '$category' and plant = '$plant' ");
	    	    	$count = mysqli_fetch_assoc($sql);
					
					
	    	    	if ($count['total'] == 0) {
	    	    		$sql = mysqli_query($conn, "INSERT into sc_plant_training_set_frequency (plant, soil_ph, category, count) values('$plant', '$phLevel', '$category', 1)");
	    	    	} else {
	    	    		$sql = mysqli_query($conn, "UPDATE sc_plant_training_set_frequency set count = count + 1 where soil_ph = '$phLevel' and plant = '$plant'");
	    	    	}
	    	    }
	    	    $conn -> close();

    		} else {
    			throw new Exception('Unknown category. Valid categories are: $notComp, $comp');
    		}
    	}

    	private function tokenize($phLevel) {

	        $stopWords = array('');


	    	$phLevel = strtolower($phLevel);

	    	$keywordsArray = array();
			
	    	$token =  strtok($phLevel, " ");
	    	while ($token !== false) {

	    		if (!(strlen($token) <= 2)) {

	    			if (!(in_array($token, $stopWords))) {
	    				array_push($keywordsArray, $token);
	    			}
	    		}
		    	$token = strtok(" ");
	    	}
	    	return $keywordsArray;
    	}

    	private function decideGrapes($keywordsArray) {
    		$comp = Category::$Compatible;
    		$notComp = Category::$notCompatible;
    		$category = $notComp;
    	    require 'db_connect.php';
            
    		$sql = mysqli_query($conn, "SELECT count(*) as total FROM sc_plant_training_set WHERE plant = 'Grapes' and category = '$comp' ");
    		$compCount = mysqli_fetch_assoc($sql);
    		$compCount = $compCount['total'];

    		$sql = mysqli_query($conn, "SELECT count(*) as total FROM sc_plant_training_set WHERE plant = 'Grapes' and category = '$notComp' ");
    		$notCompCount = mysqli_fetch_assoc($sql);
    		$notCompCount = $notCompCount['total'];

    		$sql = mysqli_query($conn, "SELECT count(*) as total FROM sc_plant_training_set WHERE plant = 'Grapes' ");
    		$totalCount = mysqli_fetch_assoc($sql);
    		$totalCount = $totalCount['total'];

    		$pComp = $compCount / $totalCount;

    		$pNotComp = $notCompCount / $totalCount; 
    		
            $sql = mysqli_query($conn, "SELECT count(*) as total FROM sc_plant_training_set_frequency WHERE plant = 'Grapes' ");
    		$distinct = mysqli_fetch_assoc($sql);
    		$distinct = $distinct['total'];

    		$CompatibleToPlant = log($pComp);
    		foreach ($keywordsArray as $phLevel) {
    			$sql = mysqli_query($conn, "SELECT count as total FROM sc_plant_training_set_frequency where soil_ph = '$phLevel' and category = '$comp' and plant = 'Grapes'");
    			$Count = mysqli_fetch_assoc($sql);
    			$Count = $Count['total'];
    			$CompatibleToPlant += log(($Count + 1) / ($compCount + $distinct));
    		}

    		$NotCompatibleToPlant = log($pNotComp);
    		foreach ($keywordsArray as $phLevel) {
    			$sql = mysqli_query($conn, "SELECT count as total FROM sc_plant_training_set_frequency WHERE soil_ph = '$phLevel' and category = '$notComp' and plant = 'Grapes' ");
    			$Count = mysqli_fetch_assoc($sql);
    			$Count = isset($Count['total']);
    			$NotCompatibleToPlant += log(($Count + 1) / ($notCompCount + $distinct));
    		}
    		if ($NotCompatibleToPlant >= $CompatibleToPlant) {			

    			 $category = $notComp;

    		} else {

    			 $category = $comp;

    		}
    		

    		
    		$conn -> close();

    		return $category;

    	}
    	private function decideStrawberry ($keywordsArray) {
    		$comp = Category::$Compatible;
    		$notComp = Category::$notCompatible;
            
    		$category = $notComp;
    		
    	    require 'db_connect.php';

    		$sql = mysqli_query($conn, "SELECT count(*) as total FROM sc_plant_training_set WHERE plant = 'Strawberry' and category = '$comp' ");
    		$compCount = mysqli_fetch_assoc($sql);
    		$compCount = $compCount['total'];

    		$sql = mysqli_query($conn, "SELECT count(*) as total FROM sc_plant_training_set WHERE plant = 'Strawberry' and category = '$notComp' ");
    		$notCompCount = mysqli_fetch_assoc($sql);
    		$notCompCount = $notCompCount['total'];

    		$sql = mysqli_query($conn, "SELECT count(*) as total FROM sc_plant_training_set WHERE plant = 'Strawberry'");
    		$totalCount = mysqli_fetch_assoc($sql);
    		$totalCount = $totalCount['total'];

    		$pComp = $compCount / $totalCount;

    		$pNotComp = $notCompCount / $totalCount; 
    		
            $sql = mysqli_query($conn, "SELECT count(*) as total FROM sc_plant_training_set_frequency WHERE plant = 'Strawberry' ");
    		$distinct = mysqli_fetch_assoc($sql);
    		$distinct = $distinct['total'];

    		$CompatibleToPlant = log($pComp);
    		foreach ($keywordsArray as $phLevel) {
    			$sql = mysqli_query($conn, "SELECT count as total FROM sc_plant_training_set_frequency where soil_ph = '$phLevel' and category = '$comp' and plant = 'Strawberry'  ");
    			$Count = mysqli_fetch_assoc($sql);
    			$Count = $Count['total'];
    			$CompatibleToPlant += log(($Count + 1) / ($compCount + $distinct));
    		}

    		$NotCompatibleToPlant = log($pNotComp);
    		foreach ($keywordsArray as $phLevel) {
    			$sql = mysqli_query($conn, "SELECT count as total FROM sc_plant_training_set_frequency where soil_ph = '$phLevel' and category = '$notComp' and plant = 'Strawberry' ");
    			$Count = mysqli_fetch_assoc($sql);
    			$Count = isset($Count['total']);
    			$NotCompatibleToPlant += log(($Count + 1) / ($notCompCount + $distinct));
    		}
    		if ($NotCompatibleToPlant >= $CompatibleToPlant) {			

    			 $category = $notComp;

    		} else {

    			 $category = $comp;

    		}
    		
    		$conn -> close();

    		return $category;
    

    	}
    }

?>
