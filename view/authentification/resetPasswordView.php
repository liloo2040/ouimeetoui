<?php
$title = "Réinitialiser votre mot de passe";
ob_start();
?>
<h1>Réinitialiser votre mot de passe</h1>
<form method="post" action="index.php?action=update_password&token=<?= $token ?>">
	<input type="email" name="mail" placeholder="Votre email"/> <br/>
	<input type="password" name="newPassword1" placeholder="Nouveau mot de passe" /><br/>
	<input type="password" name="newPassword2" placeholder="Nouveau mot de passe" /><br/><br/>
	<input type="submit" value="Réinitialiser mon mot de passe">
</form>
<?php
$content = ob_get_clean();

require('view/layout.php');
