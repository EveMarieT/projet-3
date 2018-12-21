<?php require_once ('View/template.php');?>
<?php require_once ('View/_headerA.php');?>

<div class="card">
    <div class="card-body">
        Tableau de bord -
        <?php if(date('G') >= 0 && date('G') < 18) { echo 'Bonjour ' .$_SESSION['admin'];
        } else { echo 'Bonsoir ' .$_SESSION['admin']; } ?>
    </div>
</div>

<!-- afficher les titres des chapitres -->

<caption>
    <div class="table-responsive">
        <table class="table text-align table table-hover">
            <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Titre</th>
                <th scope="col">Action :</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($lastArticles as $article):?>
                <tr>
                    <th scope="row"><?= $article->getChapterNumber();?></th>
                    <td><a href="index.php?action=chapter&id=<?= $article->getId();?>"><?= $article->getTitle();?></a></td>
                    <td><a href="index.php?action=edit&id=<?= $article->getId();?>">Modifier<img src="Assets/images/if_pen_1814074.png"></a></td>
                    <td><a href="index.php?action=delete&id=<?= $article->getId();?>" data-toggle="modal" data-target="#deleteModal<?= $article->getId();?>">Effacer<img src="Assets/images/if_basket_1814090.png"></a>

                    <div class="modal fade" id="deleteModal<?= $article->getId();?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <strong class="modal-title" id="deleteModalLabel">Voulez-vous effacer ce chapitre?</strong>
                                </div>

                                <div class="modal-body">
                                    <a href="index.php?action=delete&id=<?= $article->getId();?>" class="button">Effacer</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
        <a href="index.php?action=newChapter"><button>Ajouter un nouveau chapitre</button></a>

</caption>

<?php require('View/_footer.php'); ?>










