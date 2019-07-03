<?php
require "connectdb.php";
 connectdb();
 function insertdetails(){
if (isset($_POST['register_btn'])) {
		session_start();
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$password2 = mysqli_real_escape_string($db,$_POST['password2']);

		if ($username==''||$email==''||$password==''||$password2=='') {
			exit();
		}
		else{
			if ($password == $password2){
				$password = md5($password);
				$sql = "INSERT INTO users(username, email, password) VALUES('$username','$email','$password')";
				mysqli_query($db, $sql);
				$_SESSION['message']= "you are now logged in";
				$_SESSION['username']= $username;
				header("location: home.php");
			}
			else{
				$_SESSION['message']= "Password didnt match";
			}
		}
	}
}
function register(){
echo "<div class="header">
		<h1>GRACEBOOK</h1>
		<link rel="stylesheet" type="text/css" href="style.css">
	</div>

 require "errormsg.php";
errormsg();
	<form method="POST" >
		<table>
			<tr>
				<td class="inpf">Username:</td>
				<td><input type="text" required name="username" class="textInput"></td>
			</tr>
			<tr>
				<td class="inpf">Email:</td>
				<td><input type="email" required name="email" class="textInput"></td>
			</tr>
			<tr>
				<td class="inpf">Password:</td>
				<td><input type="password" required name="password" class="textInput"></td>
			</tr>
			<tr>
				<td class="inpf">Re-enter Password:</td>
				<td><input type="password" required name="password2" class="textInput"></td>
			</tr>
			<tr>
				<td>Already a user? <a href="login.php">login here</a></td>
				<td><input type="submit" name="register_btn" value="Register"></td>
			</tr>
		</table>
	</form>
}";
?>
