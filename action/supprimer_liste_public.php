<?php
if($_GET['id']){
    $id = $_GET['id'];
    $gateway=new ListeGateway($con);
    $gateway->delList($id);
    header("location:../vue/pagevisiteur.php");
}
?>