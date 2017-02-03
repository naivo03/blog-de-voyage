<?php 
	require_once('ImageRepository.php');

	/*needed
		-id_image
		-id_article
	*/

	$image = ImageRepository::getImageById($_GET['imageId']); // image a copie
	//supprimer le fichier image avec unlink
	unlink($image->getPath());

	//supprimer limage de la base de donnée avec la fonction supression de la classe Image
	ImageRepository::removeImageById($image->getId());
	$idArticle = $_GET['articleId'];
	header("Location: modifierArticle.php?articleId=$idArticle"); //retourner dans la modifi article
	exit;
 ?>