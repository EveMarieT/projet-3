<?php
// class Chapter
require_once('Manager.php');

class Chapter
{
	private $id;
	private $picture;
	private $chapter_number;
	private $title;
	private $contents;
	private $date;


	public function hydrate($episodes)
	{
		foreach ($episodes as $key => $episode)
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
				$this->$method($episode);
			}
		}
		return $this;
	}

	public function getId(){
		return $this->id;
	}
	public function getPicture(){
		return $this->picture;
	}
	public function getChapterNumber(){
		return $this->chapter_number;
	}
	public function getTitle(){
		return $this->title;
	}
	public function getContents(){
		return $this->contents;
	}
	public function getDate(){
		return $this->date;
	}
	public function setId($id){
		$this->id = $id;
	}
	public function setPicture($picture){
		$this->picture = $picture;
	}
	public function setChapterNumber($chapter_number){
		$this->chapter_number = $chapter_number;
	}
	public function setTitle($title){
		$this->title = $title;
	}
	public function setContents($contents){
		$this->contents = $contents;
	}
	public function setDate($date){
		$this->date = $date;
	}


}

