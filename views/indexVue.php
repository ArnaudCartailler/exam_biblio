<?php
  include("template/header.php")
  ?>

<div class="container-fluid my-5">
  <div class="row">

    <div class="add m-auto text-center mb-2" data-aos="zoom-in" data-aos-duration="500">
      <a  href="book_form.php"><i class="fas fa-plus-circle fa-3x"></i></a>
    </div>

  </div>
</div>


  <div class="row">
  <?php foreach ($books as $book) 
  {
    ?>

    <ul class="list-unstyled m-5">
      <li>Title: <?php echo $book->getTitle(); ?></li>
      <li>Author: <?php echo $book->getAuthor(); ?></li>
      <li>Available: <?php echo $book->getAvailable(); ?></li>
      <li><a class="btn btn-info mb-2" href="details.php?id=<?php echo $book->getId(); ?>">Details</a></li>
      <li><a class="btn btn-danger" href="index.php?remove=<?php echo $book->getId(); ?>">Delete</a></li>

    </ul>

<?php
} 
?>
   </div>

 <?php
   include("template/footer.php")
  ?>
