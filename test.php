<?php 

require_once('ArticleRepository.php');
require_once('UserRepository.php');


/*$test = new User();
$test->setNom('slouf')->setPrenom('papa')->setMail('naivo@mel.com')->setPassword('izactest')->setTypeDeCompte(100)->saveInDatabase();*/
/*$test = UserRepository::getUserById(25);
//var_dump($test);
$test->setTypeDeCompte(300);
//var_dump($test);
UserRepository::updateUser($test);*/



 ?>

 <!---------------------------------------------------------------->

	<form method="POST" action="modifierArticle.php" enctype="multipart/form-data">
     	<label for="mon_fichier">Fichier (tous formats | max. 2 Mo) :</label><br />
     	<input type="hidden" name="MAX_FILE_SIZE" value="2048576" />
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
                            $image->setTitle($_POST['titre'])->setPath($nom)->setUserId($_SESSION['userConnected']->getId())->insert();
                            echo "Transfert réussi";
                        }
                    }
                    else
                        echo"extension incorrecte";
                 }

/*-----------------------------------------------------------------------------------------------------*/

     ?>