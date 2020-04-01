<?php



function getSignInView(){
	require('view/authentification/signInView.php');
}

function signInAction()
{	

	if(isset($_POST['mail']) && !empty($_POST['mail']) && isset($_POST['password']) && !empty($_POST['password']))
	{
		var_dump($_POST);
		$mail = htmlspecialchars($_POST['mail']);
		$password = $_POST['password'];

		$userManager = new UserManager();
		$user = $userManager->getUser($mail);

		$isPasswordCorrect = password_verify($password, $user['password']);

		if($isPasswordCorrect)
		{
			session_start();
			$_SESSION['id'] = $user['id'];
			$_SESSION['mail'] = $mail;
			$_SESSION['id_role'] = $user['id_role'];
			header('Location: index.php');
		}
		else
		{
			throw new Exception('Identifiant ou mot de passe incorrect.');
		}


	}
	else
	{
		throw new Exception('Erreur : Vous devez remplir tous les champs.');
	}
}