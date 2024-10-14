<?php
 require_once "include/header.php";

 require_once "include/main.php";
//  require_once "include/register_inc.php";
 ?>

<?php 


if(isset($_SESSION['sessionId'])){

    echo " <strong>" . $_SESSION['sessionUser'] . " Logged In </strong> ";


?>

<div class="container ">
    <p>Chase your Dreams and fulfill that promise you make to see yourself</p>
    <p>Your Name:  <strong> <?php echo  $_SESSION['sessionUser'] ?> </strong></p>
    <p>Your Email: <strong> <?php echo  $_SESSION['sessionemail'] ?></strong></p>

</div>


<?php

}else{
    echo " <strong> Home  </strong>";
}
 require_once "include/footer.php";

?>
