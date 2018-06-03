<?php // router
session_start();


require('model/Manager.php');
require('controller/signUpController.php');=
require('controller/legalController.php');
// require('controller/signInController.php');
require('controller/signInController.php');
require('controller/indexController.php');
require('controller/disconnectController.php');
require('controller/forgottenPasswordController.php');

require('controller/eventController.php');
require('controller/foncNonPresenteController.php');

require('controller/profilController.php');


try
{
	if(isset($_GET['action'])) // isset get action
	{
		if($_GET['action'] == 'sign_up')
		{
			getSignUpView();
		}
		else if($_GET['action'] == 'sign_up_action')
		{
			signUpAction();
		}
		else if($_GET['action'] == 'sign_in')
		{
			getSignInView();
		}
		else if($_GET['action'] == 'sign_in_action')
		{
			signInAction();
		}

		else if($_GET['action'] == 'legal')
		{
			getLegalView();
		}
		else if($_GET['action'] == 'addEvent')
		{
			addEvent();
		}
		else if($_GET['action'] == 'listEvent')
		{
			listEvent();
		}
		else if($_GET['action'] == 'programEvent')
		{
			programEvent();
		}
		else if($_GET['action'] == 'wallRencontre')
		{
			foncNonPresente();
		}
		else if($_GET['action'] == 'messagerie')
		{
			foncNonPresente();
		}
		else if($_GET['action'] == 'profil')
		{
			profilAction();
		else if($_GET['action'] == 'disconnect')
		{
			disconnect();
		}
		else if($_GET['action'] == 'forgotten_password')
		{
			getForgottenPasswordView();
		}
		else if($_GET['action'] == 'send_email')
		{
			sendEmail();
		}
		else if($_GET['action'] == 'reset_password')
		{
			if(isset($_GET['token']) && !empty($_GET['token']))
			{
				getResetPasswordView();
			}
			else
			{
				throw new Exception("Erreur. Token manquant.");
			}
			
		}
		else if($_GET['action'] == 'update_password')
		{
			if(isset($_GET['token']) && !empty($_GET['token']))
			{
				updatePassword();
			}
			else
			{
				throw new Exception("Erreur. Token manquant.");
			}	
		}
		else

		{
			throw new Exception("Erreur. La page demandée n'existe pas.");
		}
	}
	else
	{
		indexAction();
	}
}
catch(Exception $e)
{
	echo '' . $e->getMessage();
}