<?php include('header.php'); ?>
<?php 	require_once('ArticleRepository.php');  ?>
<?php 	require_once('UserRepository.php');  ?>
<?php 
	//je ne sais pas si c'est une bonne maniere de gerer l'acces a cette page
	if($_SESSION['userConnected']->getTypeDeCompte() != '300')
		header("Location: erreur404.php");
 ?>
	<!--

		- lister tous les articles avec des données utile a l'admin
		   ->  titre, nb de caracteres du contenu, date de création/modification, bouton modifier/bouton supprimer

	-->

<?php 
	$articles = ArticleRepository::getAllArticle();
?>

		<div class="container">
		<div class="table-responsive">
		  <table id="tabArticle" class="table table-striped" >
		  	<thead>
		  		<tr>
		  			<th>ID</th>
		  			<th>Title</th>
		  			<th>Caractères du content</th>
		  			<th>Date</th>
		  			<th>Actions</th>
		  		</tr>
		  	</thead>

		  	<tbody>
		  	<?php foreach ($articles as $article) : ?>
		  		<tr title="<?= $article->getId(); ?>">
		  			<td><?= $article->getId(); ?></td>
		  			<td><?= $article->getTitle(); ?></td>
		  			<td><?= strlen($article->getContent()) . ' lettres'; ?></td>
		  			<td><?= $article->getDate(); ?></td>
		  			<td>
		  				<a type="button" class="btn btn-success" href="<?= "modifierArticle.php?articleId=".$article->getId() ?>">Modifier</a>
		  				<button type="button" onClick="suppArticle(<?= $article->getId() ?>, this.parentNode.parentNode.rowIndex)" class="btn btn-default">Supprimer</button>
		  			</td>
		  		</tr>
		  	<?php endforeach; ?>
		  	</tbody>
		  </table>
		  <a type="button" class="btn btn-primary" href="ajouterArticle.php" >Ajouter un Article</a>
		  </div>
		  </div>
<?php include('footer.php'); ?>