<?php 
	require_once('Article.php');

	$newArticle = new Article();
	$newArticle->setTitle($_GET['title'])->setContent($_GET['content'])->setDateToNow()->saveInDatabase();
 ?>