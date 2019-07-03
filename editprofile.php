<?php
require "connectdb.php";
connectdb();
function updatedetails(){
if (isset($_POST['update_btn'])) {
session_start();
$username = mysqli_real_escape_string($db,$_POST['username']);
//$email = mysqli_real_escape_string($db,$_POST['email']);
$password = mysqli_real_escape_string($db,$_POST['password']);
$password2 = mysqli_real_escape_string($db,$_POST['password2']);
$email= "SELECT email FROM users WHERE username='$username'";
$e=mysqli_query($db, $email);
$t=mysqli_fetch_row($e);
$tx=$t[0];
if ($username==''||$password==''||$password2=='') {
 exit();
}
else{
 if ($password == $password2){
	 $password = md5($password);
	 $sql = "UPDATE `users` SET `password`= \"$password\" WHERE email='$tx' ";
	 mysqli_query($db, $sql);
	 // echo mysqli_error($db);
	 $_SESSION['message']= "Successfully Updated ";
	 $_SESSION['username']= $username;
	 // header("location: home.php");
 }
 else{
	 $_SESSION['message']= "Password didnt match";
 }
}
}
}

function editprofile(){
	echo "<div class="header">
		<h1>GRACEBOOK</h1>
		<link rel="stylesheet" type="text/css" href="style.css">
	</div>
<?php  require "errormsg.php"; errormsg(); ?>
	<form method="POST" >
		<table>
			<tr>
				<td class="inpf">Username:</td>
				<td><input type="text" required name="username" class="textInput"></td>
			</tr>
			<tr>
				<td class="inpf">New Password:</td>
				<td><input type="password" required name="password" class="textInput"></td>
			</tr>
			<tr>
				<td class="inpf">Re-enter new password:</td>
				<td><input type="password" required name="password2" class="textInput"></td>
			</tr>
			<tr>
				<td><a href="home.php">Go home</a></td>
				<td><input type="submit" name="update_btn" value="Update"></td>
			</tr>
			<div ><button onclick="location.href ='logout.php'" class="logpos">LOGOUT</button></div>
		</table>
	</form>
";
}
?>
