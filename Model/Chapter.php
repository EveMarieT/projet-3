<?php
// class Chapter
require_once('Manager.php');
/**
 * la classe Chapter permet de générer un chapitre
 */
class Chapter
{
	/**
	 * données utiles pour la création de chapitre

	 */

	/**
	 * @var integer $id correspond à l'id du chapitre
	 */
	private $id;
	/**
	 * @var string $picture correspond à l'image associé au chapitre
	 */
	private $picture;
	/**
	 * @var integer $chapter_number correspond au numéro du chapitre
	 */
	private $chapter_number;
	/**
	 * @var string $title correspond au titre du chapitre
	 */
	private $title;
	/**
	 *  @var string $contents correspond au contenu du chapitre
	 */
	private $contents;
	/**
	 * @var date $date correspond à la date de publication du chapitre
	 */
	private $date;


	public function hydrate($episodes)
	{
		foreach ($episodes as $key => $episode) // Parcourir le tableau avec pour clé $key et pour valeur $episode
		{
			$elements = explode('_',$key); // Couper la string avec des underscores
			$new_key = '';

			foreach ($elements as $el)
			{
				$new_key.= ucfirst($el); // Concatener tous les éléments en majuscule pour la première lettre du mot
			}
			$method = "set".$new_key; // On crée la méthode avec le nom du setter correspondant à l'attribut

			if(is_callable(array($this, $method))) // Si la méthode est appelable en variable
			{
				$this->$method($episode);
			}
		}
		return $this;
	}
	/**
	 * la fonction renvoie la valeur de l'attribut $id
	 * @return integer retourne l'id du chapitre
	 */
	public function getId(){
		return $this->id;
	}
	/**
	 * la fonction renvoie la valeur de l'attribut $picture
	 * @return string retourne l'image associé au chapitre
	 */
	public function getPicture(){
		return $this->picture;
	}
	/**
	 * La fonction renvoie la valeur de l'attribut $chapter_number
	 * @return integer retourne le numéro du chapitre associé au chapitre
	 */
	public function getChapterNumber(){
		return $this->chapter_number;
	}
	/**
	 * La fonction renvoie la valeur de l'attribut $title
	 * @return string retourne le titre du chapitre
	 */
	public function getTitle(){
		return $this->title;
	}
	/**
	 * La fonction renvoie la valeur de l'attribut $contents
	 * @return string retourne le contenu du chapitre
	 */
	public function getContents(){
		return $this->contents;
	}
	/**
	 * La fonction renvoie la valeur de l'attribut $date
	 * @return string retourne la date associé au chapitre
	 */
	public function getDate(){
		return $this->date;
	}
	/**
	 * La fonction permet de modifier la valeur de l'attribut $id
	 * @param integer $id correspond à l'id du chapitre
	 */
	public function setId($id){
		$this->id = $id;
	}
	/**
	 * La fonction permet de modifier la valeur de l'attribut $picture
	 * @param string $picture correspond à l'image associé au chapitre
	 */
	public function setPicture($picture){
		$this->picture = $picture;
	}
	/**
	 * La fonction permet de modifier la valeur de l'attribut $chapter_number
	 * @param integer $chapter_number correspond au numéro du chapitre
	 */
	public function setChapterNumber($chapter_number){
		$this->chapter_number = $chapter_number;
	}
	/**
	 * La fonction permet de modifier la valeur de l'attribut $title
	 * @param string $title correspond au titre du chapitre
	 */
	public function setTitle($title){
		$this->title = $title;
	}
	/**
	 * La fonction permet de modifier la valeur de l'attribut $contents
	 * @param string $contents correspond au contenu du chapitre
	 */
	public function setContents($contents){
		$this->contents = $contents;
	}
	/**
	 * La fonction permet de modifier la valeur de l'attribut $date
	 * @param string $date correspond à la date associé au chapitre
	 */
	public function setDate($date){
		$this->date = $date;
	}
}

