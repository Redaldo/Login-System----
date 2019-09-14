<?php 
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

include("templates/header.inc.php");
?>
 <div class="container small-container-330">
	<h2 >Password Forgotten</h2>


<?php 
$showForm = true;
 
if(isset($_GET['send']) ) {
	if(!isset($_POST['email']) || empty($_POST['email'])) {
		$error = "<b>Please enter an e-mail address</b>";
	} else {
		$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		$result = $statement->execute(array('email' => $_POST['email']));
		$user = $statement->fetch();		
 
		if($user === false) {
			$error = "<b>No user found</b>";
		} else {
			
			$passwortcode = random_string();
			$statement = $pdo->prepare("UPDATE users SET passwortcode = :passwortcode, passwortcode_time = NOW() WHERE id = :userid");
			$result = $statement->execute(array('passwortcode' => sha1($passwortcode), 'userid' => $user['id']));
			
			$empfaenger = $user['email'];
			$betreff = "New Password for you account on www.yourdomain.com"; //Enter your website
			$from = "From: First Name Last Name <sender@domain.com>"; //Enter your email address
			$url_passwortcode = getSiteURL().'passwortzuruecksetzen.php?userid='.$user['id'].'&code='.$passwortcode; //
			$text = 'Hello '.$user['firstname'].',
			 You asked for a new password for your account on www.yourdomain.com. To assign a new password, visit the following website within the next 24 hours:'.$url_passwortcode.'
 
			 If you remembered your password, or you have not requested this, please ignore this e-mail.
			
			Best Regards,
			www.yourdomain.com Team';
			
			//echo $text;
			 
			mail($empfaenger, $betreff, $text, $from);
 
			echo "A link to reset your password has been sent to your e-mail address.";	
			$showForm = false;
		}
	}
}
 
if($showForm):
?> 
	Enter your e-mail address here to request a new password.<br><br>
	 
	<?php
	if(isset($error) && !empty($error)) {
		echo $error;
	}
	
	?>
	<form action="?send=1" method="post">
		<label for="inputEmail">E-Mail</label>
		<input class="form-control" placeholder="E-Mail" name="email" type="email" value="<?php echo isset($_POST['email']) ? htmlentities($_POST['email']) : ''; ?>" required>
		<br>
		<input  class="btn btn-lg btn-primary btn-block" type="submit" value="New Password">
	</form> 
<?php
endif; //Endif von if($showForm)
?>

</div> <!-- /container -->
 

<?php 
include("templates/footer.inc.php")
?>