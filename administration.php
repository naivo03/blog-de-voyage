	<?php include('header.php'); ?> <!--mon header est le fichier header.php -->

	
	<form method="GET" action="rajoutArticle.php"> <!-- en HTML on utilise deux types de requetes HTTP: GET et POST (GET rend les données visibles car les données sont comprises dans l'URL POST rend les données masqués car elle sont dans le coeur de la requete), action est l'URL du fichier PHP dans lequel je vais envoyer ma data -->

	<input type="text" name="title" > <!-- input est la balise qui va faire rentrer la data
																description de la syntaxe:
																-input = le type de balise
																-type,name,etc... = attribut de la balise -->
	<br>
	<textarea name="content" rows='4' cols="50"></textarea>
	
	<br>
	<input type="submit" value="Ajouter l'article" class="btn btn-lg btn-primary" role="button" >
	

	</form>



    <?php include('footer.php'); ?>