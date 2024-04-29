<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"]; 
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];

    require_once("dbh.inc.php");
    require_once("functions.inc.php");

    $emptyInputsSignup = emptyInputsSignup($name, $email, $username, $password, $password_confirm);
    $invalidUsername = invalidUsername($username);
    $invalidEmail = invalidEmail($email);
    $passwordMatch = passwordMatch($password, $password_confirm);
    $uidExists = uidExists($conn, $username, $email);
    
    if($emptyInputsSignup !== false){
        header("Location:../signup.php?error=emptyinput");
        exit();
    }
    if($invalidUsername !== false){
        header("Location:../signup.php?error=invalidusername");
        exit();
    }
    if($invalidEmail !== false){
        header("Location:../signup.php?error=invalidemail");
        exit();
    }
    if($passwordMatch !== false){
        header("Location:../signup.php?error=passwordsdontmatch");
        exit();
    }
    if($uidExists !== false){
        header("Location:../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $password);
}
else{
    header("location:../login.php");
    exit();
}