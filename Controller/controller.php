<?php

require_once('Model/ChapterManager.php');
require_once('Model/CommentManager.php');

class Controller
{

	public function listPosts()
	{
		$manager = new ChapterManager();
		$listPosts = $manager->getAllPosts();
		require('View/home.php');
	}

	public function chapter()
	{
		$manager = new ChapterManager();
		$chapter = $manager->getChapters($_GET['id']);

		$managerCm = new CommentManager();
		$comments = $managerCm->getComments($_GET['id']);
		require('View/chapters.php');
	}
	public function addCom($post_id, $author, $comment)
	{
		$managerCm = new CommentManager();
		if(isset($_POST['author'])) { // si et seulement si quelqu'un laisse un commentaire depuis la page chapter
			$post_id = $_GET['id'];
			$author = $_POST['author'];
			$comment = $_POST['comment'];
			$newCom = $managerCm->addComment($post_id, $author, $comment);
		}
		header('location:index.php?action=chapter&id='.$_GET['id']);
	}

	public function connexionAdmin()
	{
		require('View/connexionAdmin.php');
	}

  public function login() {
  	if(isset($_POST['pseudo']) && isset($_POST['mdp'])) {
	  	$pseudo = htmlspecialchars($_POST['pseudo']);
			$mdp 		= htmlspecialchars($_POST['mdp']);
			if($pseudo == 'test' && $mdp == 'test') {
				// instancie la session
				$_SESSION['admin'] = true;
				//$_SESSION['role']  = "admin";
			}
			header('location:index.php?action=admin');
		}
  }

  public function logout() {
  	session_unset();
		header('location:index.php?action=listPosts');
  }

	public function adminEnter()
	{
		// affiche les 4 dernieres entrées
		// faire une requete dans la bdd pour récupérer les 4 derniers articles
		// j'appelle la methode qui me permet de récupérer les articles voulus
		$manager = new ChapterManager();
		$lastArticles = $manager->getLastChapters();
		// permet l'ajout d'un nouvel article

		require('View/backend/admin.php');
	}
	public function newChapter()
	{
		require('View/backend/newChapter.php');
	}
	public function addChapter()
	{
		$title = $_POST['title'];
		$chapter_number = $_POST['chapter_number'];
		$contents = $_POST['contents'];

		$manager = new ChapterManager();
		$manager->addChapter($title, $chapter_number, $contents);

		header('location:index.php?action=admin');
	}
	public function allChapters()
	{
		$manager = new ChapterManager();
		$manager->getAllPosts();
	}
	public function edit($id)
	{
		$manager = new ChapterManager();
		$chapter = $manager->getChapters($id);
		require('View/backend/edit.php');
	}
	public function update()
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
	public function delChapter()
	{
		if(isset($_GET['id'])) {
				$del = $_GET['id'];
				$manager = new ChapterManager();
				$manager->delete($del);
		}
	header('location:index.php?action=admin');
	}
}
