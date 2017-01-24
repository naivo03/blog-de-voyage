<?php 

require_once('Database.php');
require_once('ArticleRepository.php');
require_once('ImageRepository.php');

class Image
{
	private $id;
	private $path;
	private $articleId;
	private $userId;

	public function getId()
	{
		return $this->id;
	}

	public function getPath()
	{
		return $this->path;
	}

	public function setPath($path)
	{
		$this->path = $path;

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
		return $this->userId;
	}

	public function setUserId($userId)
	{
		$this->userId = $userId;

		return $this;
	}

	public function insert()
	{
		$pdo = Database::connect();
		$sql = "INSERT INTO `images`(`id`, `path`, `articleId`, `userId`) VALUES (null, '".htmlentities(mysql_real_escape_string($this->path))."', '$this->articleId', '$this->userId')";
		$pdo->exec($sql);
	}

	public function update()
	{
		$db = Database::connect();
		$sql = "UPDATE `images` SET `path`='".htmlentities(mysql_real_escape_string($this->getContent()))."',`articleId`='".$this->getArticleId().
		"',`userId`='".$this->getUserId()."' WHERE id = '".$this->getId()."'";
		$db->exec($sql);
		$db = Database::disconnect();
	}

}

 ?> 