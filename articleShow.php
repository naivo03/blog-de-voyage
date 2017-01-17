    <?php include('header.php'); ?> <!--mon header est le fichier header.php -->

    <div class="container">

			<?php
			 	   include('ArticleRepository.php');
			     $article = ArticleRepository::getArticleById(intval($_GET['id'])); //inval transforme string en nombre
			?>

			<div class="jumbotron">
				  <h1>	<?php echo $article->getTitle() ?>	</h1> <!-- Les 2 notations ('php echo' et =) se valent -->
				  <p>		<?= $article->getContent() ?>		</p> <!-- syntaxe pour accede a un element d'un objet $objet->element-->
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

                <!-- JE PENSE QUE FAIRE CA C4EST TRES TRES MOCHE!!!!!!!!!!!!!!!!!!!!-------------->
                <?php foreach ($commentaires as $commentaire) :?>
                		<?php if($commentaire->getArticleId() === $_GET['id']) 
                		{
                			echo "<div class=\"jumbotron\" style=\"min-height: 100%; min-width: 100%\">";
							echo "<p>" . $commentaire->getContent() . "</p>"; /* syntaxe pour accede a un element d'un objet $objet->element*/
						}
						?>
                    </div>

      			<?php endforeach; ?>

      		<!------------------------------------------------------------------>

    </div> <!-- /container -->

    <?php include('footer.php'); ?>