<?php

class Profil 
{
    private $id;
    private $pseudo;
    private $nom;
    private $prenom;
    private $tag;

    public function __construct($pseudo, $nom, $prenom, $tag)
    {
    $this->pseudo = $pseudo;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->tag = $tag;

    }
    public function getPseudo()
    {
        return $this->pseudo;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getTag()
    {
        return $this->tag;
    }
}
    