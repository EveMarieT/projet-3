<?php require_once ('View/template.php'); ?>
<?php require_once ('View/_headerA.php');?>

<div class="card">
    <div class="card-body">
        Modifier chapitre
    </div>
</div>


<form action="index.php?action=update&id=<?= $chapter['id']; ?>" method="post">

    <input type="hidden" name="values[id]" value="<?= $chapter['id']; ?>"/>
    <div class="form-group">
        <label for="text">N° du chapitre : </label><br/>
        <input type="text" class="text-center col-md-1" name="chapter_number" placeholder="Numéro"
               value="<?= $chapter['chapter_number']; ?>"/><br/>
    </div>
    <div class="form-group">
        <label for="text">Titre du chapitre : </label><br/>
        <input type="text" class="col-md-4" name="title" value="<?= $chapter['title']; ?>"/><br/>
    </div>
    <div class="form-group">
        <label for="text">Modifier la photo :</label>
        <input required type="text" class="form-control col-md-6" name="picture" value="<?= $chapter['picture'];?>">
    </div>
    <br/>
    <div class="form-group">
        <label for="textarea">Contenu : </label>
        <textarea id="textarea" name="contents" rows="8" cols="45" value="">
          <?= $chapter['contents']; ?>
    </textarea>
    </div>

    <input class="btn btn-info" type="submit" value="Valider">
</form>



