<?php



  //get variables
  $fname = $_POST["fName"];
  $lname = $_POST["lName"];
  $pass = $_POST["Password"];
  $email = $_POST["Email"];
  $googkey = $_POST["Googkey"];
  

  //get variables from readDB.php
  include ("readDbusers.php");
  //add users now
  if ($found == 0) {

    if ($fname && $lname && $googkey && $email){
        

      include ("connectDbusers.php");

      $sql = "INSERT INTO users (fName, lName, Pass, Email, Googkey) VALUES ('$fname' ,'$lname', '$pass', '$email', '$googkey')";

      $result = mysqli_query($conn, $sql);

      if ($result==1) {

            session_start();
            $_SESSION["email"] = $email;

        echo 'success';
        
        
      } else {
 			  echo 'fail';
      }
               
      mysqli_close($conn);
    	
    } else {
      echo 'more info';
    }

  } else {
      session_start();
        $_SESSION["email"] = $email;
    echo 'exists';
  }

?>