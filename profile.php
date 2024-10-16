<?php
 require_once "include/header.php";

 require_once "include/main.php";

//  require_once "include/register_inc.php";


 
?>
<?php
if (isset($_SESSION['sessionId']) && isset($_SESSION['sessionemail'])){


$sessionEmail = $_SESSION['sessionemail']; // or use sessionId if you prefer

// Fetch the customer data (including image) using the session email
$fetch = "SELECT * FROM customer WHERE email = ?";
$stmt = mysqli_stmt_init($conn);

if (mysqli_stmt_prepare($stmt, $fetch)) {
    mysqli_stmt_bind_param($stmt, "s", $sessionEmail); // "s" for string
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if we got a result
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $imagePath = $data['image']; // Assuming `image` stores the image path
    } else {
        // Fallback image if no profile image is found
         $imagePath = 'https://i.imgur.com/bDLhJiP.jpg'; // Default image
    }
} else {
    // Handle query preparation error
    echo "Query Error";
    $imagePath = 'https://i.imgur.com/bDLhJiP.jpg'; // Default image
}
?>




<?php
    // if(isset($_POST['uploadimage'])){
       

    //     $file = $_FILES['profile'];
    //     $file_name = $file['name'];
    //     $file_size = $file['size'];
    //     $file_tmp = $file['tmp_name'];
    //     $file_type = $file['type'];

    //     $destiny = "assets/img/". $file_name;
    //     $insrt = "INSERT INTO `customer` (`image`) VALUES('$file_name') ";

    //     $query = mysqli_query($conn, $insrt);
    //     // $check = $conn->query($insrt);
    //     // if($check->num_rows > 0){
    //     //     echo "query error";
    //     // }

    //     if(move_uploaded_file($file_tmp, $destiny)){
    //         echo "File Uploaded Successfully";
    //     }else{
    //         echo "File Not Uploaded ";
    //     }
    // }


?>

<div class="container mt-5">
    
    <div class="row d-flex justify-content-center ">
        
        <div class="col-md-7 border-start border-primary border-5 rounded">
            
            <div class="card p-3 py-4">

                <?php 
                
                // $fetch = "SELECT * FROM `customer` ";
                // $result = mysqli_query($conn, $fetch);
                // while($data = mysqli_fetch_assoc($result)){
                //     echo $data['username'];
                // }
               
            ?> 
                <div class="text-center">
                    <img src="assets/img/<?php echo $imagePath; ?>" width="100" class="rounded-circle">
                    <!-- <img src="https://i.imgur.com/bDLhJiP.jpg" width="100" class="rounded-circle"> -->
                </div>

                <!-- <form action="" method="POST" enctype="multipart/form-data" class="mx-3 text-center d-flex flex-column justify-content-center align-items-center">
                    <input type="file" name="profile" id="" class="fs-6  ">
                    <input type="submit" name="uploadimage" class="btn btn-sm btn-success">
                </form> -->
                <?php    ?>
                <div class="text-center mt-3">
                    <span class="bg-warning p-1 px-4 rounded ">Pro</span>
                    <h5 class="mt-2 mb-0">
                    <?php echo  $_SESSION['sessionUser'] ?>
                    </h5>
                    <span>
                    <?php echo  $_SESSION['sessionemail'] ?>
                    </span>
                    
                    <div class="px-4 mt-1">
                        <p class="fonts">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    
                    </div>
                    
                     <ul class="social-list list-inline fs-5 text-primary">
                        <li class="list-inline-item"><i class="fa fa-facebook"></i></li>
                        <li class="list-inline-item"><i class="fa fa-dribbble"></i></li>
                        <li class="list-inline-item"><i class="fa fa-instagram"></i></li>
                        <li class="list-inline-item"><i class="fa fa-linkedin"></i></li>
                        <li class="list-inline-item"><i class="fa fa-google"></i></li>
                    </ul>
                    
                    <div class="buttons">
        
                        <button class="btn btn-outline-primary px-4">Contact</button>
                        <a href="logout.php" class="btn  btn-primary px-4 ms-3">Log Out</a>

                        <!-- <button class="btn btn-outline-info px-4">Message</button> -->
                    </div>
                    
                    
                </div>
                
               
                
                
            </div>
            
        </div>
        
    </div>
    
</div>

<?php

}
else{
    // echo " <strong> Home  </strong>";
    echo "<div class='alert alert-danger fw-bold alert-dismissible fade show ' role='alert'> You are not Logged In  
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
}

 require_once "include/footer.php";

?>