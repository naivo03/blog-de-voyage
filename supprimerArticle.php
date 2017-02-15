<?php 
	require_once('ArticleRepository.php');

	ArticleRepository::removeArticleById($_GET['articleId']);
	exit;

	/*<a type="button" class="btn btn-danger" href="<?= "supprimerArticle.php?articleId=".$article->getId() ?>" >Supprimer</a>*/
 ?>