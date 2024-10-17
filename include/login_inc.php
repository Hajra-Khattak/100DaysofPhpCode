<?php


 if (isset($_POST['submit'])){

    require_once "db.php";

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($username) || empty($password) ){
        header("Location: ../login.php?error&msg=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM customer WHERE username = ? AND email = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../login.php?error&msg=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $username, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){
                $passCheck = password_verify($password, $row['password']);
                if($passCheck  == false){
                    header("Location: ../index.php?error&msg=wrongpassword");
                    exit();
                }elseif($passCheck == true){
                    session_start();
                    $_SESSION['sessionId'] = $row['id']; 
                    $_SESSION['sessionUser'] = $row['username']; 
                    $_SESSION['sessionemail'] = $row['email']; 
                    header("Location: ../profile.php?success=loggedin");
                    exit();
                }else{
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
            }else{
                header("Location: ../login.php?error&msg=nouser");
                exit();
            }
        }
    }
}else{
    header("Location: ../index.php?error=accessforbidden");
        exit();
}

?>