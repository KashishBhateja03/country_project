<?php
function errormsg(){
  if (isset($_SESSION['message'])) {
    echo "<div id='error_msg'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
  }
}
?>
