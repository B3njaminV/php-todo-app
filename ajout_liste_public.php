<?php
require('metier/Connection.php');
require("controleur/ListeGateway.php");
require("metier/Liste.php");

if(ISSET($_POST['add'])){
    if($_POST['titre'] != ""){
        $titre = $_POST['titre'];
        $gateway=new ListeGateway($con);
        $gateway->addPublicList($titre);
        header('location:pagevisiteur.php');
    }
}
?>