<html>
	<head>
<title> The HandyRides - Member Registration </title>
<script type="text/javascript" src="isBlank.js"></script>
<script type ="text/javascript" src="isEmail.js"></script>
<script type ="text/javascript" src="checkRequired.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<meta name="google-signin-client_id" content="42713782894-er2adkg3rhnto5r258fbvqhvi6clojhc.apps.googleusercontent.com">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://apis.google.com/js/platform.js" async defer></script>




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* style the container */
.container {
  position: relative;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px 0 30px 0;
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

/* add appropriate colors to fb, twitter and google buttons */
.fb {
  background-color: #3B5998;
  color: white;
}

.twitter {
  background-color: #55ACEE;
  color: white;
}

.google {
  background-color: #dd4b39;
  color: white;
}

/* style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
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

<body>
    
    
    
    
    
    <div class="container">

       
        
        <div class="row">
        <h2 style="text-align:center">Sign up with Social Media or Manually</h2>
        <div class="vl">
        <span class="vl-innertext">or</span>
        </div>
        
        <div class="col">

        
        
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
        <script>
        function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        $.ajax({
        type: "POST",
        url: 'addMembergoog.php',
        data: { fName: profile.getGivenName(), lName: profile.getFamilyName(), Email: profile.getEmail(), Password: '123', Googkey:googleUser.getAuthResponse().id_token },
        success: function(data){
            if (data == 'exists') {
                
                alert('account exists, redirecting you')
                location.href = "http://nts.mycpanel.princeton.edu/ORF401/Finalproj/drivability.php"
            }
            
            
            else if (data == 'success') {
                alert('welcome')
                location.href = "http://nts.mycpanel.princeton.edu/ORF401/Finalproj/drivability.php"
            }
            
            else {
                alert('something went wrong')
            }

            
        }
        });
            
          }
          

        </script>

      </div>

    <div class="col">
        <div class="hide-md-lg">
          <p>Or sign in manually:</p>
        </div>
        <form name="new" action="addMemberuser.php" method="post" onsubmit="return checkRequired(fName.value, lName.value, Email.value, Pass.value)">
        <p>Please fill out the following fields (Required feilds are marked by *):</p>
        <p id="blanks" style="color:red;"></p>
        
        <label for="fName"> *First Name:</label><input type="text" name="fName" /><br />
        <label for="lName"> *Last Name: </label><input type="text" name="lName" /><br />
        <label for="Email"> *Email: </label><input type="text" name ="Email" /><br />
        <label for="Pass"> *Password: </label><input type="password" name="Pass" />

        
        <input type="submit" value="Submit" />
        </form>
        </div>
        </div>
      

      <br />
          </div>


    </div>
<div class="bottom-container">
  <div class="row">
    <div class="col">
      <a href="legitlogin.php" style="color:white" class="btn">Already have an account? Sign in</a>
    </div>
    <div class="col">
      <a href="#" style="color:white" class="btn">Forgot password?</a>
    </div>
  </div>
</div>

 

</body>
</html>
