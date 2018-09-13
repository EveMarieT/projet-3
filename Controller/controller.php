<?php

require_once('Model/ChapterManager.php');
require_once('Model/CommentManager.php');

class Controller
{
	/**
	 * Permet d'afficher tous les chapitres existants
	 * @return void affiche sur la page concernée l'ensemble des chapitres
	 */
	public function listPosts()
	{
		$manager = new ChapterManager();
		$listPosts = $manager->getHomeChapters();
		require('View/home.php');
	}
	/**
	 * Permet d'afficher le chapitre selectionné selon son $id et les commentaires associés
	 * @param  int    $id [description]
	 *
	 * @return void Affichage de la page avec le chapitre demandé
	 */
	public function chapter(int $id)
	{
		$manager = new ChapterManager();
		$chapter = $manager->getChapter($id);

		$managerCm = new CommentManager();
		$comments = $managerCm->getComments($id);
		require('View/chapters.php');
	}

	/**
	 * Permet d'ajouter un commentaire ayant pour auteur $author et contenu $comment au chapitre d'id $id
	 * Une fois le traitement effectué, la fonction redirige l'utilisateur vers la page du chapitre
	 *
	 * @param integer $post_id [correspond à l'id du commentaire]
	 * @param [string] $author  [correspond au nom de l'auteur]
	 * @param [string] $comment [correspond au commentaire laissé]
	 *
	 * @return  void Redirection vers la page du chapitre
	 */
	public function addCom(int $post_id, string $author, string $comment)
	{
		$managerCm = new CommentManager();
			$author = htmlspecialchars($author);
			$comment = htmlspecialchars($comment);
			$newCom = $managerCm->addComment($post_id, $author, $comment);
		header('location:index.php?action=chapter&id='.$post_id.'#comment');
	}
	/**
	 * Permet d'afficher la page de connexion pour le coté admin du blog
	 *
	 * @return void Affiche la page de connexion
	 */
	public function connexionAdmin()
	{
		require('View/connexionAdmin.php');
	}
	/**
	 * Affiche la page 404
	 *
	 * @return void Affiche la page 404
	 */
	public function get404()
	{
		require('View/404.php');
	}
	/**
	 * Permet à l'administrateur du blog de se connecter
	 *
	 * @param string $pseudo identifiant de l'administrateur
	 * @param string $mdp 	mot de passe associé
	 * @return void Redirige vers la page admin
	 */
  public function login(string $pseudo, string $mdp)
  {
  	if(isset($_POST['pseudo']) && isset($_POST['mdp'])) {
	  	$pseudo = htmlspecialchars($_POST['pseudo']);
			$mdp 		= htmlspecialchars($_POST['mdp']);
			if($pseudo == 'test' && $mdp == 'test') {
				// instancie la session
				$_SESSION['admin'] = true;
				//$_SESSION['role']  = "admin";
			}
		}
		header('location:index.php?action=admin');
  }
  /**
   * Permet la deconnexion de l'administrateur
   *
   * @return void Redirige vers la page d'accueil
   */
  public function logout()
  {
  	session_unset();
		header('location:index.php?action=listPosts');
  }
  /**
   * Permet d'afficher les titres de la totalité des chapitres
   *
   * @return void Affiche la page admin du blog
   */
	public function adminEnter()
	{
		// affiche toutes les entrées
		// faire une requete dans la bdd pour récupérer les articles
		// j'appelle la methode qui me permet de récupérer les articles voulus
		$manager = new ChapterManager();
		$lastArticles = $manager->getLastChapters();
		// permet l'ajout d'un nouvel article
		require('View/backend/admin.php');
	}
	/**
	 * Permet d'afficher la page pour écrire un nouveau chapitre
	 *
	 * @return void Affiche la page d'écriture d'un nouveau chapitre
	 */
	public function newChapter()
	{
		require('View/backend/newChapter.php');
	}
	/**
	 * Permet d'ajouter le nouveau chapitre à la base de données
	 *
	 * @return void Redirige vers la page d'accueil de l'admin du blog
	 */
	public function addChapter(string $title, int $chapter_number, string $contents)
	{
		$title = $_POST['title'];
		$chapter_number = $_POST['chapter_number'];
		$contents = $_POST['contents'];

		$manager = new ChapterManager();
		$manager->addChapter($title, $chapter_number, $contents);

		header('location:index.php?action=admin');
	}
	/**
	 * Permet d'afficher le chapitre d'id $id qui est à modifier
	 *
	 * @param  integer $id [correspond à l'id du chapitre]
	 * @return [type]   Redirige vers la page de modification
	 */
	public function edit($id)
	{
		$manager = new ChapterManager();
		$chapter = $manager->getChapters($id);
		require('View/backend/edit.php');
	}
	/**
	 * Permet de récupérer le chapitre d'id $id demandé
	 * @param integer $id [correspond à l'id du chapitre demandé]
	 * @param string $title [correspond au titre du chapitre demandé]
	 * @param integer $chapter_number [correspond au numéro du chapitre demandé]
	 * @param string $contents [correspond au contenu du chapitre demandé]
	 *
	 * @return void Redirige vers la page d'accueil de la partie admin du blog
	 */
	public function update(int $id, string $title, int $chapter_number, string $contents)
	{
		if(isset($_GET['id'])) {
				$id = $_GET['id'];
				$title = $_POST['title'];
				$chapter_number = $_POST['chapter_number'];
				$contents = $_POST['contents'];

				$manager = new ChapterManager();
				$manager->updateChapter($id, $title, $chapter_number, $contents);
		}
		header('location:index.php?action=admin');
	}
	/**
	 * Permet de supprimer le chapitre selon l'id $id selectionné
	 * @param integer $id [correspond à l'id du chapitre selectionné]
	 *
	 * @return void Redirige vers la page d'accueil de la partie admin du blog
	 */
	public function delChapter(int $id)
	{
		if(isset($_GET['id'])) {
				$del = $_GET['id'];
				$manager = new ChapterManager();
				$manager->delete($del);
		}
		header('location:index.php?action=admin');
	}
	/**
	 * Permet de signaler à l'administrateur du blog les commentaires signalés
	 *
	 * @param integer $post_id [correpond à l'id $post_id du commentaire selectionné]
	 * @return void Redirige vers la page du chapitre dont le commentaire est issu
	 */
	public function alertDone()
	{
    // 1. Il faut récupérer via l'url l'identifiant du commentaire à signaler
    // 2. On récupère le commentaire associé à l'identifiant (manager : getComFromId($id))
    // 3. On met à jour le nombre de signalement du commentaire (manager : updateComAlert($val))
    // 4. Rediriger l'utilisateur vers la page du chapitre lié au commentaire


		if(isset($_GET['alert'])) {
				$signal = $_GET['alert'];
				$managerCm = new CommentManager();
				$managerCm->alert($signal);
		}
		header('location:index.php?action=chapter');
	}
}
