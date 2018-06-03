<?php // router
session_start();
require('controller/signUpController.php');
// require('controller/signInController.php');
require('controller/indexController.php');
try
{
	if(isset($_GET['action'])) // isset get action
	{
		if($_GET['action'] == 'sign_up')
		{
			getSignUpView();
		}
		else if($_GET['action'] == 'sign_in')
		{
			getSignInView();
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