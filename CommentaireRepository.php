<?php 


require_once('Database.php');
require_once('Commentaire.php');

class CommentaireRepository
{
	public static function getAllCommentaire()
	{
		$db = Database::connect();
		$sql = "SELECT * FROM commentaires";
		$data = $db->query($sql);
		Database::disconnect();
		$commentaires = $data->fetchall(PDO::FETCH_CLASS, "Commentaire");

		return $commentaires; 
	}

	public static function getCommentaireById($id)
	{
		$db = Database::connect();
		$sql = "SELECT * FROM commentaires WHERE id = $id"; //j'initialise ma commande SQL
		$data = $db->query($sql); //data = l'execution de la requete sql
		$db = Database::disconnect();
		$commentaires = $data->fetchAll(PDO::FETCH_CLASS, "Commentaire");
		if (count($commentaires) == 1) //si j'ai recuperer un seul user avec ma requete je retourne mon objet
			return $commentaires[0];
		else //si j'ai + d'un objet dans mon tableau d'objet cela signifie qu'il avait deux objet avec le meme id
			return null;
	}

	public static function get10MostRecentCommentaire()
	{

	}

	public static function removeCommentaireById($id)
	{
 		$db = Database::connect();
		$sql = "DELETE FROM commentaires WHERE id = $id";
		$commentaire = $db->exec($sql); 
		$db = Database::disconnect(); 
	}
}
?>