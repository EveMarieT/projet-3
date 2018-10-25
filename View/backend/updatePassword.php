<?php require('View/template.php'); ?>
<?php require('View/_header.php'); ?>


<?php if (isset($error)) : ?>
    <p class="error"><?= $error ?></p>
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

    <button type="submit" class="btn btn-default">Valider</button>
</form>

<?php require('View/_footer.php'); ?>

