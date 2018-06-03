<?php

class Profil extends Manager
{
    private $id;
    private $pseudo;
    private $nom;
    private $prenom;
    private $email;
    private $tag;

    public function __construct($id, $pseudo, $nom, $prenom, $email, $tag)
    {
    $this->id = 1;
    $this->pseudo = "CM1";
    $this->nom = "Navo";
    $this->prenom = "Max";
    $this->email = "max@cmagency.com";
    $this->tag = "Community Manager";
    }
    
    public function getId() 
    {
        return $this->id;
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
    public function getEmail()
    {
        return $this->email;
    }

    public function getTag()
    {
        return $this->tag;
    }
}
    