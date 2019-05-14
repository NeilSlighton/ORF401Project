<?php



  //get variables
  $fname = $_POST["fName"];
  $lname = $_POST["lName"];
  $pass = $_POST["Pass"];
  $email = $_POST["Email"];
  $googkey = $_POST["Googkey"];

  //get variables from readDB.php
  include ("readDbusers.php");
  //add users now
  if ($found == 0) {
    if ($fname && $lname && $pass && $email){
        

      include ("connectDbusers.php");

      $sql = "INSERT INTO users (fName, lName, Pass, Email, Googkey) VALUES ('$fname' ,'$lname', '$pass', '$email', '$googkey')";

      $result = mysqli_query($conn, $sql);

      if ($result==1) {
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
        <title>Welcome</title>
      </head>
      <body>
    <div class="container">
     <div class="writing">
    <p>Welcome! </p>
    <meta http-equiv="refresh" content="1; url=drivability.php" />
    </div>
      <div class = "outimage">
        <img class="background-image" src="login.png" width="NATURAL WIDTH" height="NATURAL HEIGHT">
      </div>
    </div>
    </body>
    </html>
    ';
  
        
        
      } else {
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
    <p>Something went wrong, please try again.</p>
    <meta http-equiv="refresh" content="1; url=registeruser.php" />
    </div>
      <div class = "outimage">
        <img class="background-image" src="login.png" width="NATURAL WIDTH" height="NATURAL HEIGHT">
      </div>
    </div>
    </body>
    </html>
    ';
      }
               
      mysqli_close($conn);
    	
    } else {
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
    <p>Please fill in everything.</p>
    <meta http-equiv="refresh" content="1; url=registeruser.php" />
    </div>
      <div class = "outimage">
        <img class="background-image" src="login.png" width="NATURAL WIDTH" height="NATURAL HEIGHT">
      </div>
    </div>
    </body>
    </html>
    ';
    }

  } else {
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
    <p>That email already exists.</p>
    <meta http-equiv="refresh" content="1; url=registeruser.php" />
    </div>
      <div class = "outimage">
        <img class="background-image" src="login.png" width="NATURAL WIDTH" height="NATURAL HEIGHT">
      </div>
    </div>
    </body>
    </html>
    ';
  }

?>





 