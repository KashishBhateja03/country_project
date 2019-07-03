<?php
function adminhome(){
	require "connectdb.php";
	session_start();
connectdb();
function addcountry(){
if (isset($_POST['add_country'])) {
  print_r($_POST);
  $new_Country=mysqli_real_escape_string($db,$_POST['new_country']);
  $description=mysqli_real_escape_string($db,$_POST['description']);
  $sql="INSERT into country values('$new_Country','$description')";
  $new_result = mysqli_query($db,$sql);
  // $new_row = mysqli_fetch_row($db,$new_result);
  // $result=$new_row[0];
  // echo "$result";
  }
}

echo "<div class="header">
		<h1>GRACEBOOK</h1>
	</div>
	   require "errormsg.php";errormsg();
	<div>
			if(isset($_SESSION['username'])){
				 <<<EOD
<h1 id="homepage"> Welcome {$_SESSION['username']}(Admin)</h1>
<h3 id="editprofile">Want to change your password?<a href="editprofile.php">click me!!!</a></h3>
<div ><button onclick="location.href ='logout.php'" class="logpos">LOGOUT</button></div>
<FORM method="POST">Want to add more country to the list?<br>
	Enter country name: <input type="text" name="new_country"><br>
	Enter description : <input type="text" name="description"><br>
<input type="submit" name="add_country" value="add">
</form>
EOD;
			}
			else{
				 <<<EOD
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
