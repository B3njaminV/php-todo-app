<?php
require('metier/Connection.php');
require("gateway/TacheGateway.php");
require("metier/Tache.php");

if($_GET['id']){
    $id = $_GET['id'];
    $gateway=new TacheGateway($con);
    $gateway->delTask($id);
    header("location: pagevisiteur.php");
}
?>