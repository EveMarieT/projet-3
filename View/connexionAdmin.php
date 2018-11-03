<?php require('template.php'); ?>
<?php require('_header.php'); ?>


<?php if ($error = true) : ?>
    <div class="alert alert-danger" role="alert">
        <p class="error">Vérifier votre identifiant et votre mot de passe</p>
    </div>
<?php endif; ?>
<form method="post" action="index.php?action=login">
    <div class="form-group">
        <label for="formLoginPseudo">Identifiant : </label>
        <input id="formLoginPseudo" type="text" placeholder="Votre identifiant"
               name="pseudo" <?php if (isset($pseudo)) { ?> value="<?= $pseudo ?>" <?php } ?>>
    </div>
    <div class="form-group">
        <label for="formLoginMdp">Mot de passe : </label>
        <input id="formLoginMdp" type="password" placeholder="Votre mot de passe"
               name="mdp" <?php if (isset($mdp)) { ?> value="<?= $mdp ?>" <?php } ?>>
    </div>

    <button type="submit" class="btn btn-default">Se connecter</button>
</form>

<?php require('_footer.php'); ?>

