<?php require('template.php'); ?>
<?php require('_header.php');?>

	<div class="contenu">
		<div class="title">
			<?php echo $chapter['number'];?>
		</div>
			<img class="picture" img src="<?php echo $chapter['picture'];?>" alt="Alaska" title="<?php echo $chapter['number'];?>" />
			<section> 
				<div class="story">
					<p><?php echo $chapter['contents']; ?></p>
				</div>
			</section> 
	</div>	


	
	<?php require('_footer.php');?>

