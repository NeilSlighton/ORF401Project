<?php  

 $connect = mysqli_connect("localhost", "dbasta_dbasta", "Sillypassword", "dbasta_handyRoads");  
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["hazard"]["tmp_name"]));
      $des = isset($des) ? $des : $_POST["Description"];
      $time = isset($time) ? $time : $_POST["DateTime"];
      $lat = isset($lat) ? $lat : $_POST["latitude"];
      $lng = isset($lng) ? $lng: $_POST["longitude"];  
      $login = isset($login) ? $login: $_POST["login"];
      $query = "INSERT INTO tbl_images(name, Description, Latitude, Longitude, DateTime) VALUES ('$file','$des','$lat', '$lng','$time')";  
      if(mysqli_query($connect, $query))  
      {  
        // remove all session variables
        session_unset(); 
        // destroy the session 
        session_destroy(); 
        
        session_start();
        $_SESSION["email"] = $login;

      }

 }

 echo '
    <html>
    <style>
    body {
    background-color: #f9fbff;
      font-family: Tahoma,Verdana,Segoe,sans-serif;
    }
    .outimage {
    position: relative; 
    bottom: 10px;
    right: 10px;
}

/* This element is the background image */
.background-image {
    width: 105%;
    height: auto;
    position: static;
    z-index: 0;
}
.writing {
    text-align: center;
    margin-top: 20%;
    color: #c1c5cc;
    font-family: Tahoma,Verdana,Segoe,sans-serif;
    font-size: 30px;
    
}
</style>
      <head>
        <title>Empty fields</title>
      </head>
      <body>
    <div class="container">
     <div class="writing">
    <p>Thank you for making roads safer!</p>
    <meta http-equiv="refresh" content="1; url=drivability.php" />
    </div>
      <div class = "outimage">
        <img class="background-image" src="login.png" width="NATURAL WIDTH" height="NATURAL HEIGHT">
      </div>
    </div>
    </body>
    </html>
    ';

 ?>