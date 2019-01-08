<?php
include("template/header.php")
?>

<form class="add_book" id="FormInfo" action="index.php" method="post">
  <div class="form-row">
    <div class="select-category">
      <label for="inlineFormCustomSelect">Category</label>
            <select class="category" name="category" required>
                        <option value="" disabled>Choose the category</option>
                        
                        <?php 
                        // Je boucle sur tous les différents comptes possible à créer
                            foreach ($categories as $category) 
                            {
                        ?>
                            <option value="<?php echo $category->getName(); ?>"><?php echo $category->getName(); ?></option>
                        <?php 
            }
            ?>
                    </select>
    </div>
  </div>
        <div class="form-row">
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
            <button name="add_book" type="submit" class="btn btn-primary">Add book</button>
        </form>

   <?php
    include("template/footer.php")
    ?>