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

<form class="user_book" id="FormInfo" action="book_detail.php" method="post">

    <div class="select-category col-6">
                <select class="user" name="user" required>
                            <option value="" disabled>Choose the user</option>
                            
                            <?php 
                            // Je boucle sur tous les différents comptes possible à créer
                            foreach ($users as $user) {
                                ?>
                                <option value="<?php echo $user->getId(); ?>"><?php echo $user->getName(); ?></option>
                            <?php 
                        }
                        ?>
                        </select>

        <button name="user_book" type="submit" class="btn btn-primary ml-5">User</button>
        <button name="user_return" type="submit" class="btn btn-primary ml-5">Returned</button>
    </div>

</form>

<form class="add_book" id="FormInfo" action="book_form.php" method="post">
  <div class="form-row">
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
  </div>
        <div class="form-row update-book">
            <div class="form-group">
                <label for="inputtext">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" required />
            </div>
            <div class="form-group">
                <label for="inputtext">Author</label>
                <input type="text" class="form-control" name="author" id="name" placeholder="Author" required />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="inputtext">Date</label>
                <input type="date" class="form-control" id="date" name="date" placeholder="Date" required />
            </div>
            <div class="form-group">
                <label for="inputtext">Summary</label>
                <textarea class="form-control" id="summary" name="summary" placeholder="Summary" required /></textarea>
            </div>
        </div>
        <div class="form-group">
           <label for="inputtext">Image</label>
           <input type="file" name="image" id="" placeholder="Picture" required />
       </div>
        <button name="update_book" type="submit" class="btn btn-primary">Update book</button>
        <input class="btn btn-danger" type="submit" name="delete" value="Delete">
        </form>

</div>

 <?php
include("template/footer.php")
?>
