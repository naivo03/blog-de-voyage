<?php 

require_once('ArticleRepository.php');

$article = ArticleRepository::getArticleById(3);
var_dump($article);

$article->setTitle('JPJP');
$article->update();

$article = ArticleRepository::getArticleById(3);
var_dump($article);


 ?>