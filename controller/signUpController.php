<?php 

require('model/UserManager.php');

function getSignUpView()
{
	require('view/authentification/signUpView.php');
}

function signUpAction()
{
	var_dump($_POST);

	if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['mail']))
		{
			
			if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['password1']) && !empty($_POST['password2']) && !empty($_POST['mail']))
			{
				$nom = htmlspecialchars($_POST['nom']);
				$prenom = htmlspecialchars($_POST['prenom']);
					if($_POST['password1'] == $_POST['password2'])
					{
						$password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
						$mail = $_POST['mail'];

						$userManager = new UserManager();
						$affectedLines = $userManager->setUser($nom, $prenom, $password, $mail, 1);

						if($affectedLines == false)
						{
							echo $nom . ' ' . $prenom . ' ' . $password . ' ' . $mail;
							throw new Exception('Impossible d\'ajouter l\'utilisateur en base de données !');
						}
						else
						{
							header('Location: index.php');
						}			
					}
					else
					{
						throw new Exception('Erreur : les mots de passe ne correspondent pas.');
					} 
			}
			else
			{
				throw new Exception('Erreur. Un ou plusieurs champs n\'ont pas été remplis.');
			}
		}
	else
	{
		throw new Exception('Erreur. Un des champs est manquant.');
	}	
}