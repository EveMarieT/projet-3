<?php require_once ('View/template.php');?>
<?php require_once ('View/_headerA.php');?>

<h5>Tableau de bord</h5>

<!-- afficher les titres des articles -->


  <table>
    <thead>
      <th>N°</th>
      <th>Titre</th>
      <th></th>
    </thead>
    <tbody>
      <?php foreach ($lastArticles as $article):?>
        <tr>
          <td><?= $article->getChapterNumber();?></td>
          <td><?= $article->getTitle();?><a href="index.php?action=chapter&id=<?= $article->getTitle();?>"></a></td>
          <td>
            <a href="index.php?action=edit&id=<?= $article->getId();?>">Modifier</a>
            <a href="index.php?action=delete&id=<?= $article->getId();?>">Effacer</a>
          </td>
        </tr>

      <?php endforeach;?>

    </tbody>
  </table>
  <td>
     <a href="index.php?action=newChapter"><button>Ajouter un nouveau chapitre</button></a>
  </td>








