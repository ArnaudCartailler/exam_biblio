<?php


// Save our autoload.
function chargerClasse($classname)

{
    if (file_exists('../models/' . $classname . '.php')) 
    {

        require '../models/' . $classname . '.php';

    } else 

    {
        require '../entities/' . $classname . '.php';
    }
}

spl_autoload_register('chargerClasse');

$db = Database::DB();

session_start();
// On instancie nos managers

$BookManager = new BookManager($db);
$CategoryManager = new CategoryManager($db);
$ImageManager = new ImageManager($db);
$AdminManager = new AdminManager($db);

include "../views/indexVue.php";
