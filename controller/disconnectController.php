<?php

function disconnect()
{
	if(isset($_SESSION))
	{
		session_start();
		// Suppression des variables de session et de la session
		$_SESSION = array();
		session_destroy();

		// Suppression des cookies de connexion automatique
		setcookie('login', '');
		setcookie('pass_hash', '');

		header('Location: index.php');
	}
	else
	{
		throw new Exception('Erreur : vous êtes déjà déconnecté.');
	}
}