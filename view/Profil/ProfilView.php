<?php ob_start(); ?>
<h2>Aperçu du profil</h2>

<h3 class="titrePseudo"><?= $pseudo ?></h3>

Editer le profil
    
<?php $content= ob_get_clean();
require ('view/layout.php');