<?php require('template.php'); ?>
<?php require('_header.php');?>

<section class="allChapters">
    <div class="row">
        <?php foreach ($chapters as $chapter):?>
            <div class="card-deck col-sm-4">
                <div class="card">
                    <img class="card-img-top" src="<?= $chapter->getPicture();?>" class="img-responsive" alt="Alaska" title="<?= $chapter->getTitle();?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $chapter->getTitle();?></h5>
                        <p class="card-text"><?= var_export(substr($chapter->getContents(),0,250), true);?></p>
                        <a href="index.php?action=chapter&id=<?= $chapter->getId();?>" class="btn btn-primary">Lire la suite</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</section
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="index.php?action=allChapters&page=<?= $page - 1;?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="index.php?action=allChapters&page=<?= $page - 1;?>">1</a></li>
        <li class="page-item"><a class="page-link" href="index.php?action=allChapters&page=<?= $page + 1;?>">2</a></li>
        <li class="page-item"><a class="page-link" href="index.php?action=allChapters&page=<?= $page + 2;?>">3</a></li>
        <li class="page-item">
            <a class="page-link" href="index.php?action=allChapters&page=<?= $page + 1;?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>

<?php require('_footer.php');?>
