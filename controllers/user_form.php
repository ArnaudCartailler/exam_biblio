<?php

// Save our autoload.
function chargerClasse($classname)

{
    if (file_exists('../models/' . $classname . '.php')) {

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

$UserManager = new UserManager($db);

$bytes = random_bytes(4);
$token = bin2hex($bytes);

if (isset($_POST['add_user'])) 
{
    if (isset($_POST['firstname'])) 
    {
        $firstname = htmlspecialchars($_POST['firstname']);

            if (isset($_POST['lastname']))
            {
                $lastname = htmlspecialchars($_POST['lastname']);

                    $newUser = new User([
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'identifiant' => $token,
                        'borrowed' => 0,
                        'listing' => '',
                    ]);

                    $addUser = $UserManager->add($newUser);

            header('location: user_list.php');
        }
    }
}   

$users = $UserManager->getUsers();

include "../views/user_formVue.php";