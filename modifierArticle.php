	<?php include('header.php'); ?> <!--mon header est le fichier header.php -->

	<?php 
		require_once('ArticleRepository.php');
		if(isset($_GET['articleId']) && $_GET['articleId'] != NULL)
		$article = ArticleRepository::getArticleById(intval($_GET['articleId']));
		else
		$article = ArticleRepository::getArticleById(intval($_POST['id']));
	?>

	<form method="POST" action="modifierArticle.php"> <!-- en HTML on utilise deux types de requetes HTTP: GET et POST (GET rend les données visibles car les données sont comprises dans l'URL POST rend les données masqués car elle sont dans le coeur de la requete), action est l'URL du fichier PHP dans lequel je vais envoyer ma data -->

    <div class="form-group">
    	<label for="titleOfArticle1">Titre</label>
    	<?php var_dump($article->getTitle()); ?>
    	<input type="title" name= "title" class="form-control" value="<?= $article->getTitle() ?>" id="titleOfArticle1" placeholder="Titre">
  	</div>

	<div class="form-group">
    	<label for="Article1">Articles</label>
    	<textarea name="content" class="form-control" id="Article1" rows="3"><?= $article->getContent() ?></textarea>
  	</div>

  	<input type="hidden" name="id" value="<?= $article->getId() ?>">

	<p><input type="submit" value="Ajouter l'article" class="btn btn-lg btn-primary" role="button" ></p>

	</form>

	<?php include('footer.php'); ?>