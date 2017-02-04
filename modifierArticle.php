	<?php include('header.php');?> <!--mon header est le fichier header.php -->

	<?php 
		require_once('ArticleRepository.php');
		require_once('ImageRepository.php');
		if(isset($_GET['articleId']) && $_GET['articleId'] != NULL)
		$article = ArticleRepository::getArticleById(intval($_GET['articleId']));
		else
		{
			$article = ArticleRepository::getArticleById(intval($_POST['id']));
			$article->setTitle($_POST['title'])->setContent($_POST['content'])->setDateToNow()->update();
		}
	?>
	<div class="container">
	<form method="POST" action="modifierArticle.php" enctype="multipart/form-data"> <!-- en HTML on utilise deux types de requetes HTTP: GET et POST (GET rend les données visibles car les données sont comprises dans l'URL POST rend les données masqués car elle sont dans le coeur de la requete), action est l'URL du fichier PHP dans lequel je vais envoyer ma data -->

    <div class="form-group">
    	<label for="titleOfArticle1">Titre</label>
    	<input type="title" name= "title" class="form-control" value="<?= $article->getTitle() ?>" id="titleOfArticle1" placeholder="Titre">
  	</div>

	<div class="form-group">
    	<label for="Article1">Articles</label>
    	<textarea name="content" class="form-control" id="Article1" rows="3"><?= ($article->getContent()) ?></textarea>
  	</div>

  	<input type="hidden" name="id" value="<?= $article->getId() ?>">

      <?php 
    /*---------------------------IMAGES DEJA PRESENTES POUR CET ARTICLE-------------------------------*/

            if(ImageRepository::getImageByArticleId($article->getId()))
            {
              $imagesArticle = ImageRepository::getImageByArticleId($article->getId());
              echo "<label for=\"images\">Images dans cet article :</label><br />";
              foreach ($imagesArticle as $image)
              {
                //suppresion de l'image si demander par l'admin
                echo "<p>- ". $image->getPath() .  "<a type=\"button\" class=\"btn btn-primary\" href=\"supprimerImage.php?articleId=" . $article->getId() . "&imageId=" . $image->getId() . "\" >Supprimer Image</a>" .  "</p>";
              }
            }

    
      ?>

<!------------------------------------------------------------------------------------------------------>

     	<label for="mon_fichier">Fichier (tous formats | max. 2 Mo) :</label><br />
     	<input type="hidden" name="MAX_FILE_SIZE" value="2048576" />
     	<input type="file" name="mon_fichier" id="mon_fichier" /><br />
     	<label for="titre">Titre du fichier (max. 50 caractères) :</label><br />
     	<input type="text" name="titre" value="Titre du fichier" id="titre" /><br />

	<p><input type="submit" value="Modifier l'article" class="btn btn-lg btn-primary" role="button" ></p>

	</form>

    <?php 
    /*---------------------------INTEGRATION D UNE IMAGE------------------------------------------------*/

            $maxsize = 2048576;
            $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

            if(isset($_FILES) && $_FILES != NULL && $_FILES['mon_fichier']['size'] > 0)
                if ($_FILES['mon_fichier']['size'] > $maxsize) 
                {
                    $erreur = "Le fichier est trop gros";
                    echo "Le fichier est trop gros";
                }
                else
                {
                    $extension_upload = strtolower(  substr(  strrchr($_FILES['mon_fichier']['name'], '.')  ,1)  );

                    if ( in_array($extension_upload,$extensions_valides) )
                    { 
                        echo "Extension correcte";

                        $id_membre = $_POST['titre'];
                        echo "$id_membre<br>";
                        $nom = "images_articles/{$id_membre}.{$extension_upload}";
                        $resultat = move_uploaded_file($_FILES['mon_fichier']['tmp_name'],$nom);
                        if ($resultat)
                        {
                            $image = new Image();
                            $image->setArticleId($article->getId())->setPath($nom)->setUserId($_SESSION['userConnected']->getId())->insert();
                            echo "Transfert réussi";
                        }
                    }
                    else
                        echo"extension incorrecte";
                 }

/*-----------------------------------------------------------------------------------------------------*/

     ?>

	</div>
	<?php include('footer.php'); ?>