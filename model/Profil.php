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
    $this->id = $id;
    $this->pseudo = $pseudo;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->email = $email;
    $this->tag = $tag;

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
    