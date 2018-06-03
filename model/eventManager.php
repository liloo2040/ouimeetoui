<?php

require('Manager.php');

class eventManager extends Manager
{
	public function getEvent()
	{
		$db = $this->dbConnect();
		$query = $db->query('SELECT * FROM event');

		return $query;
	}

	public function addEvent($nomEvent, $descriptionEvent, $dateDEvent, $dateFEvent, $lieuEvent, $id_createur)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('INSERT INTO event (`nom`, `description`, `date_debut`, `date_fin`, `lieu`, `id_createur`) VALUES(:nomEvent, :descriptionEvent, :dateDEvent, :dateFEvent, :lieuEvent, :id_createur)');
		$query->execute(array(
			'nomEvent' => $nomEvent,
			'descriptionEvent' => $descriptionEvent,
			'dateDEvent' => $dateDEvent,
			'dateFEvent' => $dateFEvent,
			'lieuEvent' => $lieuEvent,
			'id_createur' => $id_createur
		));
	}
}