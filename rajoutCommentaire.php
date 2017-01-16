<?php
require_once('UserRepository.php');
require_once('Commentaire.php');
 session_start(); ?> 


<?php 

	$newCom = new Commentaire();
	$newCom->setContent($_POST['content'])->setArticleId($_GET['id'])->setUserId($_SESSION['userConnected']->getId())->insert();
	var_dump($newCom);
	header("location: articleShow.php?id=" . $newCom->getArticleId()); //on renvoi a articleShow.php avec le parametre pour GET pour pas faire d'erreur
	exit;
 ?>
