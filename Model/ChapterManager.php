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
					$post->setNumber($elements['number']);
					$post->setContents($elements['contents']);
					$posts[] = $post;
		}
		return $posts;
	}

	public function getChapters($id)
	{ 
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, picture, number, contents FROM novel WHERE id = :id');
		$req->bindValue(':id', $id, PDO::PARAM_INT); 
		$req->execute();
		$chapter = $req->fetch();

		return $chapter;
	}

}
