<?php 

	$title = "Ouimeetoui - Programmes";
	ob_start();
	?>
		<div class="container-fluid">
			<h1 class="text-center py-3">Liste des événements</h1>
			<?php
				foreach ($events as $event) {
					?>
						<div class="event">
							<p><b><?= $event['nom'] ?></b></p>
							<p>Début : <?=date('d/m/Y H:i', strtotime($event['date_debut'])) ?></p>
							<p>Fin : <?=date('d/m/Y H:i', strtotime($event['date_fin'])) ?></p>
							<p>Lieu : <?= $event['lieu'] ?></p>
							<p>Programme : <?= $event['description'] ?></p>							
						</div>
						<hr>
					<?php
				}
			?>
		</div>
	<?php
	$content = ob_get_clean();
	include('view/layout.php');

 ?>