	 function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 41.85, lng: -87.65}
        });
        directionsDisplay.setMap(map);

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
	  var variable1 = document.getElementById("uservalue");
	  function getlocation(){ 
		       navigator.geolocation.getCurrentPosition(showLoc); 
	  } 
	  function showLoc(pos){ 
			  variable1.innerHTML = pos.coords.latitude + ", " + pos.coords.longitude; 
	  } 
	  
	  function startTime(){
		var today=new Date();
		var h=today.getHours();
		var m=today.getMinutes();
		var s=today.getSeconds();
		// add a zero in front of numbers<10
		m=checkTime(m);
		s=checkTime(s);
		document.getElementById('txt').innerHTML=h+":"+m+":"+s;
		t=setTimeout('startTime()',500);
	}
	function checkTime(i){
		if (i<10)
		{
		i="0" + i;
		}
		return i;
	}
	function timealert(){
		var today=new Date();
		var h=today.getHours();
		if(h>=13 && h<18){ alert("Skateparks are busy currently");}
		else { alert("Skateparks are not busy");}
	}
	function address(){
		document.getElementById("addr")=document.getElementById("address").value;
	}