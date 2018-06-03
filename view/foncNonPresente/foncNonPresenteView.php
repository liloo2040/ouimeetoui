<?php 

	$title = "Ouimeetoui - Fonctionnalité non présente";
	ob_start();
	?>
		<div class="container-fluid">
			<h3>Cette fonctionnalité n'est pas présente</h3>
		</div>
	<?php
	$content = ob_get_clean();
	include('view/layout.php');

 ?>