<div class="container py-5">

    <div class="row mb-4">
        <div class="col">
            <h1>Gestion des utilisateurs</h1>
        </div>
        <div class="col-auto">
            <a href="/?page=add-user" class="btn btn-primary">Créer un utilisateur</a>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Prénom</th>
                        <th>NOM</th>
                        <th>Email</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['user_id'] ?></td>
                            <td><?= $user['user_firstname'] ?></td>
                            <td><?= $user['user_lastname'] ?></td>
                            <td><?= $user['user_email'] ?></td>
                            <td>
                                <a href="/?page=edit-user&id=<?= $user['user_id'] ?>" class="btn btn-default">Modifier</a>
                            </td>
                            <td>
                                <form action="/?page=delete-user" method="POST" onsubmit="return confirm('Are you sure ?')">
                                    <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>" />
                                    <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php if(empty($users)): ?>
                    <tr>
                        <td colspan="5" class="text-center">Aucun utilisateur présent dans la base de données</td>
                    </tr>
                    <?php endif; ?>
                </tbody>

            </table>
        </div>
    </div>

</div>