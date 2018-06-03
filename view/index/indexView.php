<?php
$title = "Accueil";
ob_start();
?>

<h1>Accueil</h1>

<?php
if(isset($_SESSION) && !empty($_SESSION))
{
	?>
	<p>Vous êtes connecté</p>
	<a href="index.php?action=disconnect">Se déconnecter</a>
	<?php
}
else
{
	?>
	<a href="index.php?action=sign_in">Se connecter</a>
	<a href="index.php?action=forgotten_password">Mot de passe oublié ?</a>
	<a href="index.php?action=sign_up">S'inscrire</a>
	<?php
}
$content = ob_get_clean();

require('view/layout.php');