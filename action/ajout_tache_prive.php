<?php
if(ISSET($_POST['add'])){
    if($_POST['texte'] != ""){
        $texte = $_POST['texte'];
        $idListeParent = $_POST['idListe'];
        $gateway=new TacheGateway($con);
        $gateway->addTask($texte, $idListeParent);
        header('location:../vue/pagemembre.php');
    }
}
?>