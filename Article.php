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
		$this->title = mysql_real_escape_string($title);
		$this->title = htmlentities($this->title);

		return $this;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function setContent($content)
	{
		$this->content = mysql_real_escape_string($content);
		$this->content = htmlentities($this->content);

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
		$pdo = Database::connect();
		$sql = "INSERT INTO `articles`(`id`, `title`, `content`, `date`) VALUES (null, '$this->title', '$this->content', '$this->date')";
		$pdo->exec($sql);
	}

	public function update()
	{
		$db = Database::connect();
		/*Syntaxe du Update*/
		$sql = "UPDATE `articles` SET `title`='".$this->getTitle()."',`content`='".$this->getContent().
		"',`date`='".$this->getDate()."' WHERE id = '".$this->getId()."'";
		$db->exec($sql);
		$db = Database::disconnect();
	}

}

 ?> 