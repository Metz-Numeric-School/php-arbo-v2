<div class="container py-5">


    <div class="row mb-4">
        <div class="col">
            <h1>Modification d'un utilisateur</h1>
        </div>
        <div class="col-auto">
            <a href="/?page=users" class="btn btn-outline-secondary">Annuler</a>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <form method="POST">

                <div class="form-group mb-4">
                    <label for="">Prénom</label>
                    <input type="text" name="user[user_firstname]" id="user_firstname" placeholder="" required class="form-control" value="<?= $user['user_firstname'] ?? '' ?>">

                    <?php if (!empty($errors['user']['user_firstname'])) : ?>
                        <small class="invalid-feedback d-block">
                            <?= $errors['user']['user_firstname'] ?>
                        </small>
                    <?php endif; ?>
                </div>

                <div class="form-group mb-4">
                    <label for="">NOM</label>
                    <input type="text" name="user[user_lastname]" id="user_lastname" placeholder="" required class="form-control" value="<?= $user['user_lastname'] ?? '' ?>">

                    <?php if (!empty($errors['user']['user_lastname'])) : ?>
                        <small class="invalid-feedback d-block">
                            <?= $errors['user']['user_lastname'] ?>
                        </small>
                    <?php endif; ?>
                </div>

                <div class="form-group mb-4">
                    <label for="">Email</label>
                    <input type="text" name="user[user_email]" id="user_email" placeholder="" required class="form-control" value="<?= $user['user_email'] ?? '' ?>">

                    <?php if (!empty($errors['user']['user_email'])) : ?>
                        <small class="invalid-feedback d-block">
                            <?= $errors['user']['user_email'] ?>
                        </small>
                    <?php endif; ?>
                </div>

                <input type="submit" name="submit" class="btn btn-primary" value="Enregistrer">

            </form>
        </div>
    </div>
</div>