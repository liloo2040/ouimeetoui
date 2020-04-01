<?php
$title = "Se connecter";
ob_start();
?>

	<h1>Se connecter</h1>
	<form method="POST" action="index.php?action=sign_in_action">
	<input type="mail" name="mail"  placeholder="Votre email" /><br/>
	<input type="password" name="password" placeholder="Votre mot de passe" /><br/>
	<input type="submit" />
</form>
<?php
$content = ob_get_clean();

require('view/layout.php');