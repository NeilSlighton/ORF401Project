
<html>
  <head>
    <title> ORF 401: HandyRoads </title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="loadSplashPage.js"></script>
  </head>
  <body onload="loadSplashPage();" bgcolor="white" text="black">
    <center>

<div class="container">
  <!-- Trigger the modal with a button -->
  <!-- <button id = "theButton" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >Open Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" height = "400" width = "400"> 
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <body id = "htmlBody" bgcolor="white" text="black">
          <center>

            <br/> <br />

            
            <img src ="logo.jpg", align="middle">

            <br /><br /><br />

            <form method = "post" enctype="multipart/form-data">
              <input type = "file" name = "image" id = "image" />
              <br /> 
              <input type = "submit" name = "insert" id = "insert" value= "Insert" >
            </form>
            <br />
            <br />
            <a href="home.php"> Return to Homepage </a>

          </center>
        </body>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

