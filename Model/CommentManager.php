<?php
ini_set('display_errors','on');
error_reporting(E_ALL);

require_once('Comment.php');
require_once('Manager.php');

class CommentManager extends Manager
{
  /**
   * Récupère les commentaires associés au chapitre
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

    public function getAllComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM comments');
        $data = $req->fetchAll();
        $allComments = [];
        foreach ($data as $elements) {
            $comment = new Comment();
            $comment->setId($elements['id']);
            $comment->setPostId($elements['post_id']);
            $comment->setAuthor($elements['author']);
            $comment->setComment($elements['comment']);
            $comment->setCommentDate($elements['comment_date']);
            $comment->setAlert($elements['alert']);
            $allComments[] = $comment;
        }

        return $allComments;

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
   * @return array|boolean      renvoie le commentaire (sous forme de tableau) ou false
   */
  public function getComFromId($id)
  {
    $db = $this->dbConnect();
    $req = $db->prepare("SELECT * FROM comments WHERE id = :id");
    $req->execute(array('id' => $id));

    return $req->fetch();
  }
  /**
   * Ajoute la valeur du nombre de signalement du commentaire
   * @param  int $id aidentifiant du commentaire
   * @return  renvoie la valeur du nombre de signalement
   */
  public function updateComAlert($id)
  {
    $db = $this->dbConnect();
    $req = $db->prepare("UPDATE comments SET alert= alert + 1 WHERE id= :id");

    $req->execute(array('id' => $id));
  }
    public function delete($id)
    {
        $bdd = $this->dbConnect();
        $query = "DELETE FROM comments WHERE id = :id";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();

        return $req;
    }
}
