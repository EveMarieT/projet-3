<?php require('template.php'); ?>
<?php require('_header.php');?>

<div class="contenu">
	<div class="title">
		<?php echo $chapterAction['chapter_number'];?>
	</div>
	<img class="picture" img src="<?= $chapterAction['picture'];?>" alt="Alaska" title="<?= $chapterAction['chapter_number'];?>" />
	<section>
		<div class="story">
			<p><?= $chapterAction['contents'];?></p>
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

<?php require('_footer.php');?>

