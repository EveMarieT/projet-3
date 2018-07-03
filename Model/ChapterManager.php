<?php
ini_set('display_errors','on');
error_reporting(E_ALL);

include_once('Chapter.php');
require_once('Manager.php');

class ChapterManager extends Manager
{

	public function getAllPosts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM novel LIMIT 0, 6');
		$data = $req->fetchAll();
		foreach ($data as $elements) {
			$post = new Chapter();
			$post->setId($elements['id']);
			$post->setPicture($elements['picture']);
			$post->setChapterNumber($elements['chapter_number']);
			$post->setTitle($elements['title']);
			$post->setContents($elements['contents']);
			$posts[] = $post;
		}
		return $posts;
	}

	public function getChapters($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, picture, chapter_number, contents FROM novel WHERE id = :id');
		$req->bindValue(':id', $id, PDO::PARAM_INT);
		$req->execute();
		$chapter = $req->fetch();

		return $chapter;
	}
	public function getLastChapters()
	{
		$db = $this->dbConnect(); // connexion à la bdd
		$req = $db->query('SELECT * FROM novel LIMIT 0, 4'); // récupérer les 4 derniers articles
		$data = $req->fetchAll();
		foreach ($data as $elements){
			$lastArticle = new Chapter();
			$lastArticle->setId($elements['id']);
			$lastArticle->setTitle($elements['title']);
			$lastArticle->setChapterNumber($elements['chapter_number']);
			$lastArticles[] = $lastArticle;
		}
		return $lastArticles;
	}
		public function addChapter($title, $chapter_number, $contents)
		{
		$db = $this->dbConnect();
		$query = "INSERT INTO novel SET title ='".$title."', chapter_number ='".$chapter_number."', contents ='".$contents."'";
		$req = $db->query($query);
		$req->execute();
		return $req;
	}
	public function editChapter($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE novel SET chapter_number = :chapter_number, title = :title, contents = :contents WHERE id = :id');
		$req->bindValue(':id', $id, PDO::PARAM_INT);
		$req->execute();
		$edit = $req;

		return $req;
	}
}

