<?php
require('metier/connection.php');
require("controleur/ListeGateway.php");
require("metier/Liste.php");

if($_GET['id']){
    $id = $_GET['id'];
    $gateway=new ListeGateway($con);
    $gateway->delList($id);
    header("location: page.php");
}
?>