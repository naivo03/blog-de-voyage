    <?php include('header.php'); ?> <!--mon header est le fichier header.php -->

    <div class="form-group">
      <label for="titleOfArticle1">Titre</label>
      <input type="title" class="form-control" id="titleOfArticle1" placeholder="Titre">
    </div>

  <div class="form-group">
      <label for="Article1">Articles</label>
      <textarea class="form-control" id="Article1" rows="3"></textarea>
    </div>

	<p><a class="btn btn-default" href="administration.php" role="button">Créer article</a></p>

  <input type="submit" value="Ajouter"> <!-- submit est la balise qui permet de valider tout le formulaire dans lequel il est-->

  <a type="submit" class="btn btn-lg btn-primary" role="button">Ajouter l'article</a>

	<!------------------------------------------------------------------------------------------------>

      <div class="form-group">
      <label for="titleOfArticle1">Titre</label>
    <input type="text" name="title" > <!-- input est la balise qui va faire rentrer la data
                                description de la syntaxe:
                                -input = le type de balise
                                -type,name,etc... = attribut de la balise -->
                                </div>

    <div class="form-group">
    <label for="Article1">Articles</label>
    <textarea name="content" rows='4' cols="50"></textarea>
    </div>
  

    <p><input type="submit" value="Ajouter l'article" class="btn btn-lg btn-primary" role="button" ></p>