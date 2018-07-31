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

<h2>Commentaires</h2>
  <div class="comments">
    <?php
    while ($comment = $comments->fetch())
    {
    ?>
      <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
      <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <?php
    }
    ?>
  </div>

<h3>Laissez un commentaire</h3>
  <div class="letComment">
    <form action="index.php?action=chapter&id=<?=$chapter['id'];?>" method="post">
      Votre pseudo : <input type="text" name="author" placeholder="Votre pseudo"><br />
      <textarea name="comment" placeholder="Votre commentaire"></textarea>
      <input type="submit" value="Valider"/>
    </form>

<?php require('_footer.php');?>

