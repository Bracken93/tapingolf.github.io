<?php
require "header.php";

// Connects to your Database
//$link = mysqli_connect("den1.mysql1.gear.host", "golfapp", "Iz7gshrEg_X~") or die(mysqli_error());
$link = mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($link,"golfapp") or die(mysqli_error($link));
if(isset($_COOKIE['ID_my_site']))
{
$username = $_COOKIE['ID_my_site'];
$pass = $_COOKIE['Key_my_site'];
$check = mysqli_query($link, "SELECT * FROM users WHERE username = '$username'")or die(mysqli_error($link));
while($info = mysqli_fetch_array( $check ))
{
//if the cookie has the wrong password, they are taken to the login page
if ($pass != $info['password'] || $info['role']!=1)
{ header("Location: index.php");
}
//otherwise they are shown the admin area
else
{


//This code runs if the form has been submitted
if (isset($_POST['submit'])) {
//This makes sure they did not leave any fields blank
if (!$_POST['competition'] | !$_POST['date'] | !$_POST['club'] ) {
die('You did not complete all of the required fields');
}
// checks if the username is in use
//if (!get_magic_quotes_gpc()) {
//$_POST['username'] = addslashes($_POST['username']);
//}
//$usercheck = $_POST['username'];
//$check = mysqli_query($link, "SELECT role FROM users WHERE username = '$usercheck'")or die(mysql_error());
//$check2 = mysqli_num_rows($check);
// here we add slashes if needed
if (!get_magic_quotes_gpc()) {
$_POST['competition'] = addslashes($_POST['competition']);
$_POST['date'] = addslashes($_POST['date']);
$_POST['club'] = addslashes($_POST['club']);
}
// now we insert it into the database
$insert = "INSERT INTO competitions (CompName, Date, Club)
VALUES ('".$_POST['competition']."', '".$_POST['date']."', '".$_POST['club']."')";
$add_member = mysqli_query($link, $insert);
?>
<h1>Registered</h1>
<p>Thank you, you have registered and posted your competition</a>.</p>

		<a href="admin.php" class="btn btn-primary">Club Profile</a>
		<a href="logout.php" class="btn btn-primary">Log Out</a>
 <?php
}
else
{
?>

<h1> Register </h1>

<div class="regform">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<table border="0">
	<tr><td>Competition Name:</td><td>
	<input type="text" name="competition" maxlength="60">
	</td></tr>
	<tr><td>Date:</td><td>
	<input type="date" name="date" maxlength="10">
	</td></tr>
	<tr><td>Club:</td><td>
	<select name="club">
		<option value="Malahide">Malahide</option>
		<option value="Portmarnock">Portmarnock</option>
		<option value="Donabate">Donabate</option>
	</select>
	</td></tr>
	
		
	<tr><th colspan=2><input type="submit" name="submit"
	value="Register"></th></tr> </table>
	</form>
</div>

<?php

echo "<a href=logout.php>Logout</a>";
}
}
}
}
else
//if the cookie does not exist, they are taken to the login screen
{
header("Location: index.php");
}
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</div>
</body>
</html>