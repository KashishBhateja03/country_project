<?php	require "connectdb.php";
	session_start();
connectdb();
function loginrole1(){
if (isset($_POST['login_btn'])) {
  $username = mysqli_real_escape_string($db,$_POST['username']);
  $password = mysqli_real_escape_string($db,$_POST['password']);

  $password = md5($password);
  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $role= "SELECT Role FROM users WHERE username='$username'";
  $rolecheck = mysqli_query($db, $role);
  $result = mysqli_query($db, $sql);
  $login=mysqli_fetch_row($result);
  $perm = mysqli_fetch_row($rolecheck);
  $finalrole = $perm[0];
  if ($finalrole=='R') {
    if (mysqli_num_rows($result)==1){
      $_SESSION['message'] = 1;
      $_SESSION['username'] = $username;
      header("location: home.php");
    }else{
      $_SESSION['message'] = "Username/password combination incorrect";
    }
  }
  else{
    if (mysqli_num_rows($result)==1){
      $_SESSION['message'] = 1;
      $_SESSION['username'] = $username;
      header("location: adminhome.php");
    }else{
      $_SESSION['message'] = "Username/password combination incorrect";
    }
  }
}
}
function login(){
echo <<<EOD
<div class="header">
		<h1>GRACEBOOK</h1>
		<script src="rgbstrip.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</div>
 require "errormsg.php"; errormsg();
 	<form method="POST" >
		<table>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username" class="textInput"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password" class="textInput"></td>
			</tr>
			<tr>
				<td>Not already a user? <a href="register.php">register here</a></td>
				<td><input type="submit" name="login_btn" value="Login"></td>
			</tr>
		</table>
	</form>
EOD;
}
?>
