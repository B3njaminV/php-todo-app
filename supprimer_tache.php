<?php
require('connection.php');
if($_GET['id']){
    $id = $_GET['id'];

    $connection->query("DELETE FROM `tache` WHERE `id` = $id") or die(mysqli_errno());
    header("location: page.php");
}
?>