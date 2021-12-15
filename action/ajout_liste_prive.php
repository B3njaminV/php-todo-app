<?php
require('../metier/Connection.php');
require("../gateway/ListeGateway.php");
require("../metier/Liste.php");

if(ISSET($_POST['add'])){
    if($_POST['titre'] != ""){
        $titre = $_POST['titre'];
        $idM=$_POST['idMembre'];
        $gateway=new ListeGateway($con);
        $gateway->addPrivateList($titre, $idM);
        header('location:../vue/pagemembre.php');
    }
}
?>