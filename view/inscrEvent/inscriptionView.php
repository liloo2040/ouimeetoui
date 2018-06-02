<?php 

	$title = "Ouimeetoui - Inscription à un événement";
	ob_start();
	?>
		<div class="container-fluid">
			<section>
				<form action="index.php?action=actionInscriptionEvent" method="POST">
					<select name="id_event">
						<option>---</option>
						<?php
							foreach ($events as $key => $value) 
							{
								?>
									<option value="<?= $value['id'] ?>"><?= $value['nom'] ?></option>
								<?php	
							}
						?>
					</select>
				</form>
			</section>
		</div>
	<?php
	$content = ob_get_clean();
	include('view/layout.php');

 ?>