<?php
function connectdb(){
    global $db;
    $db = mysqli_connect("localhost", "root", "", "authentication");
    return $db;
}
?>
