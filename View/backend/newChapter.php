<?php require_once ('View/template.php'); ?>
<?php require_once ('View/_headerA.php');?>

<h6>Ajouter chapitre</h6>
<br />
  <form action="index.php?action=addChapter" method="post" enctype="multipart/form-data">

    N° du chapitre : <input type="text" name="chapter_number" placeholder="Numéro"/>
    Titre du chapitre : <input type="text" name="title" />
    <br />
    <br />
      <input type="file" name="picture" id="img" class="form-control-file">

      <br />
      <br />
    <textarea id="textarea" name="contents" placeholder="Contenu" rows="8" cols="45"></textarea>
    <br />
    <input class="btn btn-info" type="submit" value="Valider">
  </form>


