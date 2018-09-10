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

      <button type="submit" name="signal" onClick="ConfirmMessage()">Signaler</button>

      <script type="text/javascript">
        function ConfirmMessage() {
            if (confirm("Voulez-vous signaler ce commentaire ?")) {
                alert("Oui")
            }
            else {
                alert("Non")
             }
            }

      </script>
      </p>

   <?php endforeach;?>

  </div>

<?php require('_footer.php');?>

