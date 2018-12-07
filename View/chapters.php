<?php require('template.php'); ?>
<?php require('_header.php');?>



<div class="contenu">
    <div class="title">
        <input class="form-control form-control-lg-success" type="text" placeholder="<?= $chapter['chapter_number'];?> - <?= $chapter['title'];?>">
    </div>
    <?php if( !empty($chapter['picture'])): ?>
    <img src="<?= $chapter['picture'];?>" class="mx-4 img-thumbnail rounded float-left img-fluid"  alt="Responsive image" title="<?= $chapter['title'];?>" />
    <?php endif; ?>
    <article>
        <div class="story">
            <p><?= $chapter['contents'];?></p>
        </div>
    </article>
</div>
<button type="button" class="btn btn-light btn-lg btn-block"><a href="index.php?action=allChapters" role="button" aria-pressed="true">Retour aux chapitres</a></button>





<section id="comment" class="letComment">
    <h3>Laissez un commentaire</h3>
    <form action="index.php?action=addCom&id=<?= $chapter['id'];?>" method="post">
        <form class="dropdown-menu p-4">
            <div class="form-group">
                <label for="pseudo">Votre pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="author" placeholder="votre pseudo" required="required">
            </div>
            <div class="form-group">
                <label for="comment">Votre commentaire</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Votre commentaire" required="required"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" value="Valider" name="submit_com">Valider</button>
        </form>

</section>


<div class="comments">

    <h2>Commentaires</h2>

    <?php foreach ($comments as $comment):?>

        <dt class="col-sm-3"><p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p></dt>
        <dd class="col-sm-9">
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        </dd>
        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#signalModal<?= $comment['id']; ?>" >Signaler</button>

        <div class="modal fade" id="signalModal<?= $comment['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="signalModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <strong class="modal-title" id="signalModalLabel">Voulez-vous signaler ce commentaire ?</strong>
                    </div>
                    <div class="modal-body">
                        <a href="index.php?action=alert&id=<?= $comment['id'];?>" class="button">Signaler</a>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach;?>
</div>



<?php require('_footer.php');?>

