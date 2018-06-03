<?php 
$title = 'OuiMeetOui - Aperçu du profil';
ob_start();
 ?>

<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-xs-10 offset-xs-1">

<h2 class="titrePseudo"><?= $profil['nom'] ?> <?= $profil['prenom'] ?></h2>

<p class="text-center-xs">
<?= $profil['mail'] ?>
</p>


<button class="btn bg-danger col-xs-10 offset-xs-1 editprofile"><a href="#" class="editprofile"><i class="fas fa-edit"></i> Editer le profil</a></button> 
</div>
</div>
</div>

    
<?php $content= ob_get_clean();
require ('view/layout.php');