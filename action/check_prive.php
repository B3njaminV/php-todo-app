<?php
if($_GET['id'] != ""){
    $id = $_GET['id'];
    $gateway=new TacheGateway($con);
    $gateway->checkTask($id);
    header('location:../vue/pagemembre.php');
}
?>