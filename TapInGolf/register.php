<?php
require "header.php";

// Connects to your Database
//$link = mysqli_connect("den1.mysql1.gear.host", "golfapp", "Iz7gshrEg_X~") or die(mysqli_error());
$link = mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($link,"golfapp") or die(mysqli_error($link));
//This code runs if the form has been submitted
if (isset($_POST['submit'])) {
//This makes sure they did not leave any fields blank
if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] ) {
die('You did not complete all of the required fields');
}
// checks if the username is in use
if (!get_magic_quotes_gpc()) {
$_POST['username'] = addslashes($_POST['username']);
}
$usercheck = $_POST['username'];
$check = mysqli_query($link, "SELECT username FROM users WHERE username = '$usercheck'")
or die(mysql_error());
$check2 = mysqli_num_rows($check);
//if the name exists it gives an error
if ($check2 != 0) {
die('Sorry, the username '.$_POST['username'].' is already in use.');
}
//this makes sure both passwords entered match
if ($_POST['pass'] != $_POST['pass2']) {
die('Your passwords did not match. ');
}
// here we encrypt the password and add slashes if needed
$_POST['pass'] = sha1($_POST['pass']);
if (!get_magic_quotes_gpc()) {
$_POST['pass'] = addslashes($_POST['pass']);
$_POST['username'] = addslashes($_POST['username']);
}
// now we insert it into the database
$insert = "INSERT INTO users (username, password)VALUES ('".$_POST['username']."', '".$_POST['pass']."')";
$add_member = mysqli_query($link, $insert);
?>
<h1>Registered</h1>
<p>Thank you, you have registered - you may now <a href="index.php">Login</a> .</p>

 <?php
}
else
{
?>

<div class="card mx-auto" style="width: 18rem;">
  <div class="card-body">
    <h3 class="card-title">Register</h3>

	<form class="mt-2" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	  <div class="form-group">
	    <input type="text" name="username" maxlength="40" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Username">
	    <small id="usernameHelp" class="form-text text-muted">Please enter a username above.</small>
	  </div>
	  <div class="form-group">
	    <input name="pass" type="password" maxlength="10" class="form-control" id="pass" aria-describedby="passHelp" placeholder="Password">
	    <small id="passHelp" class="form-text text-muted">Please enter a password above.</small>
	  </div>
	  <div class="form-group">
	    <input name="pass2" type="password" maxlength="10" class="form-control" id="pass" aria-describedby="pass2Help" placeholder="Confirm Password">
	    <small id="pass2Help" class="form-text text-muted">Please confirm your password above.</small>
	  </div>
	  <button type="submit" name="submit" class="btn btn-primary">Register</button>
	</form>

  </div>
</div>

<?php
}
?>

<?php
// Start the session
//session_start($link);
?>

<?php
//Set session variables
//$_SESSION["Username"] = "";
//$_SESSION["Password"] = "";
//echo "Session variables are set.";
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</div>
</body>
</html>





























