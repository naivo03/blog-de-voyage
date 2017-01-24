	<?php include('header.php'); ?> <!--mon header est le fichier header.php -->

	<div class="container">
	<form method="GET" action="rajoutArticle.php"> <!-- en HTML on utilise deux types de requetes HTTP: GET et POST (GET rend les données visibles car les données sont comprises dans l'URL POST rend les données masqués car elle sont dans le coeur de la requete), action est l'URL du fichier PHP dans lequel je vais envoyer ma data -->

    <div class="form-group">
    	<label for="titleOfArticle1">Titre</label>
    	<input type="title" name= "title" class="form-control" id="titleOfArticle1" placeholder="Titre">
  	</div>

	<div class="form-group">
    	<label for="Article1">Articles</label>
    	<textarea name="content" class="form-control" id="Article1" rows="3"></textarea>
  	</div>

	<p><input type="submit" value="Ajouter l'article" class="btn btn-lg btn-primary" role="button" ></p>

	</form>
	
	<form method="POST" action="#" enctype="multipart/form-data">
     	<label for="mon_fichier">Fichier (tous formats | max. 4 Mo) :</label><br />
     	<input type="hidden" name="MAX_FILE_SIZE" value="4048576" />
     	<input type="file" name="mon_fichier" id="mon_fichier" /><br />
     	<label for="titre">Titre du fichier (max. 50 caractères) :</label><br />
     	<input type="text" name="titre" value="Titre du fichier" id="titre" /><br />
     	<input type="submit" name="submit" value="Envoyer" />
	</form>

    <?php 

    /*---------------------------INTEGRATION D4UN IMAGE---------------------------------------------------*/

            $maxsize = 2048576;
            $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

            if(isset($_FILES) && $_FILES != NULL)
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
                            $newArticle->setTitle($_POST['titre'])->setPath($nom)->setUserId()->insert();
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