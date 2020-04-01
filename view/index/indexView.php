<?php
$title = "Accueil";
ob_start();
?>

<h1 class="text-center py-3">Accueil</h1>

<?php
if(isset($_SESSION) && !empty($_SESSION))
{
	?>
	<p class="text-center">Vous êtes connecté</p>
	<p class="text-center"><a style="width:200px;" class="btn btn-primary" href="index.php?action=disconnect">Se déconnecter</a></p>
	<?php
}
else
{
	?>
	<p class="text-center"><a style="width:200px;" class="btn btn-primary" href="index.php?action=sign_in">Se connecter</a></p>
	<p class="text-center"><a style="width:200px;" class="btn btn-warning" href="index.php?action=forgotten_password">Mot de passe oublié ?</a></p>
	<p class="text-center"><a style="width:200px;" class="btn btn-primary" href="index.php?action=sign_up">S'inscrire</a></p>
	<?php
}
$content = ob_get_clean();

require('view/layout.php');