<?php require_once('template.php'); ?>
<?php require_once('_header.php'); ?>

<section class="home">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-deck row">
                <?php foreach ($listPosts as $post): ?>
                    <div class="card col-sm-6">
                        <img class="card-img-top img-fluid" src="<?= $post->getPicture(); ?>"
                             alt="Alaska" title="<?= $post->getTitle(); ?>">
                            <h5 class="card-title"><?= $post->getTitle(); ?></h5>
                            <p class="card-text"><?= substr($post->getContents(), 0, 250); ?></p>
                            <a href="index.php?action=chapter&id=<?= $post->getId(); ?>" class="btn btn-primary">Lire la
                                suite</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mx-auto">
                <img class="card-img-top" src="Assets/images/jean.jpg" alt="Card image">
                <div class="card-img-overlay img-rounded">
                    <h4 class="card-title">Jean Forteroche</h4>
                    <p class="card-text">J'ai eu l'envie de partager avec vous mon nouveau roman d'une manière inhabituelle
                        pour moi, et de créer ensemble un lien particulier avec ce roman</p>
                    <a href="index.php?action=contact" class="btn btn-primary">Où me contacter</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require('_footer.php'); ?>



