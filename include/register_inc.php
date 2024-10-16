<?php

// require_once "db.php";



if (isset($_POST['submit'])){

    require_once "db.php";

    $username = $_POST['username'];
    $mobile = $_POST['mob-num'];
    $email = $_POST['useremail'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    

    // Image Upload

    // if($_FILES['profileImg']['error'] === 4){
    //     header("Location: ../register.php?imagedoesnotexit");
        
    // }else{
    //     $file = $_FILES['profileImg'];
    //     $file_name = $file['name'];
    //     $file_size = $file['size'];
    //     $file_tmp = $file['tmp_name'];
    //     $file_type = $file['type'];

    //     $validExtension = ['jpg', 'png', 'jpeg'];
    //     $imageExtension = explode('.', $file_name);
    //     $imageExtension = strtolower(end($imageExtension));

    //     if(!in_array($imageExtension, $validExtension)){
    //     header("Location: ../register.php?error=invalidimageextension");
    //     }elseif($file_size > 1000000){
    //         header("Location: ../register.php?error=filesizeistoolarge");
    //     }else{
    //         $newImageName = uniqid();
    //         $newImageName .= '.'. $imageExtension ; 

    //         move_uploaded_file($file_tmp, '../assets/img/'.$newImageName);
    //         $query = "INSERT INTO `customer`(`image`) VALUES ('$newImageName')";
    //         mysqli_query($conn, $query);
    //         echo "Uploaded";

    //     }
    // }


    // $insrt = "INSERT INTO `customer`( `username`, `email`, `mobile`, `password`) VALUES ('$username', '$email', '$mobile', '$password' ) ";
    // $result = mysqli_query($conn, $insrt);

    // if($insrt){
    //     echo "Yes Data inserted";
    // }

    if( empty($username) || empty($mobile) || empty($email) || empty($password) || empty($confirmpassword)){
        header("Location: ../register.php?error&msg=emptyfields&username=".$username);
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
    elseif($_FILES['profileImg']['error'] === 4){
        header("Location: ../register.php?error&msg=imagedoesnotexit");  
    }
    else{
        $file = $_FILES['profileImg'];
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_tmp = $file['tmp_name'];
        $file_type = $file['type'];

        $validExtension = ['jpg', 'png', 'jpeg'];
        $imageExtension = explode('.', $file_name);
        $imageExtension = strtolower(end($imageExtension));


        $sql = "SELECT username FROM customer WHERE username = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../register.php?error&msg=sqlerror");
            exit();
        }
        elseif(!in_array($imageExtension, $validExtension)){
            header("Location: ../register.php?error&msg=invalidimageextension");
        }elseif($file_size > 1000000){
                header("Location: ../register.php?error&msg=filesizeistoolarge");
         }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $rowCount = mysqli_stmt_num_rows($stmt);

            if($rowCount > 0){
                header("Location: ../register.php?error&msg=usernametaken");
                exit();
            }else{
                $newImageName = uniqid();
                $newImageName .= '.'. $imageExtension ; 
    
                move_uploaded_file($file_tmp, '../assets/img/'.$newImageName);

                $sql = "INSERT INTO customer(username, email, mobile, password, image) VALUES(?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../register.php?error&msg=sqlerror");
                        exit();
                    }
                    else{
                        $hashpass = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $mobile, $hashpass, $newImageName );
                        mysqli_stmt_execute($stmt);
                        // mysqli_stmt_store_result($stmt);  
                        header("Location: ../register.php?success=registeredsuccessfully");
                        exit();
                    }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    
}



?>