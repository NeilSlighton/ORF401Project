<?php

  $email = isset($email) ? $email : $_POST["Email"];
  $pass = isset($pass) ? $pass : $_POST["Pass"];

  if (!$email or !$pass) {

    echo '
    <html>
    <style>
    body {
    background-color: #f9fbff;
      font-family: Tahoma,Verdana,Segoe,sans-serif;
    }
    .outimage {
    position: relative; 
    bottom: -20px;
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
    <p>Please fill in everything. Bringing you back.</p>
    <meta http-equiv="refresh" content="1; url=legitlogin.php" />
    </div>
      <div class = "outimage">
        <img class="background-image" src="login.png" width="NATURAL WIDTH" height="NATURAL HEIGHT">
      </div>
    </div>
    </body>
    </html>
    ';

  } else {

    include ("readDbusers.php");

    if ($found == 0) {

      echo '
    <html>
    <style>
    body {
    background-color: #f9fbff;
      font-family: Tahoma,Verdana,Segoe,sans-serif;
    }
    .outimage {
    position: relative; 
    bottom: -20px;
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
    <p>Email not found. Bringing you back.</p>
    <meta http-equiv="refresh" content="1; url=legitlogin.php" />
    </div>
      <div class = "outimage">
        <img class="background-image" src="login.png" width="NATURAL WIDTH" height="NATURAL HEIGHT">
      </div>
    </div>
    </body>
    </html>
    ';

    } else {
      
      if ($pass != $passdB) {

        echo '
    <html>
    <style>
    body {
    background-color: #f9fbff;
      font-family: Tahoma,Verdana,Segoe,sans-serif;
    }
    .outimage {
    position: relative; 
    bottom: -20px;
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
    <p>Wrong password. Bringing you back.</p>
    <meta http-equiv="refresh" content="1; url=legitlogin.php"/>
    </div>
      <div class = "outimage">
        <img class="background-image" src="login.png" width="NATURAL WIDTH" height="NATURAL HEIGHT">
      </div>
    </div>
    </body>
    </html>
    ';

      } else {
    session_start();
    $_SESSION["email"] = $email;

        echo '
    <html>
    <style>
    body {
    background-color: #f9fbff;
      font-family: Tahoma,Verdana,Segoe,sans-serif;
    }
    .outimage {
    position: relative; 
    bottom: -20px;
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
        <title>Success</title>
      </head>
      <body>
    <div class="container">
     <div class="writing">
    <p>Get ready to start mapping!</p>
    <meta http-equiv="refresh" content="1; url=drivability.php" />
    </div>
      <div class = "outimage">
        <img class="background-image" src="login.png" width="NATURAL WIDTH" height="NATURAL HEIGHT">
      </div>
    </div>
    </body>
    </html>
    ';

      }
    }
  }

?>




