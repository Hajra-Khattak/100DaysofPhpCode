<?php

if (isset($_POST['submit'])){

    require_once "db.php";

    $username = $_POST['username'];
    $mobile = $_POST['mob-num'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
}

?>