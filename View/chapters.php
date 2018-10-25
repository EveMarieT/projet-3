<?php require('template.php'); ?>
<?php require('_header.php');?>

<div class="contenu">
	<div class="title">
		<?php echo $chapter['chapter_number'];?> - <?= $chapter['title'];?>
	</div>
	<img class="picture" img src="<?= $chapter['picture'];?>" alt="Alaska" title="<?= $chapter['chapter_number'];?>" />
	<section>
		<div class="story">
			<p><?= $chapter['contents'];?></p>
		</div>
	</section>
</div>

<section id="comment" class="letComment">
  <h3>Laissez un commentaire</h3>
    <form action="index.php?action=addCom&id=<?= $chapter['id'];?>" method="post">
      <label>Votre pseudo :</label> <input type="text" name="author" placeholder="Votre pseudo" required="required"/><br />
      <textarea name="comment" placeholder="Votre commentaire" required="required"></textarea>
      <input type="submit" value="Valider" name="submit_com"/>
    </form>
</section>

<div class="comments">
  <h2>Commentaires</h2>

    <?php foreach ($comments as $comment):?>

      <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
      <p><?= nl2br(htmlspecialchars($comment['comment'])) ?>
      <!-- Pour signaler mon commentaire
            Quand l'utilisateur clique sur signaler
            1/ un message de confirmation s'affiche
            2/ l'utilisateur valide ou pas la confirmation
            3 si la confirmation est validée on ajoute 1 à $alert
          -->
      <bouton class="btn btn-primary" data-toggle="modal" data-target="#signalModal" >Signaler</bouton>
        <div class="modal fade" id="signalModal" tabindex="-1" role="dialog" aria-labelledby="signalModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <bouton type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</bouton>
                <strong class="modal-title" id="signalModalLabel">Voulez-vous signaler ce commentaire ?</strong>


              </div>
              <div class="modal-body">
                <a href="index.php?action=alert&id=<?= $comment['id'];?>" class="button">Signaler</a>
              </div>
            </div>
          </div>
        </div>
      </p>

   <?php endforeach;?>



  </div>

<?php require('_footer.php');?>

