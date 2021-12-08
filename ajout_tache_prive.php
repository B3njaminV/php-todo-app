<?php
require('metier/Connection.php');
require("controleur/TacheGateway.php");
require("metier/Tache.php");

if(ISSET($_POST['add'])){
    if($_POST['texte'] != ""){
        $texte = $_POST['texte'];
        $idListeParent = $_POST['idListe'];
        $gateway=new TacheGateway($con);
        $gateway->addTask($texte, $idListeParent);
        header('location:pagemembre.php');
    }
}
?>