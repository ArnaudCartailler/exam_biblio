<?php
include("template/header.php")
?>

<div id="particles-js">

<div class="container-fluid detail-book">
  <div class="row">

        <ul class="mt-5 detail">
            <li><img src="../assets/img/<?php echo $book->getImage(); ?>" height="150"></li>
            <li>Title: <?php echo $book->getTitle(); ?></li>
            <li>Author: <?php echo $book->getAuthor(); ?></li>
            <li>Date: <?php echo $book->getDate(); ?></li>
            <li>Summary: <?php echo $book->getSummary(); ?></li>
            <li>Category: <?php echo $book->getIdcategories(); ?></li>
        </ul>

   </div>
</div>

<form class="index-book w-100" id="FormInfo" action="book_detail.php" method="post">

    <div class="select-category col-6">
                <select class="user" name="user" required>
                            <option value="" disabled>Choose the user</option>
                            
                            <?php 
                            // Je boucle sur tous les différents comptes possible à créer
                            foreach ($users as $user) {
                                ?>
                                <option value="<?php echo $user->getId(); ?>"><?php echo $user->getFirstname(); ?></option>
                            <?php 
                        }
                        ?>
                        </select>

        <button name="user_borrow" type="submit" class="btn btn-primary ml-5">User</button>
        <button name="user_return" type="submit" class="btn btn-primary ml-5">Returned</button>
    </div>

</form>

<form class="user_book" action="book_detail.php" method="post" enctype="multipart/form-data">
     <div class="select-category">
      <label for="inlineFormCustomSelect">Category</label>
            <select class="category" name="category" required>
                        <option value="" disabled>Choose the category</option>
                        
                        <?php 
                        // Je boucle sur tous les différents comptes possible à créer
                        foreach ($categories as $category) {
                            ?>
                            <option value="<?php echo $category->getId(); ?>"><?php echo $category->getName(); ?></option>
                        <?php 
                    }
                    ?>
                    </select>
    </div>
    <div class="form-row ml-5 m-2 w-50">
        <div class="form-group">
                <label for="inputtext">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" required />
            </div>
        <div class="form-group col-md-6">
            <label for="inputtext">Author</label>
            <input type="text" class="form-control" name="author" id="author" placeholder="Author" required />
        </div>
    </div>
    <div class="form-row ml-5 m-2  w-50">
        <div class="form-group col-md-6">
            <label for="inputtext">Date</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Date" required />
        </div>
        <div class="form-group col-md-6">
            <label for="inputtext">Summary</label>
            <textarea class="form-control" id="summary" name="summary" placeholder="Summary" required /></textarea>
        </div>
         <div class="form-group">
                <label for="inputtext">Image</label>
                <input type="file" name="image" id="" placeholder="Picture" required />
            </div>
         <input type="hidden" name="id" value="<?php echo $book->getId(); ?>">
    </div>
        <button type="submit" class="btn btn-primary" name="update">Modify</button>
    </form>
            <form class="delete" action="book_detail.php" method="post">
               <input type="hidden" name="id" value="<?php echo $book->getId(); ?>"  required>
               <input class="btn btn-danger" type="submit" name="delete" value="Delete">
           </form>


</div>

 <?php
include("template/footer.php")
?>
