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
        <div class="row">
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">Jean Forteroche</strong>

                        <div class="mb-1 text-muted small">L'auteur</div>
                        <p class="card-text mb-auto">J'ai eu l'envie de </p>
                        <a class="btn btn-outline-primary btn-sm" role="button" href="index.php?action=contact">Comment me contacter</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="//placeimg.com/250/250/arch" style="width: 200px; height: 250px;">
                </div>
            </div>
        </div>
    </aside>
</section>




<?php require('_footer.php');?>



