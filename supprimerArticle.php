<?php 
	require_once('ArticleRepository.php');

	ArticleRepository::removeArticleById($_GET['articleId']);
	header('Location: backOfficeArticles.php');
	exit;
 ?>