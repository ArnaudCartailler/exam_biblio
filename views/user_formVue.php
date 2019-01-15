  <?php
    include("template/header.php")
    ?>


<div id="particles-js">

<form class="add_book ml-5" id="FormInfo" action="user_form.php" method="post" enctype="multipart/form-data">
  <div class="form-row">

        <div class="form-row">
            <div class="form-group">
                <label for="inputtext">Firstname</label>
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname" required />
            </div>
            <div class="form-group">
                <label for="inputtext">Lastname</label>
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname" required />
            </div>
        </div>
        </div>
            <button name="add_user" type="submit" class="btn btn-primary">Add user</button>
        </form>

    </div>

  <?php
    include("template/footer.php")
    ?>