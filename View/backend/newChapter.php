<?php require_once ('View/template.php'); ?>
<?php require_once ('View/_headerA.php');?>

<h6>Ajouter chapitre</h6>
<br />
<form action="index.php?action=addChapter" method="post">

    <label> N° du chapitre :</label>
    <input type="text" name="chapter_number" placeholder="Numéro"/>
    <label>Titre du chapitre :</label>
    <input type="text" name="title" />
    <br />
    <br />
    <label>Ajout photo :</label>
    <label for="picture">Lien de l'image: doit être de type Assets/imges/alaska_chpx.jpg ; x étant un chiffre</label>
    <input type="text" class="form-control" name="picture">

    <br />
    <br />
    <textarea id="textarea" class="form-control mceEditor" name="contents" placeholder="Contenu" rows="8" cols="45"></textarea>
    <br />
    <input class="btn btn-info" type="submit" value="Valider">
</form>


