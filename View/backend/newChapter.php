<?php require_once ('View/template.php'); ?>
<?php require_once ('View/_headerA.php');?>

<h6>Ajouter chapitre</h6>

  <form action="index.php?action=newChapter" method="post">

    N° du chapitre : <input type="text" name="number_chapter" placeholder="Numéro"/>
    Titre du chapitre : <input type="text" name="title"/>
    <textarea name="contents" rows="8" cols="45">Contenu :</textarea>
    <input type="submit" value="Valider">
  </form>


