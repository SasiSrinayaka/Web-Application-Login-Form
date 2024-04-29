<?php
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once("dbh.inc.php");
    require_once("functions.inc.php");

    if(emptyinputsLogin($username, $password) !== false){
        exit();
    }
    LoginUser($conn, $username, $password);
}
else{
    header("location:../login.php");
    exit();
}