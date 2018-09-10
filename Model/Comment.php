<?php
// class Comment
require_once('Manager.php');
class Comment
{
  private $id;
  private $post_id;
  private $author;
  private $comment;
  private $comment_date;
  private $alert;

  public function getId(){
    return $this->id;
  }
  public function getPostId(){
    return $this->post_id;
  }
  public function getAuthor(){
    return $this->author;
  }
  public function getComment(){
    return $this->comment;
  }
  public function getCommentDate(){
    return $this->comment_date;
  }
  public function getAlert(){
    return $this->alert;
  }
  public function setId($id){
    $this->id = $id;
  }
  public function setPostId($post_id){
    $this->post_id = $post_id;
  }
  public function setAuthor($author){
    $this->author = $author;
  }
  public function setComment($comment){
    $this->comment = $comment;
  }
  public function setCommentDate($comment_date){
    $this->comment_date = $comment_date;
  }
  public function setAlert($alert){
    $this->alert = $alert;
  }
  public function hydrate($comments)
  {
    foreach ($comments as $key => $comment)
    {
      $elements = explode('_',$key);
      $new_key = '';
    foreach ($elements as $el)
    {
      $new_key.= ucfirst($el);
    }
    $method = "set".$new_key;
    if(is_callable(array($this, $method)))
    {
      $this->method($comments);
    }
  }
  return $this;
  }
}
