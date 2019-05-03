<?php

  // Connect to the database for the entry of the CSV stuff into the database.
  $dbhost = "localhost";
  $dbuser = "nts_nts";     // CHANGE IT TO YOUR DATABASE USER NAME
  $dbpass = "i am a strong password";   // CHANGE IT TO YOUR DATABASE PASSWORD
  $dbname = "nts_Final_Project_Login";     // CHANGE IT TO YOUR DATABASE NAME
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ("Error connecting to mysql");
      
?>