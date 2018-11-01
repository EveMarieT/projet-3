<?php require_once('template.php');?>
<?php require_once('_header.php');?>

<div>
	<section class="home">
        <div class="container-fluid">
		    <div class="row">
		        <?php foreach ($listPosts as $post):?>
			        <div id="bloc-resume" class="col-xs-12  col-sm-6 col-lg-4 ">
				        <img src="<?= $post->getPicture();?>" class=" polaroid img-responsive img-rounded" alt="Alaska" title="<?= $post->getTitle();?>" />
				        <div class="chapitre">
					        <a href="index.php?action=chapter&id=<?= $post->getId();?>" class="button"><h3><?= $post->getTitle();?></h3></a>
				        </div>
				        <div class="resume">
					        <article><?= $post->getContents();?></article>
				        </div>
			        </div>
		        <?php endforeach;?>
            </div>
	    </div>
	</section>
</div>


<?php require('_footer.php');?>
