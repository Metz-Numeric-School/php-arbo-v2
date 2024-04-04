<?php

// On vérifie que l'id de l'utilisateur est bien passé dans l'URL
if(!empty($_GET['id']))
{
    require '../src/data/db-connect.php';

    // On vérifie que le formulaire de modification est envoyé
    if(isset($_POST['submit']))
    {
        // On rajoute l'id dans les données du POST
        $_POST['user']['user_id'] = $_GET['id'];

        # Vérification des champs
        if(empty($_POST['user']['user_firstname']))
            $errors['user']['user_firstname'] = "Oups i did it again.";

        if(empty($_POST['user']['user_lastname']))
            $errors['user']['user_lastname'] = "Oups i did it again.";

        if(empty($_POST['user']['user_email']) || !filter_var($_POST['user']['user_email'], FILTER_VALIDATE_EMAIL))
            $errors['user']['user_email'] = "Oups i did it again.";

        if(empty($errors))
        {

            $query = $dbh->prepare('UPDATE user SET user_firstname = :user_firstname, user_lastname = :user_lastname, user_email = :user_email WHERE user_id = :user_id');
            $query->execute($_POST['user']);

            if($query->rowCount() > 0){
                header("Location: /?page=users");
                exit;
            }
            else
            {
                $errors['error'] = "Une erreur s'est produite lors de la mise à jour.";
            }
        }
    }


    // On recupère les données (modifiable) de l'utilisateur
    $query = $dbh->prepare("SELECT user_firstname, user_lastname, user_email FROM user WHERE user_id = :user_id");
    $query->execute([
        'user_id' => $_GET['id']
    ]);
    $user = $query->fetch();

    if(!$user){
        echo "Utilisateur inexistant.";
        exit;
    }

}
else
{
    echo "Erreur : id de l'utilisateur manquant";
    exit;
}

// Et ça continue ....