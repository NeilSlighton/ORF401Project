<!DOCTYPE html>

<html>
<head>

<?php
session_start();
 ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="42713782894-er2adkg3rhnto5r258fbvqhvi6clojhc.apps.googleusercontent.com">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

body {
  width: 100%;
  margin: 0;
background-color: #edf1f7;

}
  .bg { 
  background-color: #edf1f7;
  background-image: url("login.png");
  width: 100%; 
  background-position: center ;
  background-repeat: no-repeat;
  background-size: cover;
  margin: 0;
  margin-top: 0%;
  position: fixed;
  bottom: 0;
  font-family: Tahoma,Verdana,Segoe,sans-serif;
  

  
}

html {
    width: 100%;
    margin: 0;
}

* {
  box-sizing: border-box;
}

/* style the container */
.container {
  position: relative;
  border-radius: 5px;
  padding: 20px 0 30px 0;
} 

.outimage {
    position: relative; 
    bottom: 100px;
    right: 10px;
}

/* This element is the background image */
.background-image {
    width: 105%;
    height: auto;
    position: static;
    z-index: 1;
}
    
.content {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1;
    }

.outform {
        width: 30%;
        background-color: #f2f2f2;
        padding: 20px 0 30px 0;
        position: relative;
        top: -150px;
        left: 37%;
        z-index: 2;
    }
    
.goog {
    position: relative; 
	left: 32%;
    
}


.navbar {
  overflow: hidden;
  position: sticky;
  position: -webkit-sticky;
  top: 0;
}

.navbar a {
  float: left;
  display: block;
  color: #75797c;
  font-family: Tahoma,Verdana,Segoe,sans-serif;
  font-size: 15px;
  text-align: center;
  padding: 0px 20px;
  text-decoration: none;
}

/* style inputs and link buttons */
input,
.btn {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; /* remove underline from anchors */
}

input:hover,
.btn:hover {
  opacity: 1;
}


/* style the submit button */
input[type=submit] {
  background-color: #134189;
  color: white;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #103672;
}

/* Two-column layout */
.col {
  float: left;
  width: 50%;
  margin: auto;
  padding: 0 50px;
  margin-top: 6px;
  
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* vertical line */
.vl {
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  border: 2px solid #ddd;
  height: 175px;
}

/* text inside the vertical line */
.vl-innertext {
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 50%;
  padding: 8px 10px;
}

/* hide some text on medium and large screens */
.hide-md-lg {
  display: none;
}

/* bottom container */
.bottom-container {
  text-align: center;
  background-color: #666;
  border-radius: 0px 0px 4px 4px;
}

/* Responsive layout - when the screen is less than 10000 wide, make the two columns stack on top of each other instead of next to each other */
/*neil here I edited this to be 10000*/
@media screen and (max-width: 10000px) {
  .col {
    width: 100%;
    margin-top: 0;
  }
  /* hide the vertical line */
  .vl {
    display: none;
  }
  /* show the hidden text on small screens */
  .hide-md-lg {
    display: block;
    text-align: center;
  }
}
</style>
</head>
<body style="overflow:hidden;">
<div class="container">
<div class="navbar">
<a href="entry.html">Home</a>
<a href="registeruser.php">Register</a>
</div>
  <div class="bg">  

 <div class="outform">
  <form action="login.php" method="post">
    <div class="row">
      <h2 style="text-align:center">Login</h2>
      
<br>
      <div class="col">
        <div class="goog">
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
        </div>

      </div>

      <div class="col">

            <br>
            <p>
              <input type="text" name="Email" placeholder="Email"><br />
              <br>
              <input type="password" name="Pass" placeholder="Password"><br />
              <br>
              <input type="submit" value="Sign In"> 
            </p>
          
      </div>
      </div>
    </div>
  </form>
  </div>


  </div>
</div>



 <script>
      function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        $.ajax({
        type: "POST",
        url: 'login.php',
        data: {Email: profile.getEmail(), Pass: '123'},
        success: function(data){
            location.href = "http://nts.mycpanel.princeton.edu/ORF401/finalproj2/drivability.php"

            
        }
        });
            
          }
    </script>


</body>
</html>

