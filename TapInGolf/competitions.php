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
//$check = mysqli_query($link, "SELECT * FROM users WHERE username = '$username'")or die(mysqli_error($link));
$check2 = mysqli_query($link, "SELECT * FROM competitions")or die(mysqli_error($link));
?>

<input class="form-control mb-2" id="searchInput" value="Type To Filter">
<table class="table table-light table-bordered">

	<thead>
        <tr>
            <th>Competition ID:</th>
            <th>Comp Name:</th>
            <th>Date:</th>
            <th>Club:</th>
        </tr>
    </thead>
	<tbody id="fbody">
		
<?php
while($info = mysqli_fetch_array( $check2 ))
{
//if the cookie has the wrong password, they are taken to the login page
//if ($pass != $info['password'])
//{ header("Location: index.php");
//}
//otherwise they are shown the member area
//else
//{
	?>
			


			<tr>
				<td><?php echo $info["CID"];?> </td>
    			<td><?php echo $info["CompName"];?> </td>
    			<td><?php echo $info["Date"];?> </td>
    			<td><?php echo $info["Club"];?> </td>
                <td>
                    <!--<input type= 'submit' value="Register" class="register"></td> -->
    		</tr>

<?php

//echo "<a href=logout.php>Logout</a>";
}
?>
</tbody>
</table>


<script>
$("#searchInput").keyup(function () {
    //split the current value of searchInput
    var data = this.value.split(" ");
    //create a jquery object of the rows
    var jo = $("#fbody").find("tr");
    if (this.value == "") {
        jo.show();
        return;
    }
    //hide all the rows
    jo.hide();

    //Recusively filter the jquery object to get results.
    jo.filter(function (i, v) {
        var $t = $(this);
        for (var d = 0; d < data.length; ++d) {
            if ($t.is(":contains('" + data[d] + "')")) {
                return true;
            }
        }
        return false;
    })
    //show the rows that match.
    .show();
}).focus(function () {
    this.value = "";
    $(this).css({
        "color": "black"
    });
    $(this).unbind('focus');
}).css({
    "color": "#C0C0C0"
});
</script>
<?php
}
//}
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