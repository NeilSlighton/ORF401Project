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
        echo '
      <html>
        <head>
          <title> Welcome </title>
        </head>
        <body bgcolor="white" text="black">
          <p>Welcome</p>
          <meta http-equiv="refresh" content="3; url=drivability.php" />
        </body>
      </html>
      ';
        
        
      } else {
 			  echo '
      <html>
        <head>
          <title> Something went wrong </title>
        </head>
        <body bgcolor="white" text="black">
          <p> Something went wrong </p>
          <meta http-equiv="refresh" content="3; url=registeruser.php" />
        </body>
      </html>
      ';
      }
               
      mysqli_close($conn);
    	
    } else {
       echo '
      <html>
        <head>
          <title> Something went wrong </title>
        </head>
        <body bgcolor="white" text="black">
          <p> Something went wrong </p>
          <meta http-equiv="refresh" content="3; url=registeruser.php" />
        </body>
      </html>
      ';
    }

  } else {
     echo '
      <html>
        <head>
          <title> That email already exists </title>
        </head>
        <body bgcolor="white" text="black">
          <p> That email already exists </p>
          <meta http-equiv="refresh" content="3; url=registeruser.php" />
        </body>
      </html>
      ';
  }

?>





 