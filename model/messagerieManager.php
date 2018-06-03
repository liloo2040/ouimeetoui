<?php

require_once('Manager.php');

class messagerieManager extends Manager
{
    public function getMessage()
	{
		$db = $this->dbConnect();
		$query = $db->query('SELECT * FROM message');

		return $query->fetchAll();
	}


	public function addMessage($contenuMessage, $dateMessage, $id_user, $id_conv)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('INSERT INTO message (`message`, `date`, `id_user`, `id_conv`) VALUES(:contenuMessage, :dateMessage, :id_user, :id_conv)');
		$query->execute(array(
            'contenuMessage' => $contenuMessage,
            'dateMessage' => $dateMessage,
            'id_user' => $id_user,
            'id_conv' => $id_conv
        ));
	}
}