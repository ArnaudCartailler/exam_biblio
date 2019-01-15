<?php

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

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $user = $UserManager->getUser($id);

}

if (isset($_POST['update_user'])) {

    if (!empty($_POST['firstname'])) {

        $firstname = htmlspecialchars($_POST['firstname']);

        if (!empty($_POST['lastname'])) {

            $lastname = htmlspecialchars($_POST['lastname']);

                if (isset($_POST['id'])) {

                    $idUser = (int)$_POST['id'];

                            $UserManager = new UserManager($db);

                            $newUser = new User([
                                'id' => $idUser,
                                'firstname' => $firstname,
                                'lastname' => $lastname,
                            ]);

                            $addUser = $UserManager->update($newUser);

                            header('location: user_detail.php?id=' . $idUser . '');

                        } 
                    }
                }
            }

$users = $UserManager->getUsers();

include "../views/user_detailVue.php";