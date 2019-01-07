<?php
include("template/header.php")
?>

<div class="container-fluid mt-5 w-50">
  <form action="login.php" method="post">
    <div class="form-group">
        <label for="inputUsername">Username</label>
        <input name="username" type="text" class="form-control" id="inputUsername" aria-describedby="userHelp" placeholder="Enter username">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
      <button name="login" type="submit" class="btn btn-primary">Submit</button>
  </form>
    <a href="signup.php">No account ? Click here !</a>
</div>

 <?php
include("template/footer.php")
?>