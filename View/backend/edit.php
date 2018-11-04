<?php require_once ('View/template.php'); ?>
<?php require_once ('View/_headerA.php');?>


<input class="form-control form-control-lg-success" type="text" placeholder="Modifier chapitre">
<br />
<form action="index.php?action=update&id=<?= $chapter['id'];?>" method="post">
    <input type="hidden" name="values[id]" value="<?= $chapter['id'];?>"/>

    N° du chapitre :
    <input type="text" name="chapter_number" placeholder="Numéro" value="<?= $chapter['chapter_number'];?>"  />
    Titre du chapitre :
    <input type="text" name="title" value="<?= $chapter['title'];?>" />
    <br />
    <br />
    <textarea id="textarea" name="contents" rows="8" cols="45" value="" >
      <?= $chapter['contents'];?>
    </textarea>
    <br />
    <input class="btn btn-info" type="submit" value="Valider">
</form>



