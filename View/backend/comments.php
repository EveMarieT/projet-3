<?php require_once ('View/template.php');?>
<?php require_once ('View/_headerA.php');?>


<div class="card">
    <div class="card-body">
        Tableau de bord -
        <?php if(date('G') >= 0 && date('G') < 18) { echo 'Bonjour ' .$_SESSION['admin'];
        } else { echo 'Bonsoir ' .$_SESSION['admin']; } ?>
    </div>
</div>

<!-- afficher les commentaires -->

<caption>
    <div class="table-responsive col-md-12">
        <table class="table text-align table table-hover">
            <thead>
            <tr>
                <th scope="col">Chapitre</th>
                <th scope="col">Auteur</th>
                <th scope="col">Commentaire :</th>
                <th scope="col">Nombre de signalement</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($comments as $comment):?>
                <tr>
                    <th scope="row"><?= $comment->getPostId();?></th>
                    <td><?= $comment->getAuthor();?></td>
                    <td><?= $comment->getComment();?></td>
                    <td><?= $comment->getAlert();?></td>
                    <td><a href="index.php?action=delAlert&id=<?= $comment->getId();?>" data-toggle="modal" data-target="#deleteModal">Supprimer signalement</a></td>
                    <td><a href="index.php?action=delCom&id=<?= $comment->getId();?>" data-toggle="modal" data-target="#deleteModal">Effacer<img src="Assets/images/if_basket_1814090.png"></a></td>

                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <strong class="modal-title" id="deleteModalLabel">Voulez-vous effacer ce commentaire?</strong>
                                    </div>

                                    <div class="modal-body">
                                        <a href="index.php?action=delCom&id=<?= $comment->getId();?>" class="button">Effacer</a>
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

</caption>

<?php require('View/_footer.php'); ?>
