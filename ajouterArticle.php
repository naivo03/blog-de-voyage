	<?php include('header.php'); ?> <!--mon header est le fichier header.php -->

	<div class="container">
	<form method="GET" action="rajoutArticle.php"> <!-- en HTML on utilise deux types de requetes HTTP: GET et POST (GET rend les données visibles car les données sont comprises dans l'URL POST rend les données masqués car elle sont dans le coeur de la requete), action est l'URL du fichier PHP dans lequel je vais envoyer ma data -->

    <div class="form-group">
    	<label for="titleOfArticle1">Titre</label>
    	<input type="title" name= "title" class="form-control" id="titleOfArticle1" placeholder="Titre">
  	</div>

	<div class="form-group">
    	<label for="Article1">Articles</label>
    	<textarea name="content" class="form-control" id="Article1" rows="3"></textarea>
  	</div>

	<p><input type="submit" value="Ajouter l'article" class="btn btn-lg btn-primary" role="button" ></p>

	</form>
	</div>

	<?php include('footer.php'); ?>