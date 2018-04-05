<?php

require('Model/model.php');

/*
* comment class
*
*/
class Controller
{
	/*
	* comment
	*/
	public function listPosts()
	{
		$posts = getAllPosts();
		require('View/accueilView.php');
	}
	
	/*
	* comment
	*/
	public function chapter()
	{
		$chapter = getChapters($_GET['id']);
		require('View/chaptersView.php');
	}
}

