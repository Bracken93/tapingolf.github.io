<?php
require "header.php";
// Connects to your Database
//$link = mysqli_connect("den1.mysql1.gear.host", "golfapp", "Iz7gshrEg_X~") or die(mysqli_error());
$link = mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($link, "golfapp") or die(mysqli_error($link));
//checks cookies to make sure they are logged in

$username = $_COOKIE['ID_my_site'];
$pass = $_COOKIE['Key_my_site'];
$check = mysqli_query($link, "SELECT * FROM users WHERE username = '$username'")or die(mysqli_error($link));

$info = mysqli_fetch_array( $check );


if (isset($_POST['submit'])) {

	$amount = $_POST['amount'];

	if ($amount == "Ten") {
		
		
		$info['balance'] = $info['balance'] + 10;
		
		//echo "<script>console.log(".$info['balance'].")<script>";

		$insert = "UPDATE users set balance=".$info['balance']." WHERE username='".$username."'";
		

		$increase_balance = mysqli_query($link, $insert);

	}
	else if ($amount == "Twenty"){
		
		
		$info['balance'] = $info['balance'] + 20;
		
		//echo "<script>console.log(".$info['balance'].")<script>";

		$insert = "UPDATE users set balance=".$info['balance']." WHERE username='".$username."'";
		

		$increase_balance = mysqli_query($link, $insert);
	}
	else if ($amount == "Fifty"){

		
		$info['balance'] = $info['balance'] + 50;
		
		//echo "<script>console.log(".$info['balance'].")<script>";

		$insert = "UPDATE users set balance=".$info['balance']." WHERE username='".$username."'";
		

		$increase_balance = mysqli_query($link, $insert);
		
	}
	else {
		//error 
	}


};


if (isset($_POST['withdraw'])) {

	$amount = $_POST['amount'];

	if ($amount == "Ten") {
		
		
		$info['balance'] = $info['balance'] - 10;
		
		//echo "<script>console.log(".$info['balance'].")<script>";

		$insert = "UPDATE users set balance=".$info['balance']." WHERE username='".$username."'";
		

		$increase_balance = mysqli_query($link, $insert);

	}
	else if ($amount == "Twenty"){
		
		
		$info['balance'] = $info['balance'] - 20;
		
		//echo "<script>console.log(".$info['balance'].")<script>";

		$insert = "UPDATE users set balance=".$info['balance']." WHERE username='".$username."'";
		

		$increase_balance = mysqli_query($link, $insert);
	}
	else if ($amount == "Fifty"){

		
		$info['balance'] = $info['balance'] - 50;
		
		//echo "<script>console.log(".$info['balance'].")<script>";

		$insert = "UPDATE users set balance=".$info['balance']." WHERE username='".$username."'";
		

		$increase_balance = mysqli_query($link, $insert);
		
	}
	else {
		//error 
	}


};


?>

<div class="card mx-auto" style="width: 50%;">
  <div class="card-body">

	<h3 class="card-title">Top up balance</h3>
	<p class="card-text">Current balance is: €<?php echo $info['balance']; ?></p>
	<p class="card-text">Select your top up amount:</p>
	

	<form class="mt-2" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

		<div class="form-group">
	    	<input type="radio" name="amount" value="Ten"> €10 <br>
	    	<input type="radio" name="amount" value="Twenty"> €20 <br>
	    	<input type="radio" name="amount" value="Fifty"> €50
    	</div>

    	<div class="form-group">
	    	<input class="btn btn-primary" type="submit" name="submit" value="Top Up">
	    	<input class="btn btn-primary" type="submit" name="withdraw" value="Withdraw">
    	</div>

	</form>

	</div>
</div>