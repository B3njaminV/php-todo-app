<?php
require('connection.php');
if($_GET['id']){
    $id = $_GET['id'];
    $query = "DELETE FROM `tache` WHERE `id` = $id";
    $con->executeQuery($query);
    header("location: page.php");
}
?>