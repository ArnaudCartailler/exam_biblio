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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>

<div class="container-fluid">

    <div class ="row text-center mt-3 border-bottom border-dark">

 <?php

  //If the user is in the database he see this 
if (!empty($_SESSION['id']) and $_SESSION['admin'] == 0) 
{
  echo '<div class="m-auto index">
            <p>My library</p>
        </div>';

} else if (!empty($_SESSION['id']) and $_SESSION['admin'] == 1) 
{
            //If the user is in the database and he is an admin he see this 
  echo '<div class="col-md-3">
            <a href="index.php">Home</a>
          </div>';
  echo '<div class="col-md-3">
          <a href="profil.php">Change profil</a>
          </div>';
  echo '<div class="col-md-3">
          <a href="adminpage.php">Admin page</a>
          </div>';
  echo '<div class="col-md-3 disconnect">
            <a href="deco.php">Disconnect</a>
          </div>';

} else 
{
          //If it's an anonymous 
  echo '<div class="m-auto index">

            <p>My library</p>

        </div>';
}
?>

  </div>

</div>