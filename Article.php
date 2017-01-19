<?php 

require_once('Database.php');
require_once('ArticleRepository.php');

class Article
{
	private $id;
	private $title;
	private $content;
	private $date;

	public function getId()
	{
		return $this->id;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle($title)
	{
		$this->title = $title;

		return $this;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function setContent($content)
	{
		$this->content = $content;

		return $this;
	}

	public function getDate()
	{
		return $this->date;
	}

	public function setDateToNow()
	{
		$mysqlDate = date("Y-m-d H:i:s");
		$this->date = $mysqlDate;

		return $this;
	}

	public function insert()
	{
		//j'utilise htmlentities et mysql_realescape ici pour pouvoir recuperer mon contenu d'origine a l'affichage car on doit se proteger contre les injections SQL quand on modifier la table
		$pdo = Database::connect();
		$sql = "INSERT INTO `articles`(`id`, `title`, `content`, `date`) VALUES (null, '".htmlentities(mysql_real_escape_string($this->title))."', '".htmlentities(mysql_real_escape_string($this->content))."', '$this->date')";
		$pdo->exec($sql);
	}

	public function update()
	{
		$db = Database::connect();
		/*Syntaxe du Update*/
		//j'utilise htmlentities et mysql_realescape ici pour pouvoir recuperer mon contenu d'origine a l'affichage car on doit se proteger contre les injections SQL quand on modifier la table
		$sql = "UPDATE `articles` SET `title`='".htmlentities(mysql_real_escape_string($this->getTitle()))."',`content`='".htmlentities(mysql_real_escape_string($this->getContent())).
		"',`date`='".$this->getDate()."' WHERE id = '".$this->getId()."'";
		$db->exec($sql);
		$db = Database::disconnect();
	}

}

 ?> 