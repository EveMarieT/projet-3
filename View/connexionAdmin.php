<?php require('template.php'); ?>
<?php require('_header.php'); ?>


<?php  if (isset($error) && true == $error) : ?>
    <div class="alert alert-danger col-md-10" role="alert">
        <p class="error">Vérifier votre identifiant et votre mot de passe</p>
    </div>
<?php endif; ?>


<form method="post" action="index.php?action=login">


    <div class="form-group col-md-6">
        <label for="formLoginPseudo">Identifiant :</label>
        <input type="text" id="formLoginPseudo" class="form-control" placeholder="Entrer votre identifiant"
               name="name">
    </div>
    <div class="form-group col-md-6">
        <label for="formLoginMdp">Mot de passe :</label>
        <input type="password" class="form-control" id="formLoginMdp"  placeholder="Entrer votre mot de passe"
               name="mdp" <?php if (isset($mdp)) { ?> value="<?= $mdp ?>" <?php } ?>>
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php require('_footer.php'); ?>

