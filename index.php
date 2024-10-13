<?php
 require_once "include/header.php";

 require_once "include/main.php";
 ?>

<?php 

if(isset($_SESSION['sessionId'])){
    echo " <strong> $username is Logged In </strong> ";
}else{
    echo " <strong> Home  </strong>";
}

?>

<div class="container ">
    <p>Chase your Dreams and fulfill that promise you make to see yourself</p>
    <p>Your Name:  <strong>HAJRA KHATTAK</strong></p>
    <p>Your Email: <strong>hajraktk@gmail.com</strong></p>

</div>


<?php
 require_once "include/footer.php";

?>
