<!https://developers.google.com/maps/documentation/javascript/info-windows-to-db>
<?php  
 $connect = mysqli_connect("localhost", "dbasta_dbasta", "Sillypassword", "dbasta_handyRoads");  
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO tbl_images(name) VALUES ('$file')";  
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Hazard Saved")</script>';  
      }
      $lat = "<script>document.getElementById(latitude)</script>";
      $query1 = "INSERT INTO tbl_images(Latitude) VALUES ('$lat')";  
 }  
 ?>
 


<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Testing Drivability</title>
    <p>This is the Drivability Map</p>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
 <?php
session_start();

 echo "<p><b>login:", $_SESSION["email"], "</b> </p>";
 ?>

<script language="JavaScript">


	

</script>

     <td> <a href="legitlogin.php"><b> Logout </b></a></td>
     <br>
    <div id="map" height="460px" width="100%"></div>
    <div id="form">
        <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="hazard" id="image" />  
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
          });
        });
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
    <script async defer
    src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC6yj5ZbhAN1S-1HAzJHMYwr6mKW837Ctc&callback=initMap">
    </script>
  </body>
</html>