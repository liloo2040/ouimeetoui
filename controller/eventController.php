<?php

require('model/eventManager.php');

function addEvent()
{
	// check input

	if (isset($_POST['nomEvent']) && !empty($_POST['nomEvent']) &&			
	 	isset($_POST['dateDEvent']) && !empty($_POST['dateDEvent']) &&
	 	isset($_POST['heureDEvent']) && !empty($_POST['heureDEvent']) &&			
	 	isset($_POST['dateFEvent']) && !empty($_POST['dateFEvent']) &&	
	 	isset($_POST['heureFEvent'])&& !empty($_POST['heureFEvent']) &&
	 	isset($_POST['descriptionEvent']) && !empty($_POST['descriptionEvent']) &&	
	 	isset($_POST['lieuEvent']) && !empty($_POST['lieuEvent'])) {
		
		// instance var
		$nomEvent = $_POST['nomEvent'];
		$descriptionEvent = $_POST['descriptionEvent'];
		$dateDEvent = $_POST['dateDEvent'];
		$heureDEvent = $_POST['heureDEvent'];
		$dateFEvent = $_POST['dateFEvent'];
		$heureFEvent = $_POST['heureFEvent'];
		$lieuEvent = $_POST['lieuEvent'];



	$id_createur = 1;

	if (isset($nomEvent) && isset($descriptionEvent) && isset($dateDEvent) && isset($heureDEvent) && isset($dateFEvent) && isset($heureFEvent) && isset($lieuEvent)) {
		$eventManager = new eventManager();
		$events = $eventManager->addEvent($nomEvent, $descriptionEvent, $dateDEvent, $heureDEvent, $dateFEvent, $heureFEvent,$lieuEvent, $id_createur);
		header("Location:index.php/?action=listEvent");
	}
	}
}

function listEvent()
{
	$eventManager = new eventManager();
	$events = $eventManager->getEvent();
	
	require('view/eventView.php');
}

function programEvent()
{
	$eventManager = new eventManager();
	$events = $eventManager->getEvent();

	require('view/program/programView.php');
}


