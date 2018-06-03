<?php 
$title = 'gff';
ob_start();
 ?>

<div class="container-fluid">

<h3 class="titrePseudo"><?= $profil['pseudo'] ?></h3>

<?= $profil['nom'] ?><br/>
<?= $profil['prenom'] ?><br/>
<?= $profil['email'] ?><br/>


<button class="btn bg-danger col-md-4 offset-md-6 editprofile"><i class="fas fa-edit"></i> Editer le profil</button> 

</div>

    
<?php $content= ob_get_clean();
require ('view/layout.php');