<?php require_once ('View/template.php');?>
<?php require_once ('View/_headerA.php');?>

<h5>Tableau de bord</h5>

<!-- afficher les commentaires -->
  <table>
    <thead>
      <th>N°</th>
      <th>Titre</th>
      <th></th>
    </thead>
    <tbody>
      <?php foreach ($comments as $comment):?>
        <tr>
          <td><?= $comment->getComFromId();?></td>
          <td><?= $article->getTitle();?><a href="index.php?action=chapter&id=<?= $article->getTitle();?>"></a></td>
          <td>
            <a href="index.php?action=edit&id=<?= $article->getId();?>">Modifier<img src="Assets/images/if_pen_1814074.png"></a>
            <a href="index.php?action=delete&id=<?= $article->getId();?>">Effacer<img src="Assets/images/if_basket_1814090.png"></a>
          </td>
        </tr>

      <?php endforeach;?>

    </tbody>
  </table>
