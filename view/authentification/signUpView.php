<?php
$title = "S'inscrire";
ob_start();
?>

	<h1>S'inscrire</h1>
<form method="POST" action="index.php?action=sign_up_action">
	<input type="text" name="nom" placeholder="Nom"><br/>
	<input type="text" name="prenom" placeholder="Prénom"><br/>
	<input type="email" name="mail" placeholder="Votre email"><br/>
	<input type="password" name="password1" placeholder="Mot de passe"><br/>
	<input type="password" name="password2" placeholder="Confirmez votre mot de passe"><br/>
	<input type="submit">
</form>
<?php
$content = ob_get_clean();

require('view/layout.php');

