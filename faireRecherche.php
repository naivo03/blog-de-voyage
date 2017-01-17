<?php 
	require_once('ArticleRepository.php');

	if ($_POST['recherche'] != NULL)
	{
		$elementsDeRecherche = explode(' ', $_POST['recherche']);
	

    $articles = ArticleRepository::getAllArticle();


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
    //nettoyer idArticlesRechercher car on peut retrouver plusieur fois le mot rechercher dan un meme article
	$idArticlesRechercher = serialize(array_unique($idArticlesRechercher));
	header("Location: recherche.php?articlesRechercher=$idArticlesRechercher");
	exit;
	}
	header("Location: recherche.php");
 ?>