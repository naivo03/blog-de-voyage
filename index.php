<?php 


require_once('ArticleRepository.php'); //
require_once('Database.php');

$articles = ArticleRepository::getAllArticle();
var_dump($articles);
//$article = ArticleRepository::getArticleById(3);
//var_dump($article);
//$article = ArticleRepository::get10MostRecentArticle();
//ArticleRepository::removeArticleById(2);
//ArticleRepository::updateArticle($article);
//var_dump($article);



 ?>