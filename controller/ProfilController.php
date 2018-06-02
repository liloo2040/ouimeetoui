<?php 

require 'model/Profil.php';

function indexAction($pseudo, $nom, $prenom, $tag) 
{
    
    require('view/Profil.php');
}

function editAction()
{
    require('view/ProfilEdit.php');
}