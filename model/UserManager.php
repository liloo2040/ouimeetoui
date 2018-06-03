<?php

require('model/Manager.php');

class UserManager extends Manager
{
	public function setUser($nom, $prenom, $password, $mail, $id_role)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('INSERT INTO user(nom, prenom, password, mail, id_role) VALUES(:nom, :prenom, :password, :mail, :id_role)');
		$query->bindValue(':nom', $nom, PDO::PARAM_STR);
		$query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
		$query->bindValue(':password', $password, PDO::PARAM_STR);
		$query->bindValue(':mail', $mail, PDO::PARAM_STR);
		$query->bindValue(':id_role', $id_role, PDO::PARAM_INT);
		$affectedLines = $query->execute();

		return $affectedLines;
	}

	public function getUser($mail)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('SELECT * FROM user WHERE mail = :mail');
		$query->bindValue(':mail', $mail, PDO::PARAM_STR);
		$query->execute();

		$user = $query->fetch();

		return $user;
	}

	public function getUserById($id)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('SELECT * FROM user WHERE id = :id');
		$query->bindValue(':id', $id, PDO::PARAM_INT);
		$query->execute();

		$user = $query->fetch();

		return $user;
	}

	public function checkIfTheUserAlreadyExists($mail)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('SELECT * FROM user WHERE mail = :mail');
		$query->bindValue(':mail', $mail, PDO::PARAM_STR);
		$query->execute();

		$theUserAlreadyExists = $query->fetch();

		return $theUserAlreadyExists;
	}

	public function checkEmail($mail)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('SELECT id, mail FROM user WHERE mail = :mail');
		$query->bindValue(':mail', $mail, PDO::PARAM_STR);
		$query->execute();
		$emailExists = $query->fetch();

		return $emailExists;
	}

	public function setToken($userId, $token)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('INSERT INTO forgotten_password(user_id, token) VALUES(:userId, :token)');
		$query->bindValue(':userId', $userId, PDO::PARAM_STR);
		$query->bindValue(':token', $token, PDO::PARAM_STR);
		$affectedLines = $query->execute();

		return $affectedLines;
	}

	public function checkToken($token)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('SELECT token FROM forgotten_password WHERE token = :token');
		$query->bindValue(':token', $token, PDO::PARAM_STR);
		$query->execute();
		$tokenExists = $query->fetch();
		return $tokenExists;
	}

	public function checkIfEmailMatchesWithToken($mail, $token)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('SELECT * FROM forgotten_password INNER JOIN user ON forgotten_password.user_id = user.id WHERE forgotten_password.token = :token AND user.mail = :mail');
		$query->bindValue(':token', $token, PDO::PARAM_STR);
		$query->bindValue(':mail', $mail, PDO::PARAM_STR);
		$query->execute();

		$emailMatchesWithToken = $query->fetch();

		return $emailMatchesWithToken;
	}

	public function updatePassword($userId, $password)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('UPDATE user SET password = :password WHERE id = :userId');
		$query->bindValue(':password', $password, PDO::PARAM_STR);
		$query->bindValue(':userId', $userId, PDO::PARAM_STR);

		$affectedLines = $query->execute();

		return $affectedLines;
	}

	public function deleteTokenFromDB($token)
	{
		$db = $this->dbConnect();
		$query = $db->prepare('DELETE FROM forgotten_password WHERE token = :token');
		$query->bindValue(':token', $token, PDO::PARAM_STR);
		$affectedLines = $query->execute();

		return $affectedLines;
	}
}