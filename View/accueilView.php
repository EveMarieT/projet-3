<?php require_once('template.php');?>
<?php require('_header.php');?>
	
		<div>
			<section>
				<?php foreach ($posts as $post):?>
					<div class="bloc-resume">
						<img class="polaroid" img src="<?php echo $post->getPicture();?>" alt="Alaska" title="<?php echo $post->getNumber();?>" />
						<div class="chapitre">
						<a href="index.php?action=chapter&id=<?= $post->getId();?>" class="button"><h3><?= $post->getNumber();?></h3></a>
						</div>
						<div class="resume">
						<article><?php echo $post->getContents();?></article>
						</div>
					</div>
				<?php endforeach;?>
			</section>	
		</div>
	

	<?php require('_footer.php');?>
