
<h2>Chapitre modifié</h2>

<table>
    <thead>
      <th>N°</th>
      <th>Titre</th>
      <th/>
    </thead>
    <tbody>
        <tr>
          <td></td>
          <td><a href="index.php?action=edit&id=<?= $title->getTitle();?>"></a></td>
          <td>
            <a href="index.php?action=edit&id=<?= $article->getId();?>">Modifier</a>
            <a href="index.php?action=delete&id=<?= $article->getId();?>">Effacer</a>
          </td>
        </tr>

    </tbody>
  </table>
