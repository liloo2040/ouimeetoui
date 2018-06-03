<?php

require('model/messagerieManager.php');

function listMessage()
{
    $messagerieManager = new messagerieManager();
	$events = $messagerieManager->getMessage();

    require('view/messagerieView.php');
}

function addMessage()
{
    $dateMessage = date("Y-m-d H:i:s");
    $contenuMessage = $_POST['message'];
    $id_user = 1;
    $id_conv = 1;

    $messagerieManager = new messagerieManager();
	$events = $messagerieManager->addMessage($contenuMessage, $dateMessage, $id_user, $id_conv);

    require('view/messagerieView.php');
}