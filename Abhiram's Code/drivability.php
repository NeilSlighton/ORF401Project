<!DOCTYPE html >
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Testing Drivability</title>
    <p>This is the Drivability Map</p>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 80%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 2%;
      }
    </style>
  </head>
  <body>
	<div id="map" height="460px" width="100%"></div>
    <div id="form">
        <form action = "dbconnect.php" method="post" enctype="multipart/form-data">  
	         <input type="file" name="hazard" id="hazard" />
	         <input type='hidden' name="latitude" id="latitude"/>
	         <input type = 'hidden' name = "longitude" id = "longitude" />  
	         <br/>  
	         <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
        </form>  
    </div>


    <script>
      var map;
      var marker;
      var infowindow;
      var messagewindow;

      function initMap() {
        var jersey = {lat: 40.3573, lng: -74.6672};
        map = new google.maps.Map(document.getElementById('map'), {
          center: jersey,
          zoom: 13
        });

        var trafficLayer = new google.maps.TrafficLayer();
        trafficLayer.setMap(map);


        infowindow = new google.maps.InfoWindow({
          content: document.getElementById('form')

        });

        
        messagewindow = new google.maps.InfoWindow({
          content: document.getElementById('message')
        });

        google.maps.event.addListener(map, 'click', function(event) {
          marker = new google.maps.Marker({
            position: event.latLng,
            map: map
          });


          google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
            var latitude = this.position.lat();
            var longitude = this.position.lng();
            $("#longitude").val(longitude);
            $("#latitude").val(latitude);
          });
        });

        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infowindow.setPosition(pos);
            infowindow.open(map);
            map.setCenter(pos);
          });
        }

      }

      function saveData() {
        var hazard = escape(document.getElementById('hazard').value);
        var photo = escape(document.getElementById('image').value);
        var time = escape(document.getElementById('time').value);
        var latlng = marker.getPosition();
        var url = 'phpsqlinfo_addrow.php?hazard=' + hazard + '&time=' + time + '&image=' + photo + '&lat=' + latlng.lat() + '&lng=' + latlng.lng();

        downloadUrl(url, function(data, responseCode) {

          if (responseCode == 200 && data.length <= 1) {
            infowindow.close();
            messagewindow.open(map, marker);
          }
        });
      }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request.responseText, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing () {
      }

  </script>
  <script>
      function addMarker(user_lat, user_lng, user_hazard) {
      	infowindow = new google.maps.InfoWindow({
          content: document.getElementById('form')

        });
      	var infowincontent = document.createElement('div');
      	var strong = document.createElement('strong');
      	strong.textContent = user_lng;
      	infowincontent.appendChild(strong);
      	infowincontent.appendChild(document.createElement('br'));
      	var img = document.createElement("IMG");
      	img.setAttribute("src", user_hazard + ".png");
      	img.setAttribute("width", "100");
      	img.setAttribute("height", "100");
      	infowincontent.appendChild(img);
      	var point = new google.maps.LatLng(user_lat, user_lng);
      	var marker = new google.maps.Marker({

      		map: map,
      		position: point,
      	});

      	//img_tag = '<img src="...'

      	marker.addListener('dblclick', function() {

      		infowindow.setContent(infowincontent);
      		infowindow.open(map, marker);
      	});


      }

      

    </script>
    <script async defer
    	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6yj5ZbhAN1S-1HAzJHMYwr6mKW837Ctc&callback=initMap">
    </script>

    <script>
    	function fetchGeo(callback){


    	$.ajax({
    		url: "allMarkers.php",
    		dataType: 'json',
    		data: 'action=load',
    		success: function(data){
    			var geoInfo = [];
    			$.each(data, function(i, geo) {
    				geoInfo.push([geo.Latitude, geo.Longitude, geo.name]);
    			});
    	callback(geoInfo);
    }
});
}
fetchGeo(function(geoInfo){
	var i;
	for (i = 0; i < geoInfo.length; i++) {
		addMarker(geoInfo[i][0], geoInfo[i][1], geoInfo[i][2]);
	}
});
    		
    		//context: document.body
    	//}).done(function(data) {
    		//document.write(data.name);
    	//});
    </script>
	</body>
</html>