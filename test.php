<?php 

require_once('ArticleRepository.php');

$article = ArticleRepository::getArticleById(3);
var_dump($article);
$article->setTitle('lol');
$article->update();

 ?>

