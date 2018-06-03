<?php
    $title = "Ouimeetoui - Messagerie";
    ob_start();
     ?>
        <div class="container-fluid">
            <div><hr>
                <?php
                    foreach ($events as $event) {
                        ?>
                            <span><?= $event['message'] ?> - <?= $event['date'] ?></span><hr>
                        <?php
                    }
                 ?>
            </div>
            <form action="index.php/?action=addMessage" method="post" style="position:fixed ; bottom:10px">
                <label for="message"></label>
                <input type="text" name="message" id="message" style="width: 90vw">

                <input type="submit" value="Envoyer">
            </form>
        </div>

    <?php

        $content = ob_get_clean();

        include('view/layout.php');

     ?>