  <?php
    include("template/header.php")
    ?>

<div id="particles-js">

  <div class="container-fluid my-5">
      <h1 class="text-center">List of the users</h1>
  
  <div class="row">
    <div class="add m-auto text-center mb-2" data-aos="zoom-in" data-aos-duration="500">
      <a  href="user_form.php"><i class="fas fa-plus-circle fa-3x"></i></a>
    </div>

  </div>
</div>


  <div class="row">
  <?php foreach ($users as $user) {
    ?>

<ul class="list-unstyled m-auto index-book text-center col-sm-3 col-lg-2 col-7" data-aos="fade-right">
  <li>Firstname: <?php echo $user->getFirstname(); ?></li>
  <li>Lastname: <?php echo $user->getLastname(); ?></li>
  <li>Identifiant: <?php echo $user->getIdentifiant(); ?></li>
  <li>Borrowed: <?php echo $user->getBorrowed(); ?></li>
  <li><a class="btn btn-info mb-2" href="user_detail.php?id=<?php echo $user->getId(); ?>">Details</a></li>
    <form class="delete" action="user_list.php" method="post">
      <input type="hidden" name="id" value="<?php echo $user->getId(); ?>"  required>
      <input class="btn btn-danger" type="submit" name="delete" value="Delete">
    </form>
  
    </ul>
<?php

}
?>
   </div>
</div>

  <?php
    include("template/footer.php")
    ?>
