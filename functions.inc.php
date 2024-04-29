<?php
function emptyInputsSignup($name, $email, $username, $password, $password_confirm){
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($password) || empty($password_confirm)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidUsername($username){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function PasswordMatch($password, $password_confirm){
    $result;
    if ($password !== $password_confirm){
        $result = true;
    }else{
        $result = false;
    }    
    return $result;
}
function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $password){
    $sql ="INSERT INTO users (usersName, usersEmail, UsersUid, usersPwd) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../signup.php?error=stsmtfailed");
        exit();
    }
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../login.php?error=none");
    exit();
}
function emptyinputsLogin($username, $password){
    $result;
    if (empty($username) || empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function LoginUser($conn, $username, $password){
    $uidExists = uidExists($conn, $username, $password);
    if($uidExists === false){
        header("location:../signup.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false){
        header('Location:../signup.php?error=wronglogin');
        exit();
    }else if($checkPwd === true){
        session_start();
        $_SESSION["usersid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["username"] = $uidExists["usersName"];
        header("Location:../index.php");
        exit();
    }
}
