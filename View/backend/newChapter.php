<?php require_once ('View/template.php'); ?>
<?php require_once ('View/_headerA.php');?>

<h6>Ajouter chapitre</h6>

  <form action="index.php?action=addChapter" method="post">

    N° du chapitre : <input type="text" name="chapter_number" placeholder="Numéro"/>
    Titre du chapitre : <input type="text" name="title"/>
    <textarea name="contents" rows="8" cols="45">Contenu :</textarea>
    <input type="submit" value="Valider">
  </form>


