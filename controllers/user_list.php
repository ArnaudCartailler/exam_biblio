<?php

// Save our autoload.
function chargerClasse($classname)

{
    if (file_exists('../models/' . $classname . '.php')) {

        require '../models/' . $classname . '.php';

    } else {
        require '../entities/' . $classname . '.php';
    }
}

spl_autoload_register('chargerClasse');

$db = Database::DB();

session_start();
// On instancie nos managers

$UserManager = new UserManager($db);

if(empty($_SESSION['user'])){

    header('location: login.php');

} elseif(isset($_POST['logout']))
{

    session_destroy();

    header('location: login.php');

    exit();
}

if(isset($_POST['delete'])) {

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        
        $id = (int)$_POST['id'];
        
		// On le supprime en BDD
        $UserManager->delete($id);

    } else {

        $error_message = "Choose a user to delete";
    }
}

$users = $UserManager->getUsers();

include "../views/user_listVue.php";