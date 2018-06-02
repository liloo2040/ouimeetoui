<?php 

require 'model/Profil.php';

function indexAction($pseudo, $nom, $prenom, $tag) 
{
    
    require('view/Profil/ProfilView.php');
}

function editAction()
{
    require('view/Profil/ProfilEdit.php');
}