  <?php
    include("template/header.php")
?>

<div id="particles-js">

<div class="container-fluid detail-user">
  <div class="row">

        <ul class="mt-5 detail">
            <li>Firstname: <?php echo $user->getFirstname(); ?></li>
            <li>Lastname: <?php echo $user->getLastname(); ?></li>
            <li>Identifiant: <?php echo $user->getIdentifiant(); ?></li>
            <li>Borrowed: <?php echo $user->getBorrowed(); ?></li>
            <li>Listing: <?php echo $user->getListing(); ?></li>
        </ul>

   </div>
</div>

<form class="user_book" action="user_detail.php" method="post" enctype="multipart/form-data">
    <div class="form-row ml-5 m-2 w-50">
        <div class="form-group">
                <label for="inputtext">Firstname</label>
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname" required />
            </div>
        <div class="form-group col-md-6">
            <label for="inputtext">Lastname</label>
            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname" required />
        </div>
    </div>
        <input type="hidden" name="id" value="<?php echo $user->getId(); ?>">
        <button type="submit" class="btn btn-primary" name="update_user">Modify</button>
    </form>

</div>


 <?php
include("template/footer.php")
?>