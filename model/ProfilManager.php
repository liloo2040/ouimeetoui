<?php

require('Manager.php');

class ProfilManager extends Manager
{
    public function getProfil()
    {
        $db = $this->dbConnect();
        $query = $db -> query("SELECT * FROM user");

        return $query->fetch();
    }
}
    