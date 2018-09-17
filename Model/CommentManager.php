<?php
ini_set('display_errors','on');
error_reporting(E_ALL);

require_once('Comment.php');
require_once('Manager.php');

class CommentManager extends Manager
{
  /**
   * Récupère les commentaires associé au chapitre
   * @param  integer $postId correspond à l'id du chapitre
   * @return          renvoie un tableau avec les éléments du commentaire
   */
  public function getComments($postId)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %H:%m\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $req->bindValue(1, $postId, PDO::PARAM_INT);
    $req->execute(array($postId));

    return $req;
  }

  /**
   * Ajoute un commentaire en bdd
   * @param integer $post_id L'id de l'article du commentaire
   * @param string $author  L'auteur du commentaire
   * @param string $comment Le contenu du commentaire
   */
  public function addComment(int $post_id,string $author,string  $comment)
  {
    $db = $this->dbConnect();
    $req = $db->prepare("INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())");
    $newCom = $req->execute(array($post_id, $author, $comment));
  }
  /**
   * Signale le commentaire à l'administrateur
   * @param  integer $id correspond à l'id du commentaire
   * @return      renvoie un tableau du commentaire signalé
   */
  public function alertCom($id)
  {
    $db = $this->dbConnect();
    $req = $db->prepare("UPDATE comment SET alert=1 WHERE id = :id");
    $req->execute(array($id));
  }
}
