function goBack(){
	window.history.back();		
}
$(document).ready(function(){

	var url = document.URL;
	var id = url.substring(url.lastIndexOf('?') + 1);
	var decrypted_id = CryptoJS.AES.decrypt(id, "Secret Passphrase");
	var final_id = decrypted_id.toString(CryptoJS.enc.Utf8);
    $('#soilPlant').DataTable( {
	"ordering": false,
    "lengthChange": false,
	"processing": true,
	"searching": false,
	"paging": false,
	"bInfo":false,
	"sAjaxSource": "https://soilcompatibility-main.000webhostapp.com/api/view-rec-soil.php?id="+final_id,
      "columns":[
					{ "data": "Soil pH"}
					
				]
	});
    $('#ferPlant').DataTable( {
	"ordering": false,
    "lengthChange": false,
	"searching": false,
	"paging": false,
	"bInfo":false,
	"processing": true,
	"initComplete": function(settings)
	{
		setTimeout(function(){
			document.getElementById('loading').style.display = 'none';
			document.getElementById('main-div').style.display = 'block';
		}, 1000);		
	},
	"sAjaxSource": "https://soilcompatibility-main.000webhostapp.com/api/view-rec-fertilizer.php?id="+final_id,
      "columns":[
					{ "data": "Name"}
				]
	});
	
    $.get("https://soilcompatibility-main.000webhostapp.com/api/plant-desc.php?id=" + final_id, function(data){
                      // Display the returned data in browser
        
		var plantDesc = data.split("/");
		$("#plantName").val(plantDesc[0]);
		$("#plantType").val(plantDesc[1]);
		$("#plantDesc").val(plantDesc[2]);
		$("#plantSeason").val(plantDesc[3]);
		$("#seasonFrom").val(plantDesc[4]);
		$("#seasonEnds").val(plantDesc[5]);
		$("#plantImg").attr('src',"https://soilcompatibility-main.000webhostapp.com/upload/plant/"+plantDesc[6]);
		
    });
	$.fn.dataTable.ext.errMode = () => alert('Error while loading the page. Please contact administrator regarding the problem.');	 
	
});

var modal = document.getElementsByClassName("modal");
var modalBtn = document.getElementById("modalBtn");
var modalBtn1 = document.getElementById("modalBtn1");
var modalClose = document.getElementsByClassName("close");
var modalClose1 = document.getElementById("hide");

modalBtn.onclick = function() {
  modal[0].style.display = "block";
}

modalBtn1.onclick = function() {
  modal[1].style.display = "block";
}

modalClose[0].onclick = function() {
  modal[0].style.display = "none";
}

modalClose1.onclick = function() {
  modal[1].style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal[0]) {
    modal[0].style.display = "none";
  }
  if (event.target == modal[1]) {
    modal[1].style.display = "none";
  }
}

//read more fertilizer
function seasonDesc() {
  var dots = document.getElementById("seasonDots");
  var moreText = document.getElementById("seasonMore");
  var btnText = document.getElementById("seasonBtn");

	
  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "<u>Read more</u>"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "<u>Read less</u>"; 
    moreText.style.display = "inline";
  }
}

//no internet js
// Selecting all required elements
const wrapper = document.querySelector(".s-wrapper"),
toast = wrapper.querySelector(".s-toast"),
title = toast.querySelector("span"),
subTitle = toast.querySelector("p"),
wifiIcon = toast.querySelector(".icon"),
closeIcon = toast.querySelector(".close-icon");

window.onload = ()=>{
    function ajax(){
        let xhr = new XMLHttpRequest(); //creating new XML object
        xhr.open("GET", "https://jsonplaceholder.typicode.com/posts", true); //sending get request on this URL
        xhr.onload = ()=>{ //once ajax loaded
            //if ajax status is equal to 200 or less than 300 that mean user is getting data from that provided url
            //or his/her response status is 200 that means he/she is online
            if(xhr.status == 200 && xhr.status < 300){
                toast.classList.remove("offline");
                title.innerText = "INTERNET CONNECTED!";
                subTitle.innerText = "Your connection is now available.";
                wifiIcon.innerHTML = '<img src="icons/wifi-on.png" alt="">';
				closeIcon.classList.remove("hide");
                closeIcon.onclick = ()=>{ //hide toast notification on close icon click
					wrapper.classList.remove("hide");
                    wrapper.classList.add("hide");
					window.location.reload();
                }
            }else{
                offline(); //calling offline function if ajax status is not equal to 200 or not less that 300
            }
        }
        xhr.onerror = ()=>{
            offline(); ////calling offline function if the passed url is not correct or returning 404 or other error
        }
        xhr.send(); //sending get request to the passed url
    }
    function offline(){ //function for offline
        wrapper.classList.remove("hide");
        toast.classList.add("offline");
        title.innerText = "NO INTERNET AVAILABLE!";
        subTitle.innerText = "Check your wifi or data connection.";
        wifiIcon.innerHTML = '<img src="icons/wifi-off.png" alt="">';  
		closeIcon.classList.add("hide");
    }
    setInterval(()=>{ //this setInterval function call ajax frequently after 100ms
        ajax();
    }, 500);
}

setTimeout(function(){
	document.getElementById('popup').style.display = 'block';
}, 10000);