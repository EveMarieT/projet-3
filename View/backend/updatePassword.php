<?php require('View/template.php'); ?>
<?php require('View/_headerA.php'); ?>


<?php if (isset($msg)) : ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"><?= $msg ?></h4>
        <p>Votre nouveau mot de passe a bien été pris en compte,<br />
            vous pouvez dès à présent vous connecter avec votre nouveau mot de passe </p>
    </div>

<?php endif; ?>
<?php if (isset($error)) : ?>
    <div class="alert alert-danger" role="alert">
        <p class="error"><?= $error ?></p>
    </div>
<?php endif; ?>

<form method="post" action="index.php?action=updatePassword">
    <div class="form-group">
        <label for="formLoginPseudo">Mot de passe actuel : </label>
        <input required id="formLoginPseudo" type="password" placeholder="Mot de passe actuel"
               name="currentPassword" >
    </div>
    <div class="form-group">
        <label for="formLoginMdp">Nouveau mot de passe : </label>
        <input required id="formLoginMdp" type="password" placeholder="Votre mot de passe"
               name="newPassword">
    </div>
    <div class="form-group">
        <label for="formLoginMdp">Confirmation nouveau mot de passe : </label>
        <input required id="formLoginMdp" type="password" placeholder="Votre mot de passe"
               name="confirmedNewPassword">
    </div>

    <button type="submit" class="btn btn-info">Valider</button>
</form>

<?php require('View/_footer.php'); ?>





