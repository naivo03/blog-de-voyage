<?php include('header.php');?> <!--mon header est le fichier header.php -->
<?php require_once('ArticleRepository.php'); ?>

	<div class="container">

	<form method="POST" action="recherche.php"> <!-- en HTML on utilise deux types de requetes HTTP: GET et POST (GET rend les données visibles car les données sont comprises dans l'URL POST rend les données masqués car elle sont dans le coeur de la requete), action est l'URL du fichier PHP dans lequel je vais envoyer ma data -->
    <div class="form-group">
    	<label for="recherche">Recherche</label>
    	<input type="search" name= "recherche" class="form-control" placeholder="Entrez mots clés">
  	</div>

	<p><input type="submit" value="Valider" class="btn btn-lg btn-primary" role="button" ></p>

	</form>

  <?php 
    if(isset($_POST['recherche']) && $_POST['recherche'] != NULL)
      $articles = ArticleRepository::getArticlesBySearch(explode(' ',$_POST['recherche']));
    else
      $articles = []; // tableau vide -> le foreach ne rentre pas dedans
   ?>
<!-- Affichage de l'ensemble des articles dans la page -->

                   <?php foreach ($articles as $article) :?>

                    <div class="jumbotron" style="min-height: 100%; min-width: 100%">

                       <h1><?php echo $article->getTitle() ?></h1> <!-- Les 2 notations ('php echo' et =) se valent -->
                       <p><?= $article->getContent() ?></p> <!-- syntaxe pour accede a un element d'un objet $objet->element-->
                       <a class="btn btn-lg btn-primary" href="articleShow.php?id=<?php echo $article->getId(); ?>" role="button">Lire plus &raquo;</a>

                    </div>

            <?php endforeach; ?>
    
    <?php include('footer.php'); ?>