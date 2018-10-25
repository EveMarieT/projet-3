<?php
/**
 * La classe Manager permet la connexion à la base de données
 */
class Manager
{
	public function dbConnect()
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=forteroche;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			return $db;
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
	}
}
