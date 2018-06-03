<?php

class ProfilManager extends Manager
{
    public function getProfil()
    {
        $db -> dbConnect();
        $query -> query("SELECT * FROM user");

        return $query->fetch();
    }
}
    