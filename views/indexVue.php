<?php
  include("template/header.php")
  ?>

	<?php
if (isset($error_message)) {
  ?>
		<p class="error-message"> <?php echo $error_message; ?></p>
	<?php

}
?>

<div id="particles-js">

<div class="container-fluid my-5">
  <h1 class="text-center">List of Books</h1>
  <div class="row">

    <div class="add m-auto text-center mb-2" data-aos="zoom-in" data-aos-duration="500">
      <a  href="book_form.php"><i class="fas fa-plus-circle fa-3x"></i></a>
    </div>

  </div>
</div>

<div class="container-fluid">
  <div class="row">
  <?php foreach ($books as $book) 
  {
    ?>

<ul class="list-unstyled m-auto index-book text-center col-sm-5 col-lg-2 col-7" data-aos="fade-right">

    <li><img class="img-fluid" src="../assets/img/<?php echo $book->getImage(); ?>" height="130"></li>
    <li>Title: <?php echo $book->getTitle(); ?></li>
    <li>Author: <?php echo $book->getAuthor(); ?></li>
    <li>Date: <?php echo $book->getDate(); ?></li>
    <li><a class="btn btn-info mb-2" href="book_detail.php?id=<?php echo $book->getId(); ?>">Details</a></li>
    <form class="delete" action="index.php" method="post">
      <input type="hidden" name="id" value="<?php echo $book->getId(); ?>"  required>
      <input class="btn btn-danger" type="submit" name="delete" value="Delete">
    </form>
  
</ul>
<?php
} 
?>
   </div>
</div>
</div>
 <?php
   include("template/footer.php")
  ?>
