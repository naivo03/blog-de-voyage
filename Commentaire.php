<?php 

require_once('Database.php');
require_once('ArticleRepository.php');

class Commentaire
{
	private $id;
	private $content;
	private $articleId;
	private $userId;

	public function getId()
	{
		return $this->id;
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

	public function getArticleId()
	{
		return $this->articleId;
	}

	public function setArticleId($articleId)
	{
		$this->articleId = $articleId;

		return $this;
	}

	public function getUserId()
	{
		return $this->articleId;
	}

	public function setUserId($userId)
	{
		$this->userId = $userId;

		return $this;
	}

	public function insert()
	{
		$pdo = Database::connect();
		$sql = "INSERT INTO `commentaires`(`id`, `content`, `articleId`, `userId`) VALUES (null, '".htmlentities(mysql_real_escape_string($this->content))."', '$this->articleId', '$this->userId')";
		$pdo->exec($sql);
	}

	public function update()
	{
		$db = Database::connect();
		$sql = "UPDATE `commentaires` SET `content`='".htmlentities(mysql_real_escape_string($this->getContent()))."',`articleId`='".$this->getArticleId().
		"',`userId`='".$this->getUserId()."' WHERE id = '".$this->getId()."'";
		$db->exec($sql);
		$db = Database::disconnect();
	}

}

 ?> 