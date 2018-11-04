<?php require_once('template.php');?>
<?php require_once('_header.php');?>

<section class="home">
    <article>
        <div class="container-fluid">
            <div class="row">
                <?php foreach ($listPosts as $post):?>
                <div class="card-deck">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?= $post->getPicture();?>" class=" polaroid img-responsive img-rounded" alt="Alaska" title="<?= $post->getTitle();?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post->getTitle();?></h5>
                            <p class="card-text"><?= var_export(substr($post->getContents(),0,250), true);?></p>
                            <a href="index.php?action=chapter&id=<?= $post->getId();?>" class="btn btn-primary">Lire la suite</a>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </article>
    <aside>
        <div class="card" style="width:500px">
            <img class="card-img-top" src="Assets/images/jean.jpg" alt="Card image">
            <div class="card-img-overlay">
                <h4 class="card-title">Jean Forteroche</h4>
                <p class="card-text">J'ai eu l'envie de partager avec vous mon nouveau roman d'une manière inhabituelle pour moi, et de créer ensemble un lien particulier avec ce roman</p>
                <a href="index.php?action=contact" class="btn btn-primary">Où me contacter</a>
            </div>
        </div>
    </aside>
</section>

<?php require('_footer.php');?>



