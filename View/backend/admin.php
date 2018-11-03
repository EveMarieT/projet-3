<?php require_once ('View/template.php');?>
<?php require_once ('View/_headerA.php');?>

<h5>Tableau de bord</h5>

<!-- afficher les titres des chapitres -->

<caption>
    <div class="table-responsive">
        <table class="table text-align table table-hover">
            <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Titre</th>
                <th scope="col">Photo</th>
                <th scope="col">Action :</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($lastArticles as $article):?>
                <tr>
                    <th scope="row"><?= $article->getChapterNumber();?></th>
                    <td><?= $article->getTitle();?><a href="index.php?action=chapter&id=<?= $article->getTitle();?>"></a></td>
                    <td>
                        </form></td>
                    <td><a href="index.php?action=edit&id=<?= $article->getId();?>">Modifier<img src="Assets/images/if_pen_1814074.png"></a></td>
                    <td><a href="index.php?action=delete&id=<?= $article->getId();?>">Effacer<img src="Assets/images/if_basket_1814090.png"></a></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <td>
        <a href="index.php?action=newChapter"><button>Ajouter un nouveau chapitre</button></a>
    </td>
</caption>









