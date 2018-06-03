<?php

require('Manager.php');

class eventManager extends Manager
{
	public function getEvent()
	{
		$db = $this->dbConnect();
		$query = $db->query('SELECT * FROM event');

		return $query->fetchAll();
	}

	public function addEvent($nomEvent, $descriptionEvent, $dateDEvent,$heureDEvent, $dateFEvent,$heureFEvent, $lieuEvent, $id_createur)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('INSERT INTO event (`nom`, `description`, `date_debut`,`heure_debut`, `date_fin`,`heure_fin`, `lieu`, `id_createur`) VALUES(:nomEvent, :descriptionEvent, :dateDEvent,:heureDEvent, :dateFEvent,:heureFEvent, :lieuEvent, :id_createur)');
		$query->execute(array(
			'nomEvent' => $nomEvent,
			'descriptionEvent' => $descriptionEvent,
			'dateDEvent' => $dateDEvent,
			'heureDEvent' =>$heureDEvent,
			'dateFEvent' => $dateFEvent,
			'heureFEvent' =>$heureFEvent,
			'lieuEvent' => $lieuEvent,
			'id_createur' => $id_createur
		));
	}
}