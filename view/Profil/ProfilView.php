<?php ob_start(); ?>

<div class="container">

<h3 class="titrePseudo"><?= $profil['pseudo'] ?></h3>

<?= $profil['nom'] ?><br/>
<?= $profil['prenom'] ?><br/>
<?= $profil['email'] ?><br/>


<button class="btn bg-danger editprofile"><i class="fas fa-edit"></i> Editer le profil</button> 

</div>

    
<?php $content= ob_get_clean();
require ('view/layout.php');