<?php require('template.php'); ?>
<?php require('_header.php');?>

<section class="allChapters">
    <div class="row">
        <?php foreach ($chapters as $chapter):?>
            <div class="card-deck col-sm-4">
                <div class="card">
                    <img class="card-img-top img-fluid" src="<?= $chapter->getPicture();?>" class="img-responsive" alt="Alaska" title="<?= $chapter->getTitle();?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $chapter->getTitle();?></h5>
                        <p class="card-text"><?= substr($chapter->getContents(),0,250);?></p>
                        <a href="index.php?action=chapter&id=<?= $chapter->getId();?>" class="btn btn-primary">Lire la suite</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</section
<nav>
    <ul class="pagination justify-content-center">
        <?php for($i = 1; $i <= $nbOfPages ; $i++) : ?>
        <li class="page-item"><a class="page-link" href="index.php?action=allChapters&page=<?= $i ?>"><?= $i ?></a></li>
        <?php endfor; ?>
    </ul>
</nav>

<?php require('_footer.php');?>
