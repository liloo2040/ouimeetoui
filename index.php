<?php // router
session_start();


require('model/Manager.php');
require('controller/signUpController.php');
require('controller/legalController.php');
// require('controller/signInController.php');
require('controller/indexController.php');

require('controller/eventController.php');
require('controller/foncNonPresenteController.php');

require('controller/profilController.php');


try
{
	if(isset($_GET['action'])) // isset get action
	{
		if($_GET['action'] == 'sign_up')
		{
			signUpAction();
		}
		else if($_GET['action'] == 'sign_in')
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