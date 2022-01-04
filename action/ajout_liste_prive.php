<?php
if(ISSET($_POST['add'])){
    if($_POST['titre'] != ""){
        $titre = $_POST['titre'];
        $gateway=new ListeGateway($con);
        $gateway->addPrivateList($titre);
        header('location:../vue/pagemembre.php');
    }
}
?>