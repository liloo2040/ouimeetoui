<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('vendor/autoload.php');

function getForgottenPasswordView()
{
	require('view/authentification/forgottenPasswordView.php');
}

function sendEmail()
{

	if(isset($_POST['mail']) && !empty($_POST['mail']))
	{
		$userManager = new UserManager();
		$emailExists = $userManager->checkEmail($_POST['mail']);
		$userId = $emailExists['id'];

		if($emailExists)
		{
			$token = md5(uniqid(rand()));
			$affectedLines = $userManager->setToken($userId, $token);

			if($affectedLines == false)
			{
				throw new Exception("Impossible d'ajouter le token en base de données !");
			}
			else
			{
		
				$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
				try
				{
					require('private/smtp_password.php');
					
					//Server settings
					// $mail->SMTPDebug = 2;                                 // Enable verbose debug output
					$mail->isSMTP();                                      // Set mailer to use SMTP
					// $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'projet4.test@gmail.com';                 // SMTP username
					$mail->Password = getMailPassword();                          // SMTP password
					$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Host = 'smtp.gmail.com'; 
					$mail->Port = 465;                                    // TCP port to connect to
					$mail->CharSet = 'UTF-8';
					//Recipients
					$mail->setFrom('no-reply@krevisscorp.com', 'no-reply@krevisscorp.com');
					$mail->addAddress($_POST['mail'], 'Joe User');     // Add a recipient

					//Content
					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = 'Demande de réinitilisation de mot de passe';
					ob_start(); ?>
					<p>Vous avez fait une demande de réinitilisation de mot de passe. <br/> Vous pouvez redéfinir votre mot de passe en cliquant sur <a href="http://localhost/ouimeetoui/index.php?action=reset_password&token=<?=$token?>">ce lien</a></p>
					<p>Ce lien expirera automatiquement dans 3 jours.</p>
					<p>Si vous n'êtes pas à l'origine de cette demande, veuillez ignorer ce mail.</p>
					<?php
					$mail->Body    = ob_get_clean();
					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					$mail->send();
					echo "<p>Si votre email existe dans notre base de données, vous allez recevoir un mail d'ici quelques instants.<br/>Si le mail n'apparaît pas dans votre boîte de réception, veuillez regardez dans vos courriers indésirables.</p>";
					echo '<br/><a href="index.php">Retourner à l\'accueil</a>';
				}
				catch (Exception $e)
				{
				    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				}
			}
		}
		else
		{
			throw new Exception("L'email n'existe pas");
			echo "<p>Si votre email existe dans notre base de données, vous allez recevoir un mail d'ici quelques instants.<br/>Si le mail n'apparaît pas dans votre boîte de réception, veuillez regardez dans vos courriers indésirables.</p>";
			echo '<br/><a href="index.php">Retourner à l\'accueil</a>';
		}
	}
	else
	{
		throw new Exception("Erreur. Le champ n'a pas été rempli.");
	}	
}

function getResetPasswordView()
{
	$token = $_GET['token'];
	$userManager = new UserManager();
	$tokenExists = $userManager->checkToken($token);

	if($tokenExists)
	{
		require('view/authentification/resetPasswordView.php');
	}
	else
	{
		throw new Exception("Erreur. Ce token n'existe pas.");
	}
}

function updatePassword()
{
	if (isset($_POST['mail']) && !empty($_POST['mail']))
	{
		$userManager = new UserManager();
		$emailMatchesWithToken = $userManager->checkIfEmailMatchesWithToken($_POST['mail'], $_GET['token']);

		if($emailMatchesWithToken)
		{
			if(isset($_POST['newPassword1']) && isset($_POST['newPassword2']) && !empty($_POST['newPassword1']) && !empty($_POST['newPassword2']))
			{
				if($_POST['newPassword1'] == $_POST['newPassword2'])
				{
					$password = password_hash($_POST['newPassword1'], PASSWORD_DEFAULT);
					$user = $userManager->checkEmail($_POST['mail']); // I'm using this method to return the user id I need afterwards. Might change in the future.
					$userId = $user['id'];
					$affectedLines = $userManager->updatePassword($userId, $password);

					if($affectedLines == false)
					{
						throw new Exception('Impossible d\'insérer les mots de passe en base de données.');
					}
					else
					{
						echo "Vous avez redéfini votre mot de passe avec succès.";
						echo '<br/><a href="index.php">Retourner à l\'accueil</a>';

						$tokenHasBeenDeleted = $userManager->deleteTokenFromDB($_GET['token']);
					}
				}
				else
				{
					throw new Exception("Erreur. Les mots de passe ne correspondent pas.");
				}
			}
			else
			{
				throw new Exception("Erreur. Vous n'avez pas rempli tous les champs.");
			}
		}
		else
		{
			throw new Exception('Email and token do not match.');
		}
	}
	else
	{
		throw new Exception("Erreur inconnue.");
	}
}