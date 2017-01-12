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

    </div> <!-- /container -->

    <?php include('footer.php'); ?>