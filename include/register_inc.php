<?php

if (isset($_POST['submit'])){

    require_once "db.php";

    $username = $_POST['username'];
    $mobile = $_POST['mob-num'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if( empty($username) || empty($mobile) || empty($email) || empty($password) || empty($confirmpassword)){
        header("Location: ../register.php?error=emptyfields&username=".$username);
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z0-9]*/", $username)){
        header("Location: ../register.php?error=invalidusername&username=".$username);
        exit();
    }
    elseif($password !== $confirmpassword){
        header("Location: ../register.php?error=passwordsdonotmatch&username=".$username);
        exit();
    }
    else{
        $sql = "";
    }
}

?>