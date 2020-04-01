<?php 

	$title = "Ouimeetoui - Mentions légales";
	ob_start();
	?>
		<div class="container-fluid">
			<section>
				<h2>Mentions légales</h2>
				<p>Ce qui suit fait office de mentions légales</p>
			</section>
			<section>
				<h2>Conditions Générales de Vente</h2>
				<p>Ce qui suit fait office de conditions générales de vente</p>
			</section>
		</div>
	<?php
	$content = ob_get_clean();
	include('view/layout.php');

 ?>