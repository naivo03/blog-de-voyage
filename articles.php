<?php require_once('header.php'); ?> <!--mon header est le fichier header.php -->

    <div class="container">
                       
      <!-- Main component for a primary marketing message or call to action -->
          			<?php 
          				    require_once('ArticleRepository.php');
                    	$articles = ArticleRepository::getArticleOfAPage($_GET['page']);
                ?>

                <?php foreach ($articles as $article) :?>

                		<div class="jumbotron" style="min-height: 100%; min-width: 100%">

                			 <h1><?php echo nl2br($article->getTitle()) ?></h1> <!-- Les 2 notations ('php echo' et =) se valent -->
                       <!--je sais pas si c'est tres propre de faire ca mais il faut a l'affichage interpreter les nl en br grace a nl2br-->
                       <p><?= nl2br($article->getContent()) ?></p> <!-- syntaxe pour accede a un element d'un objet $objet->element-->
                			 <a class="btn btn-lg btn-primary" href="articleShow.php?id=<?php echo $article->getId(); ?>" role="button">Lire plus &raquo;</a>

                    </div>

      			<?php endforeach; ?>
            
        <a class="btn btn-lg btn-primary" href="articles.php?page=<?php echo $_GET['page'] -1; ?>" role="button">precedent &raquo;</a>
        <a class="btn btn-lg btn-primary"  role="button"><?php echo $_GET['page']; ?> &raquo;</a>
        <a class="btn btn-lg btn-primary" href="articles.php?page=<?php echo $_GET['page'] + 1; ?>" role="button">Suivant &raquo;</a>
    
    <?php include('footer.php'); ?>