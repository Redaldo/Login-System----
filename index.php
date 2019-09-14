<?php 
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
include("templates/header.inc.php")
?>

  

    

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Logging System</h1>
        <p>
        
        This design was created using  <a href="http://getbootstrap.com" target="_blank">Bootstrap v3.3.6</a><br><br>
        
        This code is licensed under the GPLv3. So you can put it on your own website and also change it, only the commercial sale of the script is excluded. 
        
        </p>
        <p><a class="btn btn-primary btn-lg" href="register.php" role="button">Register</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Features</h2>
          <ul>
          	<li>Registration & Login</li> 
          	<li>Internal member area</li>
          	<li>Sending new password</li>
          	<li>An easy code to understand and expand</li>
          	<li>Responsive design</li>
          </ul>   
        </div>
      </div>
	</div> <!-- /container -->
      

  
<?php 
include("templates/footer.inc.php")
?>
