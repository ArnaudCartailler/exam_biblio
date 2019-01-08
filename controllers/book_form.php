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
$ImageManager = new ImageManager($db);
$AdminManager = new AdminManager($db);

if (isset($_POST['add_book'])) {

    if (!empty($_POST['category'])) {
        $category = htmlspecialchars($_POST['category']);
    
        if (!empty($_POST['title'])) {
            $title = htmlspecialchars($_POST['title']);

            if (!empty($_POST['author'])) {
                $author = htmlspecialchars($_POST['author']);

                if (!empty($_POST['date'])) {

                    $date = htmlspecialchars($_POST['date']);

                    if ($_POST['summary']) {

                    $summary = htmlspecialchars($_POST['summary']);

                    $BookManager = new BookManager($db);

                    $newBook = new Book([
                        'category' => $category,
                        'title' => $title,
                        'author' => $author,
                        'date' => $date,
                        'summary' => $summary,
                        'available' => 1,
                        'id_users' => 0,
                    ]);

                    $addBook = $BookManager->add($newBook);

                    header('location: index.php');

                } else {
                    echo "Enter a correct title";
                }
            } else {
                echo 'Enter a valid author';
            }
        } else {
            echo "Enter a valid summary";
        }
    }
}
}

$categories = $CategoryManager->getCategories();

include "../views/book_formVue.php";