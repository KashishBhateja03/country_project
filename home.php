<?php
require "connectdb.php";
session_start();
connectdb();
function showdesc(){
if (isset($_POST['submit_btn'])) {
	$country=mysqli_real_escape_string($db,$_POST['country']);
	$sql="SELECT description FROM country WHERE country='$country'";
	$description = mysqli_query($db,$sql);
	$desc = mysqli_fetch_row($description);
	$result=$desc[0];
}
}
function home(){
echo "
	<div class="header">
		<h1>GRACEBOOK</h1>
	</div>
 require "errormsg.php"; errormsg();
	<div>
			if(isset($_SESSION['username'])){
			 <<<EOD
<h1 id="homepage"> Welcome {$_SESSION['username']}</h1>
<h3 id="editprofile">Want to change your password?<a href="editprofile.php">click me!!!</a></h3>
<h3 id="editprofile">Want to know your country?<input type="text" name="country"><a href=\"https://en.wikipedia.org/wiki/country\">click me!!!</a></h3>
<div ><button onclick="location.href ='logout.php'" class="logpos">LOGOUT</button></div>
		<form method="POST">
			<table>
				<tr>
					<td>Select your choice:</td>
					<td>
						<select name="country">country
							<option>America</option>
							<option>Brazil</option>
							<option>Canada</option>
							<option>Denmark</option>
							<option>Egypt</option>
							<option>France</option>
							<option>Germany</option>
							<option>Hungary</option>
							<option>India</option>
							<option>Japan</option>
							<option>South Kore</option>
							<option>Latvia</option>
							<option>Mexico</option>
						</select>
					</td>
				</tr>
				<tr>
				<td><input type="submit" name="submit_btn" value="Get info"></td>
				</tr>
			</table>
			$result
		</form>
EOD;
			}
			else{
				echo <<<EOD
<h3>You are not supposed to be here</h3>
<div><button onclick="location.href ='register.php'">Registration Page</button></div>
<div><button onclick="location.href ='login.php'">Login Page</button></div>
EOD;
			}
	</div>
<link rel="stylesheet" type="text/css" href="style.css">
";
}
?>
