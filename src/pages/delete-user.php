<?php

if(!empty($_POST['user_id']))
{
    require '../src/data/db-connect.php';

    $query = $dbh->prepare("DELETE FROM user WHERE user_id = :user_id");
    $query->execute([
        'user_id' => $_POST['user_id'],
    ]);
}

header("Location: /?page=users");
exit;