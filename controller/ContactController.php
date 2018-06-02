<?php 

require 'model/Contact.php';

class ContactController
{
    public function contactAction()
    {
        require('view/ContactView.php');
    }
}