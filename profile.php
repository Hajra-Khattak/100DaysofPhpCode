<?php
 require_once "include/header.php";

 require_once "include/main.php";


if(isset($_SESSION['sessionId'])){

?>

<div class="container mt-5">
    
    <div class="row d-flex justify-content-center ">
        
        <div class="col-md-7 border-start border-primary border-5 rounded">
            
            <div class="card p-3 py-4">
                
                <div class="text-center">
                    <img src="https://i.imgur.com/bDLhJiP.jpg" width="100" class="rounded-circle">
                </div>
                
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
                        
                        <button class="btn btn-outline-primary px-4">Message</button>
                        <button class="btn btn-primary px-4 ms-3">Contact</button>
                    </div>
                    
                    
                </div>
                
               
                
                
            </div>
            
        </div>
        
    </div>
    
</div>

<?php

}else{
    echo " <strong> Home  </strong>";
}

 require_once "include/footer.php";

?>