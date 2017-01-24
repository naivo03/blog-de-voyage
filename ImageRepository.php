<?php 


require_once('Database.php');
require_once('Image.php');

class ImageRepository
{
	public static function getAllImage()
	{

	}

	public static function getImageById($id)
	{

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