<?php include('header.php'); ?>
	<!--

		- lister tous les articles avec des données utile a l'admin
		   ->  titre, nb de caracteres du contenu, date de création/modification, bouton modifier/bouton supprimer

	-->

<?php require_once('ArticleRepository.php'); 
		$articles = ArticleRepository::getAllArticle();
?>


		  <table>
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
		  		<tr>
		  			<td><?= $article->getId(); ?></td>
		  			<td><?= $article->getTitle(); ?></td>
		  			<td><?= strlen($article->getContent()) . 'lettres'; ?></td>
		  			<td><?= $article->getDate(); ?></td>
		  			<td>
		  			<a href="<?= "modifierArticle.php?articleId=".$article->getId() ?>">Modifier</a>
		  			<a href="<?= "supprimerArticle.php?articleId=".$article->getId() ?>" >Supprimer</a>
		  			</td>
		  		</tr>
		  	<?php endforeach; ?>
		  	</tbody>
		  </table>
<?php include('footer.php'); ?>