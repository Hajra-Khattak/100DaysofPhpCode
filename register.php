<?php
 require_once "include/header.php";

 require_once "include/main.php";

//  if($_SERVER['REQUEST_METHOD'] == "POST"){
//   echo $_POST['username'];
//   echo $_POST['password'];
// }

 ?>

<h1 class="text-center pt-2"> Register Form </h1>
<div class="container ">
<?php 
    if(isset($_GET["error"])){
      $id = $_GET["error"];
      $message = $_GET["msg"];
      echo "<div id='$id' class='alert alert-danger fw-bold alert-dismissible fade show ' role='alert'> $message 
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div> ";
    }

  ?>
<form class="bg-info p-5 shadow m-5 mt-3 pb-5 rounded" action="include/register_inc.php" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="yourname" class="form-label">Name</label>
    <input type="text" name="username" class="form-control" id="yourname">
  </div>
  <!-- <div class="mb-3">
    <label for="class" class="form-label">Class</label>
    <input type="text" name="class" class="form-control" id="class" >
  </div> -->
  <div class="mb-3">
    <label for="phone" class="form-label">Mobile Number</label>
    <input type="text" name="mob-num" class="form-control" id="phone" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="useremail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp"  class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="confirmpass" class="form-label">Confirm Password</label>
    <input type="password" name="confirmpassword" class="form-control" id="confirmpass">
  </div>
  <div class="mb-3">
    <label for="imageprofile" class="form-label">Profile Image</label>
    <input type="file" name="profileImg" class="form-control" id="imageprofile" >
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <div class="pb-4">
      <button type="submit" name="submit" class="btn btn-primary px-5 fs-5 float-end ">Submit</button>
  </div>
</form>
</div>


<?php
 require_once "include/footer.php";

?>
