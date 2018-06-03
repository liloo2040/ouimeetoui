<?php
    $title = "Ouimeetoui - Événements";
    ob_start();
     ?>
        <div class="container-fluid">
            <form action="index.php/?action=addEvent" method="post">
                <label for="nomEvent">Nom</label>
                <input type="text" name="nomEvent" id="nomEvent">

                <label for="dateDEvent">Date de début</label>
                <input type="date" name="dateDEvent" id="dateDEvent">

                <label for="dateFEvent">Date de fin</label>
                <input type="date" name="dateFEvent" id="dateFEvent">

                <label for="descriptionEvent">Description</label>
                <input type="text" name="descriptionEvent" id="descriptionEvent">

                <label for="lieuEvent">Lieu</label>
                <input type="text" name="lieuEvent" id="lieuEvent">

                <input type="submit" value="Créer">
            </form>
            <div>
                <?php
                    foreach ($events as $event) {
                        ?>
                            <span><?= $event['nom'] ?> - <?= $event['date_debut'] ?> ==> <?= $event['date_fin'] ?></span>
                        <?php
                    }
                 ?>
            </div>
        </div>

    <?php

        $content = ob_get_clean();

        include('view/layout.php');

     ?>