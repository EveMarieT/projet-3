<?php require_once ('View/template.php'); ?>
<?php require_once ('View/_headerA.php');?>

<div class="card">
    <div class="card-body">
        Ajouter chapitre
    </div>
</div>
<form action="index.php?action=addChapter" method="post">

    <label> N° du chapitre :</label><br />
    <input required type="text" name="chapter_number" placeholder="Numéro"/><br />
    <label>Titre du chapitre :</label><br />
    <input type="text" class="col-md-4" name="title" />
    <br />
    <br />
    <label>Ajout photo :</label><br />
    <input required type="text" class="form-control col-md-6" name="picture">

    <br />
    <br />
    <textarea id="textarea" class="form-control mceEditor" name="contents" placeholder="Contenu" rows="8" cols="45"></textarea>
    <br />
    <input class="btn btn-info" type="submit" value="Valider">
</form>

<?php require('View/_footer.php'); ?>


