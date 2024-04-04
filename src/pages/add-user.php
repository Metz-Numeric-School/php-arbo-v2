<?php

# Vérification de l'envoi du formulaire
if(isset($_POST['submit']))
{
    $errors = [];

    # Vérification des champs
    if(empty($_POST['user']['user_firstname']))
        $errors['user']['user_firstname'] = "Oups i did it again.";

    if(empty($_POST['user']['user_lastname']))
        $errors['user']['user_lastname'] = "Oups i did it again.";

    if(empty($_POST['user']['user_email']) || !filter_var($_POST['user']['user_email'], FILTER_VALIDATE_EMAIL))
        $errors['user']['user_email'] = "Oups i did it again.";

    if(empty($_POST['user']['user_password']))
        $errors['user']['user_password'] = "Oups i did it again.";
    
    if(empty($errors))
    {

        # Hashage du mot de password
        $_POST['user']['user_password'] = password_hash($_POST['user']['user_password'], PASSWORD_DEFAULT);

        require '../src/data/db-connect.php';
        $query = $dbh->prepare("INSERT INTO user (user_firstname, user_lastname, user_email, user_password) VALUES (:user_firstname, :user_lastname, :user_email, :user_password)");
        $query->execute($_POST['user']);

        if(!$dbh->lastInsertId())
        {
            $errors['error'] = "Erreur lors de la création de l'utilsateur";
        }

        header('Location: /?page=users');
        exit;
    }
}