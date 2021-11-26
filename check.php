<?php
require('metier/connection.php');
require("controleur/TacheGateway.php");
require("metier/Tache.php");

if($_GET['id'] != ""){
    $id = $_GET['id'];
    $gateway=new TacheGateway($con);
    $gateway->checkTask($id);
    header('location: page.php');
}
?>