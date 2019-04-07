<?php

  // Connect to the database for the entry of the CSV stuff into the database.
  $dbhost = "localhost";
  $dbuser = "dbasta_dbasta";     // CHANGE IT TO YOUR DATABASE USER NAME
  $dbpass = "Sillypassword";            // CHANGE IT TO YOUR DATABASE PASSWORD
  $dbname = "dbasta_handyRoads";     // CHANGE IT TO YOUR DATABASE NAME
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ("Error connecting to mysql");
      
?>
