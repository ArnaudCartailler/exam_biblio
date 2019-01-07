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

$manager = new AdminManager($db);

$message = false;

if (isset($_POST['login'])) 
{
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    
    // checking isset email
    if (!$manager->checkIfExist($username)) 
    {
        $message = "Mauvais identifiant ou mot de passe !";
    } else 
    {
        $admin = $manager->getAdmin($username);
        // Compare dbPassword and postPassword
        $isPasswordCorrect = password_verify($password, $admin->getPassword());
        
        //if everything is okay we can connect the user and redirect him to his main account page
        if ($isPasswordCorrect) 
        {
            session_start();
            
            $_SESSION['user'] = $admin;
            
            header('Location: index.php');

        } else 
        {
            $message = "Mauvais identifiant ou mot de passe !";
        }
    }
} 

include "../views/loginVue.php";
