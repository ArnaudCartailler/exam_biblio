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

if (isset($_POST['add_book'])) {
    
    if (!empty($_POST['category'])) {
        
        $category = htmlspecialchars($_POST['category']);
        
        if (!empty($_POST['title'])) {

            $title = htmlspecialchars($_POST['title']);
            
            if (!empty($_POST['author'])) {
                $author = htmlspecialchars($_POST['author']);

                if ($_POST['summary']) {
                    
                    $summary = htmlspecialchars($_POST['summary']);

                    if (isset($_FILES['image'])) {

                        $image = $_FILES['image']['name'];
                        
                        $BookManager = new BookManager($db);

                            $newBook = new Book([
                                'category' => $category,
                                'title' => $title,
                                'author' => $author,
                                'date' => $_POST['date'],
                                'summary' => $summary,
                                'available' => 1,
                                'idCategories' => $category,
                                'image' => $image,
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