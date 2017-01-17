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
		$min = ($page - 1) * 6 + 1;
		$max = $page * 6;
		$sql = "SELECT * FROM articles LIMIT $min, $max"; //j'initialise ma commande SQL
		$data = $db->query($sql);
		$db = Database::disconnect();

		return $data->fetchAll(PDO::FETCH_CLASS, "Article");
	}

	public static function getArticlesBySearch($elementsDeRecherche)
	{
		// pas besoin d'explode
		$sql = "SELECT * FROM articles WHERE title LIKE '%test avec%';";

		/* à améliorer */
	$articles = self::getAllArticle();
    $idArticlesRechercher = array();
	    foreach($articles as $article)
	    	{
	    
	    		$tabTitle = explode(' ', $article->getTitle());
	    		$tabContent = explode(' ', $article->getContent());
	    		//traitement de la recherche dans le titre
	    		foreach($tabTitle as $title)
	    			foreach($elementsDeRecherche as $recherche)
	    				if($title === $recherche)
	    					$idArticlesRechercher[] = $article->getId();
	    		//traitement de la recherche dans le contenu
	    		foreach($tabContent as $content)
	    			foreach($elementsDeRecherche as $recherche)
	    				if($content === $recherche)
	    					$idArticlesRechercher[] = $article->getId();
	    	}
    $idArticlesRechercher = array_unique($idArticlesRechercher);
    $articles = array();
    foreach ($idArticlesRechercher as $id) 
    	$articles[] = ArticleRepository::getArticleById($id);
                    	
    return $articles;
	}
}

 ?>