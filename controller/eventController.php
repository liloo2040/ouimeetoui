<?php

require('model/eventManager.php');

function addEvent()
{
	if (isset($_POST['nomEvent'])) {
		$nomEvent = $_POST['nomEvent'];
	}
	if (isset($_POST['descriptionEvent'])) {
		$descriptionEvent = $_POST['descriptionEvent'];
	}
	if (isset($_POST['dateDEvent'])) {
		$dateDEvent = $_POST['dateDEvent'];
	}
	if (isset($_POST['dateFEvent'])) {
		$dateFEvent = $_POST['dateFEvent'];
	}
	if (isset($_POST['lieuEvent'])) {
		$lieuEvent = $_POST['lieuEvent'];
	}

	$id_createur = 1;

	if (isset($nomEvent) && isset($descriptionEvent) && isset($dateDEvent) && isset($dateFEvent) && isset($lieuEvent)) {
		$eventManager = new eventManager();
		$events = $eventManager->addEvent($nomEvent, $descriptionEvent, $dateDEvent, $dateFEvent, $lieuEvent, $id_createur);
	}


	require('view/eventView.php');
}

function listEvent()
{
	$eventManager = new eventManager();
	$events = $eventManager->getEvent();

	require('view/eventView.php');
}


