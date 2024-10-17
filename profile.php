<?php
 require_once "include/header.php";

 require_once "include/main.php";



 
?>
<?php
if (isset($_SESSION['sessionId']) && isset($_SESSION['sessionemail'])){


$sessionEmail = $_SESSION['sessionemail']; // or use sessionId if you prefer


$fetch = "SELECT * FROM customer WHERE email = ?";
$stmt = mysqli_stmt_init($conn);

if (mysqli_stmt_prepare($stmt, $fetch)) {
    mysqli_stmt_bind_param($stmt, "s", $sessionEmail); 
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if we got a result
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $imagePath = $data['image']; // Assuming `image` stores the image path
    } else {
        
         $imagePath = 'https://i.imgur.com/bDLhJiP.jpg'; // Default image
    }
} else {
    
    echo "Query Error";
    $imagePath = 'https://i.imgur.com/bDLhJiP.jpg'; // Default image
}
?>



<div class="container mt-5">
    
    <div class="row d-flex justify-content-center ">
        
        <div class="col-md-7 border-start border-primary border-5 rounded">
            
            <div class="card p-3 py-4">

          
                <div class="text-center">
                    <?php 
                        if($imagePath){
                    ?>
                    <img src="assets/img/<?php echo $imagePath; ?>" width="100" class="rounded-circle">
                    <?php 
                        }else{ 
                    ?>
                    <img src="https://i.imgur.com/bDLhJiP.jpg" width="100" class="rounded-circle">
                     <?php }  ?>
                </div>

              
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

                    </div>
                    
                    
                </div>
                
               
                
                
            </div>
            
        </div>
        
    </div>
    
</div>

<?php

}
else{
    echo "<div class='alert alert-danger fw-bold alert-dismissible fade show ' role='alert'> Login or Register yourself First  
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
}

 require_once "include/footer.php";

?>