<?php

class inscrEventManager extends Manager
{

	public function addInscrEvent($idUser, $idEvent)
	{
		$db = $this->dbCOnnect();
		$query = $db->prepare('INSERT INTO asso_user_event (id_user, id_event) VALUES (:iduser, :idevent)');
		$query->bindValue(':iduser', $idUser, PDO::PARAM_INT);
		$query->bindValue(':idevent', $idEvent, PDO::PARAM_INT);
		$query->execute();
	}

	public function listInscrEvent($idEvent)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('SELECT user.nom, user.prenom, user.id FROM user INNER JOIN asso_user_event ON asso_user_event.id_user = user.id WHERE id_event = :idevent');
		$query->bindValue(':idevent', $idEvent, PDO::PARAM_INN);
		$query->execute();

		return $query->fetchAll();
	}

}