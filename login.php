<?php
 require_once "include/header.php";

 require_once "include/main.php";
 ?>

<h1 class="text-center pt-2"> Login Form </h1>
<div class="container ">
<form class="bg-info p-5 shadow m-5 mt-3 pb-5 rounded">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" name="email" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  
  <div class="pb-4">
      <button type="submit" class="btn btn-primary px-5 fs-5 float-end ">Submit</button>
  </div>
</form>
</div>


<?php
 require_once "include/footer.php";

?>
