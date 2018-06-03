<?php
$title = "Accueil";
ob_start();
?>

<h1>dsqdsqsqd</h1>

<?php
$content = ob_get_clean();
require('view/layout.php');