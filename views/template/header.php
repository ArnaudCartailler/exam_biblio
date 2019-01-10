<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/normalize.css">
  <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>

<div class="container-fluid">

    <div class ="row text-center head-login">

 <?php

  //If the user is in the database he see this 
if (!empty($_SESSION['user'])) 
{
            //If the user is in the database and he is an admin he see this 
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light w-100 ">
  <a class="navbar-brand" href="index.php" style="position: relative; z-index: 0">MY LIBRARY</a>
  <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <form class="collapse navbar-collapse" id="navbarNavAltMarkup" action="index.php" method="post">
    <div class="navbar-nav">
      <a class="nav-item nav-link active nav" href="index.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link nav" href="user_list.php">All users</a>
      <input class="logout" type="submit" name="logout" value="Log out">
    </div>
  </form>
</nav>

<?php

} else 
{
          //If it's an anonymous 
  echo '<div class="m-auto index">

            <p>MY LIBRARY</p>

        </div>';
}
?>

</div>