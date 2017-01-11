<?php 


	/* Ecrire une classe Blacklist qui jouera le role d'auto modérateur avec une liste de terme à ne pas accepter */
	/* Les 3 mots à blacklister sont "fuck", "porn", "problem"*/
	require_once('Blacklist.php');

	$blacklist = new Blacklist(["fuck", "porn", "problem"]);

	$text = 'text with a problem';
	$response = $blacklist->isValid($text);
	/* $response == false */

	$validContent = $blacklist->cleanContent($text);
	/* $validContent == 'text with a *******'*/

 ?>