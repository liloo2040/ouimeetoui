<?php 

function afficheInscription()
{
	$eventManager = new EventManager();
	$events = $eventManager->getEvents();
	require('view/inscrEvent/inscriptionView.php');
}