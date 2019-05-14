<!DOCTYPE html >
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Testing Drivability</title>
    <?php
session_start();
 ?>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 87%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
         background-color: #f9fbff;
        height: 100%;
        margin: 0;
      }
      
    .bg { 
      background-color: #edf1f7;
      height: 100%; 
      background-position:  center;
      background-repeat: no-repeat;
      background-size: cover;
      margin: 0;
    }
    
    .map {
    margin-bottom: 30px;
    margin-top: 10px;
    }
      
    .outer {
      display: none; 
      position: fixed;
       left: 0;
       top: 0;
       width: 100%;
       height: 100%;
       background-color: #e2e2e2;
       padding-top: 10px;
      }
      
    
      
      .topbar {
      }
      
      .right{
        font-family: Tahoma,Verdana,Segoe,sans-serif;
        position: fixed;
        right: 4%;
       top: 4%;
        
      }
      

    
    .button {
          background-color: transparent; 
          border: none;
          color: #75797c;
          text-align: center;
          font-family: Tahoma,Verdana,Segoe,sans-serif;
          font-size: 16px;
        }
        
        
      
      /*hide role-specific div html*/
        div.notin, div.loggedin {
        color: #75797c;
        font-family: Tahoma,Verdana,Segoe,sans-serif;
        height: 100%;
        display: none;
        background-color: #f9fbff;
        bottom:0;
        }
        
/* This element is the background image */
.background-image {
    width: 100%;
    height: auto;
    position: static;
    z-index: 0;
}
      
      
    </style>
    
  </head>
  <body>
<div class="bg">  
<div></div>
  <div id= "outerid" class="outer">
      <div class="topbar">
         <img src="logo.png" style="width:100px">
         <div class="right">
         <button class="button" onclick="logout()">Log out</button>
         </div>
         </div>
         
	<div id="map" class="map"></div>
	  
    <div id="form">
        <form action = "dbconnect.php" method="post" enctype="multipart/form-data">  
	         <input type="file" name="hazard" id="hazard" />
	         <input type="text" name="Description" id="Description"/>
	         <input type='hidden' name="latitude" id="latitude"/>
	         <input type ='hidden' name = "longitude" id = "longitude" />
	         <input type = 'hidden' name="DateTime" id="DateTime" /> 
	         <input type = 'hidden' name="login" id="login" />
	         <br/>  
	         <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
        </form>  
    </div>
    </div>
    
<div id = "out" class="notin">
</br></br></br></br></br></br></br></br></br></br></br></br>
<center><h1>Please login</h1></center>
<img class="background-image" src="login.png" width="NATURAL WIDTH" height="NATURAL HEIGHT">
</div>
</div>



   
    
    <script>
        // Show div html based on role
        var login = "<?php echo $_SESSION["email"] ?>";
        $("#login").val(login);
        if (login===""){
        document.getElementById('out').style.display = 'block';
        

        }
        
        else {
        document.getElementById('outerid').style.display = 'block';
        }
    </script>



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
        	console.log("Clicked map");
          marker = new google.maps.Marker({
            position: event.latLng,
            map: map
          });


          google.maps.event.addListener(marker, 'click', function() {
          	console.log("Clicked marker");
            infowindow.open(map, marker);
            var latitude = this.position.lat();
            var longitude = this.position.lng();
            var today = new Date();
            var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            var DateTime = date + ' ' + time;
            this.new = true
            $("#longitude").val(longitude);
            $("#latitude").val(latitude);
            $("#DateTime").val(DateTime);
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
      function addMarker(user_lat, user_lng, user_hazard, user_des, user_time) {
      	var infowindow = new google.maps.InfoWindow({});
      	var infowincontent = document.createElement('div');
      	var strong = document.createElement('strong');
      	var d = new Date(user_time);
      	var d1 = new Date();

      	if (Math.abs(d1 - d) < 18000000) {
      	strong.textContent = "The hazard described is: " + user_des;
      	infowincontent.appendChild(strong);
      	infowincontent.appendChild(document.createElement('br'));

      	var text = document.createElement('text');
      	text.textContent = "This photo was taken on " + d;
      	infowincontent.appendChild(text);
      	var img = document.createElement("IMG");
      	img.setAttribute("src", "data:image/png;base64, " + user_hazard);
      	img.setAttribute("width", "300");
      	img.setAttribute("height", "300");
      	infowincontent.appendChild(img);
      	var point = new google.maps.LatLng(user_lat, user_lng);
      	var marker = new google.maps.Marker({
      		new: false,
      		map: map,
      		position: point,
      	});


      	marker.addListener('dblclick', function() {
      		console.log("New node");
      		if (!this.new) {
	      		infowindow.setContent(infowincontent);
	      		infowindow.open(map, marker);
	      	}
      	});

      }

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
    				geoInfo.push([geo.Latitude, geo.Longitude, geo.name, geo.Description, geo.DateTime]);
    			});
    	callback(geoInfo);
    			}
			});
	}
fetchGeo(function(geoInfo){
	var i;
	for (i = 0; i < geoInfo.length; i++) {
		addMarker(geoInfo[i][0], geoInfo[i][1], geoInfo[i][2], geoInfo[i][3], geoInfo[i][4]);
	}
});
    		
    </script>
    
<script>
    function logout() {
        <?php
        // remove all session variables
        session_unset(); 
        
        // destroy the session 
        session_destroy(); 
        ?>
        location.href = "http://nts.mycpanel.princeton.edu/ORF401/finalproj2/entry.html"
        
      }
</script>

	</body>
</html>