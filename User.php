<?php 


/* Créer une classe User et une table user */
/* Ces entités devront contenir les champs suivants */

/*

id (int), Auto increment, Primary Key
nom (varchar 100)
prenom (varchar 100)
mail (varchar 50)
password (255)

*/

require_once('Database.php');

class User
{
	//attributs

	private $id; 
	private $nom;
	private $prenom;
	private $mail;
	private $password;

	//méthodes publiques

	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setNom($nom)
	{
		$this->nom = mysql_real_escape_string($nom);

		return $this;
	}

	public function getNom()
	{
		return $this->nom;
	}

	public function setPrenom($prenom)
	{
		$this->prenom = mysql_real_escape_string($prenom);

		return $this;
	}

	public function getPrenom()
	{
		return $this->prenom;
	}

	public function setMail($mail)
	{
		$this->mail = mysql_real_escape_string($mail);

		return $this;
	}

	public function getMail()
	{
		return $this->mail;
	}

	public function setPassword($password) 
	{
		$this->password = mysql_real_escape_string($password); 

		return $this;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function saveInDatabase()
	{
		$pdo = Database::connect();
		$sql = "INSERT INTO `users`(`id`, `nom`, `prenom`, `mail`, `password`) VALUES (null, '$this->nom', '$this->prenom', '$this->mail', '$this->password')";
		$pdo->exec($sql);
	}
}

?>