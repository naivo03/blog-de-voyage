<?php 


require_once('Database.php');
require_once('Image.php');

class ImageRepository
{
	public static function getAllImage()
	{

	}

	public static function getImageByArticleId($id)
	{
		$db = Database::connect();
		$sql = "SELECT * FROM images WHERE articleId = $id"; //j'initialise ma commande SQL
		$data = $db->query($sql); //data = l'execution de la requete sql
		$db = Database::disconnect();
		$images = $data->fetchAll(PDO::FETCH_CLASS, "Image");
		if (count($images) >= 1)
			return $images;
		else 
			return null;
	}

	public static function getImageById($id)
	{
		$db = Database::connect();
		$sql = "SELECT * FROM images WHERE id = $id"; //j'initialise ma commande SQL
		$data = $db->query($sql); //data = l'execution de la requete sql
		$db = Database::disconnect();
		$images = $data->fetchAll(PDO::FETCH_CLASS, "Image");
		if (count($images) == 1) 
			return $images[0];
		else 
			return null;
	}

	public static function get10MostRecentCommentaire()
	{

	}

	public static function removeImageById($id)
	{
		$db = Database::connect();
		$sql = "DELETE FROM images WHERE id = $id";
		$commentaire = $db->exec($sql); 
		$db = Database::disconnect(); 
		//utilisation de unlink($path); afin de supprimer le fichier uploadé
	}
}
?>