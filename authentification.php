<?php 

/*
Naiv,

Tu vas devoir coder toute l'authentification.

(MAIL A LIRE EN ENTIER PLUSIEURS FOIS SI NECESSAIRE)

L'idée c'est que lorsque ton utilisateur arrive sur le site (n'importe quelle page), on vérifie qu'il est authentifier.
-> Si il ne l'est pas, on le redirige vers un portail d'authentification. Toute la navigation doit être bloquée. Il doit être redirigé à chaque fois qu'il tente d'accéder à l'une des url du site.
-> si il l'est déjà on ne fait rien. La navigation se passe normalement.

Quand il est sur le portail d'authentification, il doit taper son (email, password).
Tu envoi ça en POST, tu vérifie avec la fonction que je t'ai fait coder hier.

Si l'authentification échoue tu redirige vers l'interface d'auth.

Quand l'utilisateur est authentifié tu dois doit stocker un objet de type User dans $_SESSION.
Cependant ne stocke jamais le password dans la session.

Un fois que tout cela sera fait. Tu devras mettre en forme cette interface de connexion.
Pour cela je t'ai trouvé une interface bootstrap.


Ensuite tu devra coder la désauthentification -> bouton Logout.
c'est la partie la plus simple.
Tu met ton user à null en session et tu utilise la fonction de session que tu connais déjà.
tu fais ensuite la redirection vers l'interface de login/auth


MAY THE FORCE BE WITH YOU
*/

	require_once('UserRepository.php');

	$userConnected = UserRepository::login($_POST['mail'], $_POST['password']);

	if($userConnected != NULL)
	{
		$userConnected->setPassword(NULL); 
		$_SESSION['userConnected'] = $userConnected;
	}
	header('Location: index.php');
?>