<?php require('template.php'); ?>
<?php require('_header.php');?>

	<div class="contenu">
		<div class="title">
			<?php echo $chapterAction['number'];?>
		</div>
			<img class="picture" img src="<?php echo $chapterAction['picture'];?>" alt="Alaska" title="<?php echo $chapterAction['number'];?>" />
			<section> 
				<div class="story">
					<p><?php echo $chapterAction['contents']; ?></p>
				</div>
			</section> 
	</div>
	
	<?php require('_footer.php');?>

