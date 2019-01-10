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

$BookManager = new BookManager($db);
$CategoryManager = new CategoryManager($db);
$AdminManager = new AdminManager($db);
$ImageManager = new ImageManager($db);

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    
    $book= $BookManager->getBook($id);

    }else
    {
        echo "You're not on the right book";
    }

$book = $BookManager->getBook($id);

include "../views/book_detailVue.php";