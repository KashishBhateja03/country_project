<?php
function logout(){
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['message']);
	session_destroy();
	header("location: login.php");
}
 ?>
