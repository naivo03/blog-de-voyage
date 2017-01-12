<?php 
	require_once('Article.php');

	$newArticle = new Article();
	$newArticle->setTitle($_GET['title'])->setContent($_GET['content'])->setDateToNow()->saveInDatabase();
	
	header('Location: index.php'); //ici on definis le lien de redirection l en tete 'Location: ' dans la fonction permet de  
	exit;//une fois la redirection faite il faut s'assurer que rien ne s'executer apres
 ?>