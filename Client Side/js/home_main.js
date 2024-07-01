var url = document.URL;
var brgy = url.substring(url.lastIndexOf('=') + 1);
var brgy1 = decodeURI(brgy);
$(document).ready(function(){

	document.getElementById('Brgy').innerHTML = brgy1;
    $('#TablePlant').DataTable( {
      "pagingType": "simple_numbers",
      "searching": false,
	  "paging": false,
	  "bInfo":false,
	  "bDestroy": true,
      "ordering": false,
      "lengthChange": false,
	  "initComplete": function(settings)
	  {
		setTimeout(function(){
			document.getElementById('loading').style.display = 'none';
			document.getElementById('main-div').style.display = 'block';
		}, 500);		
	  },
      "ajax": "https://soilcompatibility-main.000webhostapp.com/api/view-plant-display.php?id="+brgy,
      "columns": [
					
					{
					  "data": "plant_picture",
					  render:function(data, type, row)
                      {
							return "<img style='border-radius: 50%; width: 50px; height: 50px;' src='https://soilcompatibility-main.000webhostapp.com/upload/plant/"+row['plant_picture']+"'/>"
                      },
					},
                    { "data": "Plant Name" },
					{
					  "data": null,
					  render:function(data, type, row)
                      {
							return "<a class='btn btn-success' style='border-radius:24px;' onclick='plantDesc("+ data['ID'] +")'><font color='white'>VIEW</font></a>"
                      },
					}

					
				]
			});
			
            $('.dataTables_length').addClass('bs-select');
			
			$("#myInput").on("keyup", function(){
				var value = $(this).val().toLowerCase();
				$("#myTable tr").filter(function(){
					$(this).toggle($(this).text().toLowerCase().indexOf(value) == 0)
				});
			});
			$.fn.dataTable.ext.errMode = () => alert('Something went wrong. Please try again!');
			
			
	
});	
function plantDesc(data) {
	
	let value = data;
	let id = value.toString();
	var ranWords = ['Feric', 'Garcines', 'Decenan'];
	var word = ranWords[Math.floor(Math.random() * ranWords.length)];
    var encrypted = CryptoJS.AES.encrypt(id, "Secret Passphrase");
	var encrypted1 = CryptoJS.AES.encrypt("Soil Compatibility", word);
    window.location.href = "view/p/details.html?" +encrypted1+ "?" + encrypted; 

}	

