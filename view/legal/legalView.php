<?php 

	$title = "Ouimeetoui - Mentions légales";
	//$styles = $scripts = "";
	$content = "";

	ob_start();
	?>
		<b>Bonjour</b>
		<b>Bonjour</b>
		<b>Bonjour</b>
		<b>Bonjour</b>
		<b>Bonjour</b>
		<b>Bonjour</b>
		<b>Bonjour</b>
		<b>Bonjour</b>
		<b>Bonjour</b>
		<b>Bonjour</b>
		<b>Bonjour</b>
	<?php
	$content = ob_get_clean();
	include('layout.php');

 ?>