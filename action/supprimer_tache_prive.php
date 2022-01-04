<?php
if($_GET['id']){
    $id = $_GET['id'];
    $gateway=new TacheGateway($con);
    $gateway->delTask($id);
    header("location:../vue/pagemembre.php");
}
?>