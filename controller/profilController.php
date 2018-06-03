<?php 
require('model/ProfilManager.php');

function profilAction() 
{
    
    $le_profil = new ProfilManager();
    $profil = $le_profil -> test();
   
    require('view/Profil/ProfilView.php');
}

function editAction()
{
    require('view/Profil/ProfilEdit.php');
}