<?php

class Manager
{
	protected function dbConnect()
	{
		$db = new PDO('mysql:host=localhost;dbname=ouimeetoui;charset=utf8', 'root', '');
		return $db;
	}
}