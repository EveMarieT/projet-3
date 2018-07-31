<?php
ini_set('display_errors','on');
error_reporting(E_ALL);

require_once('Comment.php');
require_once('Manager.php');

class CommentManager extends Manager
{
  public function getComments($postId)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %H:%m\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $req->bindValue(1, $postId, PDO::PARAM_INT);
    $req->execute(array($postId));

    return $req;
  }
  public function addComment($post_id,$author, $comment)
  {
    $db = $this->dbConnect();
    $query = "INSERT INTO comments SET post_id ='".$post_id."', author ='".$author."', comment ='".$comment."'";
    $req = $db->prepare($query);
    $req->execute();
  }
}
