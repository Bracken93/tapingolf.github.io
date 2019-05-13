<?php
require "header.php";
// Connects to your Database
//$link = mysqli_connect("den1.mysql1.gear.host", "golfapp", "Iz7gshrEg_X~") or die(mysqli_error());
$link = mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($link, "golfapp") or die(mysqli_error($link));
//checks cookies to make sure they are logged in
if(isset($_COOKIE['ID_my_site']))
{
$username = $_COOKIE['ID_my_site'];
$pass = $_COOKIE['Key_my_site'];
$check = mysqli_query($link, "SELECT * FROM users WHERE username = '$username'")or die(mysqli_error($link));
while($info = mysqli_fetch_array( $check ))
{
//if the cookie has the wrong password, they are taken to the login page
if ($pass != $info['password'] || $info['role'] !=1)
{ header("Location: index.php");
}
//otherwise they are shown the admin area
else
{
//echo "Admin Area<p>";
//echo "Your Content<p>";
//echo $info["username"];
//echo "<a href=logout.php>Logout</a>";
}

?>

 <center><h1 class="class-one"> Administrator Profile </h1></center>

<div class="card mx-auto mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="malahideGC.jpg" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title" style="text-transform: capitalize;"><?php echo $info["username"];?></h5>
        <!--<?php echo $info["ID"];?>
        <?php echo $info["fkclub"];?> -->
        <?php 
         $tempID = $info['ID']; 
        $clubinfo = mysqli_query($link, "SELECT users.ID, users.username, clubs.id, clubs.club, clubs.courseType, clubs.professional, clubs.status, clubs.noofholes FROM users INNER JOIN clubs ON users.fkclub = clubs.id WHERE users.ID=$tempID") or die(mysqli_error($link));?>

        <?php $clubsinfoarray = mysqli_fetch_array($clubinfo) ?>
      
    <ul class="list-group list-group-flush mb-3">
      <li class="list-group-item pl-0">Club: <?php echo $clubsinfoarray[3];?></li>
      <li class="list-group-item pl-0">Course Type: <?php echo $clubsinfoarray[4];?></li>
      <li class="list-group-item pl-0">Club Professional: <?php echo $clubsinfoarray[5];?></li>
      <li class="list-group-item pl-0">Status: <?php echo $clubsinfoarray[6];?></li>
      <li class="list-group-item pl-0">No. of Holes: <?php echo $clubsinfoarray[7];?></li>
    </ul>
    <a href="Cregister.php" class="btn btn-primary">Create Competition</a>
    <a href="logout.php" class="btn btn-primary">Log Out</a>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</div>
</body>
</html>
<?php
}
}
else
//if the cookie does not exist, they are taken to the login screen
{
header("Location: index.php");
}


?>