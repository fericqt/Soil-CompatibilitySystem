<?php
	
    include("db/dbconnection.php");
		
    $sql = "SELECT * FROM sc_suggested_plant ORDER BY status DESC, date_added DESC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
          
      while($row = $result->fetch_array()) {
                    if($row['plant_info']=="")
                    {
                        $plantDesc = "Not available";
                    }else{
                        $plantDesc = $row['plant_info'];
                    }
				
					$date = $row['date_added'];
					$date = date('F d, Y ', strtotime($date));
					
                        echo "<div class='row'>";
                          echo "<div class='col'>";
                            echo "<div class='text-truncate'>";
								echo "<label class='form-label'>";
									echo "Name: <strong>".$row['plant_name']." </strong>";
									echo "<br>Plant description: <strong>".$plantDesc." </strong>";
									echo "<br>Status: <strong>".$row['status']." </strong>";
									echo "<span class='form-label-description'>";
									  echo "<a href='#' onclick='deleteClick1_suggested_plant(".$row['id'].")' data-bs-toggle='modal' data-bs-target='#modal-danger_suggested_plant'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'><path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/></svg></a>";
									echo "</span>";
								  echo "</label>";
                            echo "</div>";
							
							 echo "<div class='text-muted'>".$date."";
							
							
							 echo "</div>";
						  echo "<hr/>";
                          echo "</div>";

							
                        echo "</div>";
                      
					  
			


		  
	  }
		
      
    } else {
      echo "0 results";
    }
    $conn->close();
?>
<div class="modal modal-blur fade" id="modal-danger_suggested_plant" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
			
          <div class="modal-body">
            <div class="modal-title">Are you sure?</div>
            <div>Do you really want to remove the data? What you've done cannot be undone.</div>
          </div>
          <div class="modal-footer">
			<input type="hidden" class="form-control" name="delete_id" id="delete_id" required> 
            <div class="col" ><a href="#"data-bs-dismiss="modal" class="btn btn-white w-100">
                    Cancel
                  </a></div>
                <div class="col"><a class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#modal-success_suggested_plant"  onclick="deleteClick_suggested_plant(document.getElementById('delete_id').value)">
                    Delete data
                  </a></div>
          </div>
        </div>
      </div>
    </div>
	
	<div class="modal modal-blur fade" id="modal-success_suggested_plant" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
			<button type="button" class="btn-close" onclick="window.location.href='main.html';" aria-label="Close"></button>
          <div class="modal-status text-center py-4bg-success">
			
		  </div>
		  <br>
          <div class="modal-body text-center py-4" id="msgbox_suggested_plant">
			
          </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
                <div class="col"><a href="main.html" class="btn btn-success w-100">
                    OK
                  </a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	
<style>
	hr {
	  margin-top: 1rem;
	  margin-bottom: 1rem;
	  border: 0;
	  border-top: 1px solid rgba(0, 0, 0, 0.1);
	}
</style>

 <script>
	function deleteClick_suggested_plant(data) {
			  
			$.ajax({
			method:"POST",
			url:"api/delete_suggested_plant.php",
			data:{id:data},
			dataType:"html",
			success:function(data){
				$("#msgbox_suggested_plant").html(data)
			}
		}); 	
			    
	}
		  
	function deleteClick1_suggested_plant(data){

		$("#delete_id").val(data);
	
	}
	
  </script>
