<?php 
/*

Ensuite tu créé le UserRepository avec toutes les meme fonctions qu'on a vu hier + une nouvelle

public static function login($mail, $password)
{
	// va chercher tous les utilisateurs en base et regarde si il y en a un qui possède le meme mail et password
	// si il trouve bien cet utilisateur il retourne un objet de type User et tu applique la fonction session_start() (RTFM)
	// sinon il retourne null

}

*/

require_once('Database.php');
require_once('User.php');

class UserRepository
{
	public static function getAllUser()
	{
		$db = Database::connect();
		$sql = "SELECT * FROM users";
		$data = $db->query($sql);
		Database::disconnect();
		$users = $data->fetchall(PDO::FETCH_CLASS, "User");

		return $users; 
	}

	public static function getUserById($id)
	{
		$db = Database::connect();
		$sql = "SELECT * FROM users WHERE id = $id"; //j'initialise ma commande SQL
		$data = $db->query($sql); //data = l'execution de la requete sql
		$db = Database::disconnect();
		$users = $data->fetchAll(PDO::FETCH_CLASS, "User");
		if (count($users) == 1) //si j'ai recuperer un seul user avec ma requete je retourne mon objet
			return $users[0];
		else //si j'ai + d'un objet dans mon tableau d'objet cela signifie qu'il avait deux objet avec le meme id
			return null;
	}

	public static function get10MostRecentUser()
	{

	}

	public static function removeUserById($id)
	{
 		$db = Database::connect();
		$sql = "DELETE FROM users WHERE id = $id";
		$user = $db->exec($sql); 
		$db = Database::disconnect(); 
	}

	public static function updateUser($newUser)
	{
		$db = Database::connect();
		/*Syntaxe du Update*/
		$sql = "UPDATE `users` SET `nom`='".$newUser->getNom()."',`prenom`='".$newUser->getPrenom().
		"',`mail`='".$newUser->getMail(). "',`password`='".$newUser->getPassword(). "',`typeDeCompte`='".$newUser->getTypeDeCompte(). "'   WHERE id = '".$newUser->getId()."'";
		$db->exec($sql);
		$db = Database::disconnect();
	}

	public static function login($mail, $password)
	{
	// va chercher tous les utilisateurs en base et regarde si il y en a un qui possède le meme mail et password
	// si il trouve bien cet utilisateur il retourne un objet de type User et tu applique la fonction session_start() (RTFM)
	// sinon il retourne null
		foreach(self::getAllUser() as $user) //self::getAllUser() = mon tableau as $user = mon objet (valeur)
		{
			if($mail === $user->getMail() && $password === $user->getPassword())
			{
				session_start();//demarrage d'une session afin de conserver les variables pendant la connexion d'un membre avec la suerglobale ---$_SESSION['nomVariable'] = valeur;----
				//session_destroy() pour arreter la session --par exemple a creer avec un bouton deconnexion--
				$_SESSION['typeDeCompte'] = $user->getTypeDeCompte();
				return $user;
			}
		}
		return NULL;
	}
}
?>