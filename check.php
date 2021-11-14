<?php
require('connection.php');

if($_GET['id'] != ""){
    $id = $_GET['id'];

    $connection->query("UPDATE `tache` SET `status` = 'OK' WHERE `id` = $id") or die(mysqli_errno());
    header('location: page.php');
}
?>