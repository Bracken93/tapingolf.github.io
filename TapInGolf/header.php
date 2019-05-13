<?php
	
// Connects to your Database
//$link = mysqli_connect("den1.mysql1.gear.host", "golfapp", "Iz7gshrEg_X~") or die(mysqli_error());
$link = mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($link, "golfapp") or die(mysqli_error($link));
//checks cookies to make sure they are logged in
$role = 3;
if(isset($_COOKIE['ID_my_site']))
{
$username = $_COOKIE['ID_my_site'];
$pass = $_COOKIE['Key_my_site'];


$check = mysqli_query($link, "SELECT * FROM users WHERE username = '$username'")or die(mysqli_error($link));
while($info = mysqli_fetch_array( $check ))
		{
		//if the cookie has the wrong password, they are taken to the login page
		if ($pass != $info['password'])
		{ header("Location: index.php");
		}
		//otherwise they are shown the member area
		else
		{

		}

		$role = $info['role'];
	}
}

?>

	<html>

		<head>

			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
			
			<link rel="stylesheet" href="style.css">
			

		</head>

		<body>

			<!-- Members -->
			<?php if($role == 0) : ?>

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <a class="navbar-brand" href="index.php">Tap In Golf</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			    <div class="navbar-nav">
			      <a class="nav-item nav-link" href="members.php">Member</a>
			      <a class="nav-item nav-link" href="competitions.php">Competitions</a>
			      <a class="nav-item nav-link" href="memberchart.php">Charts</a>
			      <a class="nav-item nav-link" href="clubs.php">Clubs</a>
			      <a class="nav-item nav-link" href="contact.php">Contact</a>
			      <!--<a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>-->
			    </div>
				</div>

			    <div class="collapse navbar-collapse justify-content-end">
				    <div class="navbar-nav">
						<a class="nav-item nav-link" href="register.php">Register</a>
						<a class="nav-item nav-link" href="index.php">Logout</a>
				    </div>   
			    </div> 
			  </div>
			</nav>
			
			
			
			<!-- Admins -->
			<?php elseif ($role==1) : ?>

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <a class="navbar-brand" href="index.php">Tap In Golf</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			    <div class="navbar-nav">
			      <a class="nav-item nav-link" href="admin.php">Admin</a>
			      <a class="nav-item nav-link" href="competitions.php">Competitions</a>
			      <a class="nav-item nav-link" href="chart.php">Charts</a>
			      <a class="nav-item nav-link" href="contact.php">Contact</a>
			      <!--<a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>-->
			    </div>
				</div>

			    <div class="collapse navbar-collapse justify-content-end">
				    <div class="navbar-nav">
						<a class="nav-item nav-link" href="register.php">Register</a>
						<a class="nav-item nav-link" href="index.php">Logout</a>
				    </div>   
			    </div> 
			  </div>
			</nav>

			<!-- Anyone else -->
			<?php else : ?>

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <a class="navbar-brand" href="index.php">Tap In Golf</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			    <div class="navbar-nav">
			      <a class="nav-item nav-link" href="members.php">Visitor</a>
			      <a class="nav-item nav-link" href="competitions.php">Competitions</a>
			      <a class="nav-item nav-link" href="clubs.php">Clubs</a>
			      <a class="nav-item nav-link" href="contact.php">Contact</a>
			      <!--<a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>-->
			    </div>
				</div>

			    <div class="collapse navbar-collapse justify-content-end">
				    <div class="navbar-nav">
						<a class="nav-item nav-link" href="register.php">Register</a>
						<a class="nav-item nav-link" href="index.php">Login</a>
				    </div>   
			    </div> 
			  </div>
			</nav>

		<?php endif; ?>
				

			<div class="container mt-5">