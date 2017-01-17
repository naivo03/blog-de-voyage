<html>
<head>
	<title></title>
</head>
<body>
	<form action="form.php" method="POST">
		<input type="text" name="search">
	</form>

	<?php 

		if (count($_POST) === 1 && isset($_POST['search']) && $_POST['search'])
		{
			var_dump($_POST['search']);

			$articles = getArticlesBySearch($_POST['search']);

			// templating d'articles
		}

	 ?>
</body>
</html>