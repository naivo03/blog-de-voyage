<?php require_once('header.php'); ?> <!--mon header est le fichier header.php -->

    <div class="container">
                       
      <!-- Main component for a primary marketing message or call to action -->
          			<?php 
          				    require_once('ArticleRepository.php');
                      require_once('ImageRepository.php');

                      if(isset($_GET['page'])) //verification de l'url --pas bon finalement--
                      {
                      	$articles = ArticleRepository::getArticleOfAPage($_GET['page']);

                        //on verifie si il y a encore des articles a afficher
                        if (count($articles) === 0)
                        {
                          $articles = ArticleRepository::getArticleOfAPage($_GET['page'] - 1);
                          $_GET['page'] = $_GET['page'] - 1;
                        }
                      }
                      else
                      {
                        header('location: erreur404.php');
                      }
                ?>

                <?php foreach ($articles as $article) :?>

                		<div class="jumbotron" style="min-height: 100%; min-width: 100%">

                			 <h1><?php echo nl2br($article->getTitle()) ?></h1> <!-- Les 2 notations ('php echo' et =) se valent -->

                      <!--affichage de la premiere image pour l'appercu d'article-->

                        <?php if (ImageRepository::getImageByArticleId($article->getId())) 
                              {
                                $images = ImageRepository::getImageByArticleId($article->getId());
                        ?>
                        <img alt="Logo" src="<?= $images[0]->getPath(); ?>" class="img-responsive center-block img-thumbnail" >
                        <!--je sais pas si c'est tres propre de faire ca mais il faut a l'affichage interpreter les nl en br grace a nl2br-->
                        <?php } ?>

                        <!------------------------------------------------------------>


                       <!--je sais pas si c'est tres propre de faire ca mais il faut a l'affichage interpreter les nl en br grace a nl2br-->

                       <!--substr sert a n'afficher que 200 characteres pour ne pas de l'espace betement toute la page-->
                       <p><?= substr(nl2br($article->getContent()), 0, 200) . "..." ?></p> <!-- syntaxe pour accede a un element d'un objet $objet->element-->
                			 <a class="btn btn-lg btn-primary" href="articleShow.php?id=<?php echo $article->getId(); ?>" role="button">Lire plus &raquo;</a>
                       

                    </div>

      			<?php endforeach; ?>

        <!-- Verification de la page precedente si existante -->
        <?php 
          $pagePrecedent = $_GET['page'] - 1;
          if ($pagePrecedent <= 0)
            $pagePrecedent = 1;
         ?>

        <a class="btn btn-lg btn-primary" href="articles.php?page=<?php echo $pagePrecedent; ?>" role="button"> &laquo; Precedent</a>
        <a class="btn btn-lg btn-primary"  role="button"><?php echo $_GET['page']; ?></a>
        <a class="btn btn-lg btn-primary" href="articles.php?page=<?php echo $_GET['page'] + 1; ?>" role="button">Suivant &raquo;</a>
    
    <?php include('footer.php'); ?>