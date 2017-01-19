<?php 

require_once('Database.php');
require_once('Article.php');

class ArticleRepository
{
	public static function getAllArticle()
	{
		$db = Database::connect();
		$sql = "SELECT * FROM articles"; //j'initialise ma commande SQL
		$data = $db->query($sql); //articles = l'execution de la requete sql
		Database::disconnect();
		$articles = $data->fetchAll(PDO::FETCH_CLASS, "Article");

		return $articles;	
	}

	public static function getArticleById($idArticle)
	{
		//modifier requete sql
		$db = Database::connect();
		$sql = "SELECT * FROM articles WHERE id = $idArticle"; //j'initialise ma commande SQL
		$data = $db->query($sql); //articles = l'execution de la requete sql
		$db = Database::disconnect();
		$articles = $data->fetchAll(PDO::FETCH_CLASS, "Article");
		if (count($articles) == 1)
			return $articles[0];
		else
			return null;
	}

	public static function get10MostRecentArticle()
	{
		//modifier sql
	}

	public static function removeArticleById($idArticle)
	{
 		//modifier sql
 		$db = Database::connect();
		$sql = "DELETE FROM articles WHERE id = $idArticle"; //j'initialise ma commande SQL
		$article = $db->exec($sql); //articles = l'execution de la requete sql
		$db = Database::disconnect(); 
	}

	public static function getArticleOfAPage($page)
	{
		$db = Database::connect();
		//si c'est la premiere page on doit commence par 0 car sinon on ne prend pas le premier resultat qui est defini a 0
		//LIMIT nb1,nb2 fonctionne ainsi : nb1 = l'article par lequel on commence et nb2 = le nombre d'article limite a afficher
		$min = ($page - 1) * 6;
		$nbArticles = 6;
		$sql = "SELECT * FROM articles LIMIT $min, $nbArticles"; //j'initialise ma commande SQL
		$data = $db->query($sql);
		$db = Database::disconnect();

		return $data->fetchAll(PDO::FETCH_CLASS, "Article");
	}

	public static function getArticlesBySearch($elementsDeRecherche)
	{
		// pas besoin d'explode
		$db = Database::connect();
		$sql = "SELECT * FROM articles WHERE (title LIKE '%$elementsDeRecherche%') OR (content LIKE '%$elementsDeRecherche%');";
		$data = $db->query($sql); //articles = l'execution de la requete sql
		$db = Database::disconnect();
		$articles = $data->fetchAll(PDO::FETCH_CLASS, "Article");

		return $articles;
	}
}

 ?>