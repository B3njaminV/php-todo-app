<?php
require('metier/connection.php');
require("controleur/TacheGateway.php");
require("metier/Tache.php");

if(ISSET($_POST['add'])){
    if($_POST['texte'] != ""){
        $texte = $_POST['texte'];
        $gateway=new TacheGateway($con);
        $gateway->addTask($texte);
        header('location:page.php');
    }
}
?>