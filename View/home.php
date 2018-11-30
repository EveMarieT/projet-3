<?php require_once('template.php'); ?>
<?php require_once('_header.php'); ?>

<section class="home">
    <div class="media">
        <img class="align-self-center mr-3 w-25 p-3" src="Assets/images/jean.jpg" alt="Generic placeholder image">
        <div class="media-body align-self-center">
            <h5 class="mt-0">Jean Forteroche</h5>
            <p>J'ai eu l'envie de partager avec vous mon nouveau roman d'une manière inhabituelle
                pour moi,<br/>
                et de créer ensemble un lien particulier avec ce roman.</p>
            <a href="index.php?action=contact" class="btn btn-primary">Où me contacter</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-deck row">
                <?php foreach ($listPosts as $post): ?>
                    <div class="card col-sm-6">
                        <img class="card-img-top img-fluid" src="<?= $post->getPicture(); ?>"
                             alt="Alaska" title="<?= $post->getTitle(); ?>">
                        <h5 class="card-title"><?= $post->getTitle(); ?></h5>
                        <p class="card-text"><?= substr(strip_tags($post->getContents()), 0, 250); ?></p>
                        <a href="index.php?action=chapter&id=<?= $post->getId(); ?>" class="btn btn-primary">Lire la
                            suite</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php require('_footer.php'); ?>



