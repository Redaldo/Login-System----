<?php 
session_start();
session_destroy();
unset($_SESSION['userid']);

//Remove Cookies
setcookie("identifier","",time()-(3600*24*365)); 
setcookie("securitytoken","",time()-(3600*24*365)); 

require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

include("templates/header.inc.php");
?>

<div class="container main-container">
You logged out Successfully. <a href="login.php">Login Again</a>.
</div>
<?php 
include("templates/footer.inc.php")
?>