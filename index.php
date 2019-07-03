<?php session_start();
require "connectdb.php";
  if(isset($_POST['action']))
  {
        if(!isset($_SESSION['user'])){
          header('loaction:/index.php');
        }
  }
echo "  <div class="header"><h1>WELCOME TO GRACEBOOK</h1></div>
  <div class="gmain">
    <button id="lg" onclick="location.href ='login.php'">LOGIN</button>
    <button id="lg" onclick="location.href ='register.php'">REGISTER</button>
  </div>
  <link rel="stylesheet" type="text/css" href="style.css">

  <?php
    if (!isset($_GET['action'])) {
      echo "you have to register first!";
      require "register.php";
      register();
    }
    elseif (isset($_GET['action'])== 'register.php') {
      require "register.php";
      register();
    }
    elseif (isset($_GET['action'])== 'login.php') {
      require "login.php";
      lgin();
    }
    elseif (isset($_GET['action'])== 'logout.php') {
      require "logout.php";
      logout();
    }
    elseif (isset($_GET['action'])== 'adminhome.php') {
      require "adminhome.php";
      adminhome();
    }
    elseif (isset($_GET['action'])== 'home.php') {
      require "home.php";
      home();
    }
    elseif (isset($_GET['action'])== 'editprofile.php') {
      require "editprofile.php";
      editprofile();
    }
";
  ?>
