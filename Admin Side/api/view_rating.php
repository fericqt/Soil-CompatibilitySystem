<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');	
    ?>
<?php

	include("db/dbconnection.php");
		
    $sql = "SELECT * FROM sc_user_rating ORDER BY id DESC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
          
      while($row = $result->fetch_array()) {
				
					
                        echo "<div  class='review'>";
                          echo "<div class='body-review'>";
                          if($row['user_name']==null)
                           {
                             echo "<div class='name-review'>Anonymous</div>";
                           }else{
                             echo "<div class='name-review'>".$row['user_name']."</div>";
                           }
                             echo "<div class='place-review'>".$row['date']."</div>";
                             echo "<div class='rating'>";
                                if($row['rated_score']==1)
                                {
                                    echo "<i class='fas fa-star'></i>";

                                }else if($row['rated_score']==2)
                                {
                                    echo "<i class='fas fa-star'></i>";
                                    echo "<i class='fas fa-star'></i>";
                                }else if($row['rated_score']==3)
                                {
                                    echo "<i class='fas fa-star'></i>";
                                    echo "<i class='fas fa-star'></i>";
                                    echo "<i class='fas fa-star'></i>";
                         
                                }else if($row['rated_score']==4)
                                {
                                    echo "<i class='fas fa-star'></i>";
                                    echo "<i class='fas fa-star'></i>";
                                    echo "<i class='fas fa-star'></i>";
                                    echo "<i class='fas fa-star'></i>";
                            
                                }else if($row['rated_score']==5)
                                {
                                    echo "<i class='fas fa-star'></i>";
                                    echo "<i class='fas fa-star'></i>";
                                    echo "<i class='fas fa-star'></i>";
                                    echo "<i class='fas fa-star'></i>";
                                    echo "<i class='fas fa-star'></i>";
                            
                                }
                            echo "</div>";
                            echo "<div class='desc-review'>".$row['feedback']."</div>";
                         echo "</div>";
                    echo "</div>";
                

	  }
		
      
    } else {
      echo "0 results";
    }
    $conn->close();
?>
	
<style>

.review{

  max-width: 450px;
  flex: 1;

}

.head-review{
  margin: 1.75rem auto;
  width: 150px;
  height: 150px;
}


.body-review{
  background-color: rgb(238, 238, 238);
  padding: 2.5rem;
  box-shadow: 2px 2px 10px 3px rgb(225, 225, 225);
}
.name-review{
  font-size: 1.5rem;
  color: rgb(50, 50, 50);
  margin-bottom: .25rem;
  text-transform:uppercase;
}
.place-review{
  color: red;
  font-style: italic;
}
.rating{
  color: rgb(253, 180, 42);
  margin: 1rem 0;
}
.desc-review{
  line-height: 1.5rem;
  letter-spacing: 1px;
  color: rgb(150, 150, 150);
}

@media (max-width: 678px){
  .review{
    margin-top: 1.5rem;
  }
}
</style>
<script src="https://kit.fontawesome.com/44f557ccce.js"></script>

