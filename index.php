<?php 
  session_start();
  require "connectdb.php";
  if(isset($_POST['action']))
  {
    if(!isset($_SESSION['user'])){
    header('loaction:/cp/index.php');     
    }
  }
echo <<<EOD
<div class="header"><h1>WELCOME TO GRACEBOOK</h1></div>
    <div class="gmain">
      <button id="lg" onclick="location.href ='login.php'">LOGIN</button>
      <button id="lg" onclick="location.href ='register.php'">REGISTER</button>
    </div>
    <link rel="stylesheet" type="text/css" href="style.css">

    if(!isset($_POST['action'])){
      require "register.php";
      register();
      insertdetails();
    }
    
   if(isset($_POST['action'])=='register'){
      require "register.php";
      register();
      insertdetails();
    }
    
    elseif (isset($_POST['action'])== 'login') {
      require "login.php";
      lgin();
      loginrole1();
    }
   
    elseif (isset($_POST['action'])== 'logout') {
      require "logout.php";
      logout();
    }
    
    elseif (isset($_POST['action'])== 'adminhome') {
      require "adminhome.php";
      adminhome();
      addcountry();
    }
   
    elseif (isset($_POST["$action"])== 'home') {
      require "home.php";
      home();
      showdesc();
    }
    
    elseif (isset($_POST["$action"])== 'editprofile') {
      require "editprofile.php";
      editprofile();
      updatedetails();
    }
EOD;    
  }
?>
