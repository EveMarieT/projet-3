<?php 
// class Book
require_once('Manager.php');

class Chapter
{
	private $id;
	private $picture;
	private $number;
	private $contents;
	private $date;

	public function getId(){
		return $this->id;
	}
	public function getPicture(){
		return $this->picture;
	}
	public function getNumber(){
		return $this->number;
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
	public function setNumber($number){
		$this->number = $number;
	}
	public function setContents($contents){
		$this->contents = $contents;
	}
	public function setDate($date){
		$this->date = $date;
	}

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
}

