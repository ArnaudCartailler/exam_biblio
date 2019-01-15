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
$UserManager = new UserManager($db);

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    
    $book = $BookManager->getBook($id);
    $category = $CategoryManager->getCategories();

    }

if (isset($_POST['update'])) {

    if (!empty($_POST['category'])) {

        $category = htmlspecialchars($_POST['category']);

        if (!empty($_POST['title'])) {

            $title = htmlspecialchars($_POST['title']);

            if (!empty($_POST['author'])) {

                $author = htmlspecialchars($_POST['author']);

                if (isset($_POST['id'])) {

                    $idBook = (int)$_POST['id'];

                    if ($_POST['summary']) {

                        $summary = htmlspecialchars($_POST['summary']);

                        if (isset($_FILES['image'])) {

                            $image = $_FILES['image']['name'];

                            $BookManager = new BookManager($db);

                            $newBook = new Book([
                                'id' => $idBook,
                                'category' => $category,
                                'title' => $title,
                                'author' => $author,
                                'date' => $_POST['date'],
                                'summary' => $summary,
                                'available' => 1,
                                'idCategories' => $category,
                                'image' => $image,
                            ]);

                            $addBook = $BookManager->update($newBook);

                            header('location: book_detail.php?id=' . $idBook . '');

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
}


if (isset($_POST['delete'])) {

    if (isset($_POST['id']) && !empty($_POST['id'])) {

        $id = (int)$_POST['id'];
        
		// On le supprime en BDD
        $BookManager->delete($id);

        header('location: index.php');
    } 
}

// if (isset($_POST['user_borrow'])) {

//     if (!empty($_POST['user'])) {

//         $user = htmlspecialchars($_POST['user']);

//             $UserManager = new UserManager($db);

//             $userBook = new User([
//                 'listing' => $id,
//             ]);
            
//             $borrowedBook = $UserManager->update($userBook);

//             var_dump($id);

//             // header('location: book_detail.php?id=' . $idBook . '');
//         }
//     }

$books = $BookManager->getBooks();
$categories = $CategoryManager->getCategories();
$users = $UserManager->getUsers();

include "../views/book_detailVue.php";