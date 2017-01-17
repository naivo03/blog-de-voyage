<?php 

	require_once("UserRepository.php");

	if ($_SESSION['typeDeCompte'] === '100')
	echo "<nav class=\"navbar navbar-default navbar-static-top\">";
	else
	echo "<nav class=\"navbar navbar-inverse navbar-static-top\">";
 ?>