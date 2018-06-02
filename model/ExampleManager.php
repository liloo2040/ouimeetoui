<?php

class ExampleManager extends Manager
{
	public function example($parameter)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('SELECT * FROM ...');
		$query->execute();

		return $votreValeur;
	}
}