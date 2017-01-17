<?php include('header.php'); ?> <!--mon header est le fichier header.php -->

	<div class="container">

	<form method="POST" action="faireRecherche.php"> <!-- en HTML on utilise deux types de requetes HTTP: GET et POST (GET rend les données visibles car les données sont comprises dans l'URL POST rend les données masqués car elle sont dans le coeur de la requete), action est l'URL du fichier PHP dans lequel je vais envoyer ma data -->

    <div class="form-group">
    	<label for="recherche">Recherche</label>
    	<input type="search" name= "recherche" class="form-control" placeholder="Entrez mots clés">
  	</div>

	<p><input type="submit" value="Valider" class="btn btn-lg btn-primary" role="button" ></p>

	</form>

	<!-- Si GET != de NULL (on recoit un tableau d'ID en lien avec notre recherche) -->
                       
      <!-- Main component for a primary marketing message or call to action -->
          			<?php 
          				require_once('ArticleRepository.php');
                    	$articles = array();
                    	if($_GET != NULL)
                    	{
                    	foreach (unserialize($_GET['articlesRechercher']) as $id) 
                    		$articles[] = ArticleRepository::getArticleById($id);
                    	}
                ?>

                <?php foreach ($articles as $article) :?>

                		<div class="jumbotron" style="min-height: 100%; min-width: 100%">

                			 <h1><?php echo $article->getTitle() ?></h1> <!-- Les 2 notations ('php echo' et =) se valent -->
                       <p><?= $article->getContent() ?></p> <!-- syntaxe pour accede a un element d'un objet $objet->element-->
                			 <a class="btn btn-lg btn-primary" href="articleShow.php?id=<?php echo $article->getId(); ?>" role="button">Lire plus &raquo;</a>

                    </div>

      			<?php endforeach; ?>
            
        <!--<a class="btn btn-lg btn-primary" href="articles.php?page=<?php echo $_GET['page'] -1; ?>" role="button">precedent &raquo;</a>
        <a class="btn btn-lg btn-primary"  role="button"><?php echo $_GET['page']; ?> &raquo;</a>
        <a class="btn btn-lg btn-primary" href="articles.php?page=<?php echo $_GET['page'] + 1; ?>" role="button">Suivant &raquo;</a>-->
    
    <?php include('footer.php'); ?>