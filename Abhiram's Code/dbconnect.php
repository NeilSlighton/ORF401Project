<?php  
 $connect = mysqli_connect("localhost", "dbasta_dbasta", "Sillypassword", "dbasta_handyRoads");  
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["hazard"]["tmp_name"]));
      $lat = isset($lat) ? $lat : $_POST["latitude"];
      $lng = isset($lng) ? $lng: $_POST["longitude"];  
      $query = "INSERT INTO tbl_images(name, Latitude, Longitude) VALUES ('$file','$lat', '$lng')";  
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Hazard Saved")</script>';  
      }
      
 }


 echo '
 <p> Thank You! </p>
 <meta http-equiv="refresh" content = "3; url = drivability.php" />';

 ?>