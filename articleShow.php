    <?php include('header.php'); ?> <!--mon header est le fichier header.php -->

    <div class="container">

			<?php
			 	   include('ArticleRepository.php');
			     $article = ArticleRepository::getArticleById(intval($_GET['id'])); //inval transforme string en nombre
			?>

			<div class="jumbotron">
				  <h1>	<?php echo nl2br($article->getTitle()) ?>	</h1> <!-- Les 2 notations ('php echo' et =) se valent -->
          <img alt="Logo" src="../Exercice/fichier/1/songoku.jpg" class="img-responsive center-block img-rounded" >
          <!--je sais pas si c'est tres propre de faire ca mais il faut a l'affichage interpreter les nl en br grace a nl2br-->
				  <p>		<?= nl2br($article->getContent()) ?>		</p> <!-- syntaxe pour accede a un element d'un objet $objet->element-->
			</div>

			<!----------------------rajout du commentaire-------------------------------------------->

				<form method="POST" action="rajoutCommentaire.php?id=<?php echo $article->getId(); ?>"> <!-- en HTML on utilise deux types de requetes HTTP: GET et POST (GET rend les données visibles car les données sont comprises dans l'URL POST rend les données masqués car elle sont dans le coeur de la requete), action est l'URL du fichier PHP dans lequel je vais envoyer ma data -->


				<div class="form-group">
    			<label for="Commentaire1">Commentaire</label>
    			<textarea name="content" class="form-control" id="Commentaire1" rows="3"></textarea>
  				</div>

				<p><input type="submit" value="Valider" class="btn btn-lg btn-primary" role="button" ></p>

				</form>

			<!------------------------------------------------------------------>

			<!----------------------affichage des commentaires-------------------------------------------->

			    <?php 
          				include('CommentaireRepository.php');
                    	$commentaires = CommentaireRepository::getAllCommentaire();
                ?>

                <?php foreach ($commentaires as $commentaire) {
                	if($commentaire->getArticleId() === $_GET['id']) { ?>
                			
                			<div class="jumbotron" style="min-height: 100%; min-width: 100%">
								<p><?= nl2br($commentaire->getContent()) ?></p>
                			</div>

      			<?php } // fermeture if
      			} // fermeture foreach ?>

      		<!------------------------------------------------------------------>

    </div> <!-- /container -->

    <?php include('footer.php'); ?>