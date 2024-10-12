<?php

// require_once "db.php";

if (isset($_POST['submit'])){

    require_once "db.php";

    $username = $_POST['username'];
    $mobile = $_POST['mob-num'];
    $email = $_POST['useremail'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    $insrt = "INSERT INTO `customer`( `username`, `email`, `mobile`, `password`) VALUES ('$username', '$email', '$mobile', '$password' ) ";
    $result = mysqli_query($conn, $insrt);

    if($insrt){
        echo "Yes Data inserted";
    }

    // if( empty($username) || empty($mobile) || empty($email) || empty($password) || empty($confirmpassword)){
    //     header("Location: ../register.php?error=emptyfields&username=".$username);
    //     exit();
    // }
    // elseif(!preg_match("/^[a-zA-Z0-9]*/", $username)){
    //     header("Location: ../register.php?error=invalidusername&username=".$username);
    //     exit();
    // }
    // elseif($password !== $confirmpassword){
    //     header("Location: ../register.php?error=passwordsdonotmatch&username=".$username);
    //     exit();
    // }
    // else{
    //     $sql = "SELECT username FROM customer WHERE username = ?";
    //     $stmt = mysqli_stmt_init($conn);
    //     if(!mysqli_stmt_prepare($stmt, $sql)){
    //         header("Location: ../register.php?error=sqlerror");
    //         exit();
    //     }else{
    //         mysqli_stmt_bind_param($stmt, "s", $username);
    //         mysqli_stmt_execute($stmt);
    //         mysqli_stmt_store_result($stmt);
    //         $rowCount = mysqli_stmt_num_rows($stmt);

    //         if($rowCount > 0){
    //             header("Location: ../register.php?error=usernametaken");
    //             exit();
    //         }else{
    //             $sql = "INSERT INTO customer(username, email, mobile, password) VALUES(?, ?, ?, ?)";
    //             $stmt = mysqli_stmt_init($conn);
    //             if(mysqli_stmt_prepare($stmt, $sql)){
    //                 header("Location: ../register.php?error=usernametaken");
    //             exit();
    //             }else{
    //                 mysqli_stmt_bind_param($stmt, "s", $username);
    //                 mysqli_stmt_execute($stmt);
    //                 mysqli_stmt_store_result($stmt);
                    
    //             }

    //         }
    //     }
    // }

    // $insert = "INSERT INTO `customer` (`username`, `email`, `mobile`, `password`) VALUES ('haj', 'haj@gmail.com', '12345678', 'haj123')";
    // $exe = $conn->query($insert);
    // if(!$exe){
    //     echo "insert query not executed";
    // }
    
}



?>