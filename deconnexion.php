<?php session_start(); ?> <!--dois se mettre au debut de chaque page afin de verifier l'etat de la session-->

<?php 
	
	if ($_SESSION['userConnected'])
	{
		$_SESSION['userConnected'] = NULL;
		session_destroy();
	}

	header("Location: index.php");
 ?>