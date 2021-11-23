<?php
require('connection.php');

if($_GET['id'] != ""){
    $id = $_GET['id'];

    $query3 = "UPDATE `tache` SET `status` = 'OK' WHERE `id` = $id";
    $result = $con->executeQuery($query3);
    header('location: page.php');
}
?>