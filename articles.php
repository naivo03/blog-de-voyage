<!-- Le but de l'exercice sera de faire une classe PHP Article.php.

Tu travailleras les notions : #POO #Database

Cette classe devra s'utiliser comme ceci :

$article = new Article();
$article->setTitle('lol')->setContent('LOL')->setDate(new Datetime())->saveInDatabase();
var_dump($article);

Et afficher ceci

Je sauvegarde dans la BDD LOL
object(Article)#1 (3) { ["title":"Article":private]=> string(3) "lol" ["content":"Article":private]=> string(3) "LOL" ["date":"Article":private]=> object(DateTime)#2 (3) { ["date"]=> string(26) "2017-01-09 22:29:39.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(12) "Europe/Paris" } }


La méthode public function saveInDatabase(), devra faire le insert en base de l'objet instancié donc de l'article. -->

<?php 

class Article //création de mon objet article pour mon blog 
{

//mes 

private $title;
private $content;
private $date;

//mes méthodes 

public function __construct() //fonction constructeur
{
	echo 'création d\'un article<br>';
}

public function setTitle($name){

	$this->title = $name;

}

public function setContent($text){

	$this->content = $text;

}

public function setDate($date_creation){

	$this->date = $date_creation;

}


public function saveInDatabase(){

$title = $this->title;
var_dump($title);
$content = $this->content;
var_dump($content);
$date = $this->date->format('d/m/Y');
var_dump($date);

try
{
	echo 'L\'article n\'a pas bien été ajouté !';
	$pdo = new PDO('mysql:host=localhost;dbname=lol;charset=utf8', 'root', '');
	$sql = "INSERT INTO `articles`(`id`, `title`, `content`, `date`) VALUES (null, '$title', 'content', '2222222')";
	//--articles-- table dans laquel je vais inserer mes donnée, --id,title,etc...-- se sont les noms des champs de ma table
	$pdo->exec($sql);
	//$pdo->exec("INSERT INTO `articles`(`id`, `title`, `content`, `date`) VALUES (null, '$title', '$content', ". $date->format('d/m/Y') . ")");
	echo 'L\'article a bien été ajouté !';
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

}

}

//test de la creation des champs de ma base dans ma table.

$titre = "nouveau titre";

$texte_de_contenu = "En journalisme, un éditorial est un article qui reflète la position ou bien le point de vue de l'éditeur ou de la rédaction sur un thème d'actualité. Il peut aussi servir à mettre en valeur un dossier publié dans le journal.

Originellement cantonné aux premières pages des journaux de presse écrite, l'éditorial se retrouve aussi dans des émissions de radio et de télévision, sur des sites web d'information et sur des supports multimédias. Il est généralement signé par le rédacteur en chef du journal mais peut aussi être confié à un représentant privilégié de la rédaction, appelé éditorialiste.

Pour les publications qui font preuve d'objectivité ou de neutralité dans leurs articles, l'éditorial constitue un espace de liberté où s'exprime un certain point de vue. Il ne faut cependant pas confondre l'éditorial avec les billets et les articles dits « de commentaire » ou « d'humeur », destinés à faire connaître les positions personnelles de son auteur, qu'il soit rédacteur en chef, grand reporter ou chroniqueur. Ainsi, dans un éditorial, l'auteur s'exprime rarement à la première personne alors qu'il peut le faire dans un texte d'humeur ou d'opinion.";

$article = new Article();
$article->setTitle($titre);
$article->setContent($texte_de_contenu);
$article->setDate(new Datetime());
$article->saveInDatabase();
//la ligne de JP ne marche pas elle renvoie sur l'ereur setContent call to a member function ... on null in ... ($article->setTitle('lol')->setContent('LOL')->setDate(new Datetime())->saveInDatabase();)
var_dump($article);

 ?> 