<?php
require "header.php";
// Connects to your Database
//$link = mysqli_connect("den1.mysql1.gear.host", "golfapp", "Iz7gshrEg_X~") or die(mysqli_error());
$link = mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($link, "golfapp") or die(mysqli_error($link));
//Checks if there is a login cookie
if(isset($_COOKIE['ID_my_site']))
//if there is, it logs you in and directes you to the members page
{
$username = $_COOKIE['ID_my_site'];
$pass = $_COOKIE['Key_my_site'];
$check = mysqli_query($link, "SELECT * FROM users WHERE username = '$username'")or die(mysqli_error($link));
while($info = mysqli_fetch_array( $check ))
{
if ($pass != $info['password'])
{
}
else
{
	



}
}
}
//if the login form is submitted
if (isset($_POST['submit'])) { // if form has been submitted
// makes sure they filled it in
if(!$_POST['username'] | !$_POST['pass']) {
die('You did not fill in a required field.');
}
// checks it against the database
if (!get_magic_quotes_gpc()) {
//$_POST['email'] = addslashes($_POST['email']);
}
$check = mysqli_query($link, "SELECT * FROM users WHERE username = '".$_POST['username']."'")or die(mysqli_error($link));
//Gives error if user dosen't exist
$check2 = mysqli_num_rows($check);
if ($check2 == 0) {
die('That user does not exist in our database. <a href=register.php>Click Here to Register</a>');
}
while($info = mysqli_fetch_array( $check ))
{
$_POST['pass'] = stripslashes($_POST['pass']);
$info['password'] = stripslashes($info['password']);
$_POST['pass'] = sha1($_POST['pass']);
//gives error if the password is wrong
if ($_POST['pass'] != $info['password']) {
die('Incorrect password, please try again.');

}

else
{
// if login is ok then we add a cookie
$_POST['username'] = stripslashes($_POST['username']);
$hour = time() + 3600;
setcookie(ID_my_site, $_POST['username'], $hour);
setcookie(Key_my_site, $_POST['pass'], $hour);
//then redirect them to the members area
$role=$info["role"];
	if($role==0){
		header("Location: members.php");
	}
	else if($role==1){
		header("Location: admin.php");
	}
}
}
}
else
{
// if they are not logged in
?>

<div class="bgimg" style="background-image: url(herobg.jpg);"></div>

<center><h1> Welcome to Tap In Golf</h1></center>
<br>
		

<div class="card mx-auto" style="width: 18rem;">
  <div class="card-body">
    <h3 class="card-title">Log in</h3>

	<form class="mt-2" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	  <div class="form-group">
	    <input type="text" name="username" maxlength="40" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Username">
	    <small id="usernameHelp" class="form-text text-muted">Please enter your username above.</small>
	  </div>
	  <div class="form-group">
	    <input name="pass" type="password" maxlength="50" class="form-control" id="pass" aria-describedby="passHelp" placeholder="Password">
	    <small id="passHelp" class="form-text text-muted">Please enter your password above.</small>
	  </div>
	
	  <button type="submit" name="submit" class="btn btn-primary">Login</button>
	 
	</form>

  </div>
</div>

<?php
}
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</div>
</body>
</html>