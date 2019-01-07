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

$bytes = random_bytes(4);
$token = bin2hex($bytes);

if (isset($_POST['new'])) 
{
    if (!empty($_POST['username'])) 
    {
        $username = htmlspecialchars($_POST['username']);

        if (!empty(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))) 
        {
            $email = htmlspecialchars($_POST['email']);

                if (!empty($_POST['pass1']) AND !empty($_POST['pass2'])) 
                {
                    if ($_POST['pass1'] == $_POST['pass2']){

                        $password = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
                    }
                                $AdminManager = new AdminManager($db);

                                $newAdmin = new Admin([
                                    'username' => $username,
                                    'email' => $email,
                                    'password' => $password,
                                ]);

                                $addAdmin = $AdminManager->addAdmin($newAdmin);
                                
                                header('location: login.php');

                                }else{
                                    echo "Passwords are not the same";
                                }
                            }else
                            {
                                echo 'Enter a valid email';
                            }
                        }else
                        {
                            echo "Enter a valid username";
                        }
                    }

include "../views/signupVue.php";
