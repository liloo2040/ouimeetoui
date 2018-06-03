<?php 
    $title = "Ouimeetoui - Événements";
    ob_start();
     ?>
        <div class="container-fluid pt-2">
            <form action="index.php/?action=addEvent" method="post">

                <div class="form-group">
                <label for="nomEvent">Nom</label>
                <input type="text" class="form-control" name="nomEvent" id="nomEvent" placeholder="Nom">
                </div>

                <div class="form-group">
                <label for="dateDEvent">Date de début</label>
                <input type="date" class="form-control" name="dateDEvent" id="dateDEvent">
                </div>

                <div class="form-group">
                <label for="heureDEvent">Heure de début</label>
                <input type="time" class="form-control" name="heureDEvent" id="heureDEvent">
                </div>

                <div class="form-group">
                <label for="dateFEvent">Date de fin</label>
                <input type="date" class="form-control" name="dateFEvent" id="dateFEvent">
                </div>

                <div class="form-group">
                <label for="heureFEvent">Heure de fin</label>
                <input type="time" class="form-control" name="heureFEvent" id="heureFEvent">
                </div>

                <div class="form-group">
                <label for="descriptionEvent">Description</label>
                <input type="text" class="form-control" name="descriptionEvent" id="descriptionEvent">
                </div>

                <div class="form-group">
                <label for="lieuEvent">Lieu</label>
                <input type="text" class="form-control" name="lieuEvent" id="lieuEvent">
                </div>

                 <button type="submit" class="btn btn-primary">Créer</button>
            </form>
            <div class="pt-3">
                <?php 
                    foreach ($events as $event) {
                        ?>
                            <p><b>- <?= $event['nom'] ?> </b></p>
                            <p>Début le: <?= $event['date_debut'] ?> a <?= $event['heure_debut']?></p>
                            <p>Fin le: <?= $event['date_fin'] ?> a <?= $event['heure_fin']?></p>
                            
                            <hr>
                        <?php
                    }
                 ?>
            </div>
        </div>
    <?php
        
        $content = ob_get_clean();
        
        include('view/layout.php');
    
     ?>
