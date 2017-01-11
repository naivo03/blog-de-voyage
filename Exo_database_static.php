<?php 

require_once('ArticleRepository.php');
require_once('Article.php');

$newArticle = new Article();
$newArticle->setId(4)->setTitle('nouveau')->setContent('NOUVEAU')->setDateToNow();
ArticleRepository::updateArticle($newArticle);


$a = ArticleRepository::getArticleById(4);
var_dump($a);

 ?>