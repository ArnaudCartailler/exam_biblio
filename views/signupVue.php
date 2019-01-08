<?php
include("template/header.php")
?>


<div class="container-fluid mt-5 w-50">
  <form action="signup.php" method="post">
    <div class="form-group">
        <label for="inputUsername">Username</label>
        <input type="text" name="username" class="form-control" id="inputUsername" aria-describedby="userHelp" placeholder="Enter username">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="pass1" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
     <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input name="pass2" type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password">
    </div>
      <button name="new" type="submit" class="btn btn-primary">Submit</button>
  </form>
    <a class="account" href="login.php" >Already an account ? Click here !</a>
</div>


 <?php
include("template/footer.php")
?>
