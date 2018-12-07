<?php
namespace App\Model;
// class Comment
require_once('Manager.php');
/**
 * Cette classe permet de générer un commentaire
 */
class Comment
{
  /**
   * Données utiles pour la création de commentaire
   *
   */
    const MIN_LENGHT = 10;

    /**
   * @var integer correspond à l'id du commentaire
   */
  private $id;
  /**
   * @var integer correspond à l'id du chapitre sur lequel le commentaire est laissé
   */
  private $post_id;
  /**
   * @var integer correspond au nom de l'auteur du commentaire
   */
  private $author;
  /**
   * @var string correpond au contnu du commentaire
   */
  private $comment;
  /**
   * @var integer correspond à la date du commentaire
   */
  private $comment_date;
  /**
   * @var boolean correspond au signalement du commentaire
   */
  private $alert;

    /**
     *
     * Hydrate est une fonction qui prend un tableau associatif (clé/valeur),
     * parcours ce tableau et appelle le setter associé à une "clé" s'il existe avec la "valeur" en parametre
     * @param $data
     * @return $this
     */

    public function hydrate($comments)
    {
        foreach ($comments as $key => $comment) // Parcourir le tableau avec pour clé $key et pour valeur $comment
        {
            $elements = explode('_',$key); // Couper la string avec des underscores
            $new_key = '';
            foreach ($elements as $el)
            {
                $new_key.= ucfirst($el); // Concatener tous les éléments avec une majuscule la première lettre du mot
            }
            $method = "set".$new_key; // On crée la méthode avec le nom du setter correspondant à l'attribut
            if(is_callable(array($this, $method))) // Si la méthode est appelable en variable on execute la méthode
            {
                $this->$method($comment);
            }
        }
        return $this;
    }

  /**
   * La fonction renvoie la valeur de l'attribut $id
   * @return integer retourne l'id du commentaire
   */
  public function getId(){
    return $this->id;
  }
  /**
  * La fonction renvoie la valeur de l'attribut $post_id
  * @return integer retourne l'id du chapitre d'où le commentaire a été laissé
  */
  public function getPostId(){
    return $this->post_id;
  }
  /**
   * La fonction renvoie la valeur de l'attribut $author
   * @return string retourne l'auteur du commentaire
   */
  public function getAuthor(){
    return $this->author;
  }
  /**
   * La fonction renvoie la valeur de l'attribut $comment
   * @return string retourne le contenu du commentaire
   */
  public function getComment(){
    return $this->comment;
  }
  /**
   * La fonction renvoie la valeur de l'attribut $commentDate
   * @return integer retourne la date du commentaire
   */
  public function getCommentDate(){
    return $this->comment_date;
  }
  /**
   * La fonction renvoie la valeur de l'attribut $alert
   * @return boolean retourne la valeur vrai ou fausse du signalement
   */
  public function getAlert(){
    return $this->alert;
  }
  /**
   * La fonction permet de modifier la valeur de l'attribut $id
   * @param integer $id correspond à l'id du commentaire
   */
  public function setId($id){
    $this->id = $id;
  }
  /**
   * La fonction permet de modifier la valeur de l'attribut $post_id
   * @param integer $post_id correspond à l'id du chapitre
   */
  public function setPostId($post_id){
    $this->post_id = $post_id;
  }
  /**
   * La fonction permet de modifier la valeur de l'attribut $author
   * @param string $author correspond à l'auteur du commentaire
   */
  public function setAuthor($author){
    $this->author = $author;
  }
  /**
   * La fonction permet de modifier la valeur de l'attribut $comment
   * @param string $comment correspond au contenu du commentaire
   */
  public function setComment($comment){
    $this->comment = $comment;
  }
  /**
   * La fonction permet de modifier la valeur de l'attribut $comment_date
   * @param integer $comment_date correspond à la date de création du commentaire
   */
  public function setCommentDate($comment_date){
    $this->comment_date = $comment_date;
  }
  /**
   * La fonction permet de modifier la valeur de l'attribut $alert
   * @param boolean $alert correspond au signalement du commentaire
   */
  public function setAlert($alert){
    $this->alert = $alert;
  }

}
