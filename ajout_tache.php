<?php
require('connection.php');

if(ISSET($_POST['add'])){
    if($_POST['texte'] != ""){
        $texte = $_POST['texte'];
        $connection->query("INSERT INTO `tache`(`texte`, `status`) VALUES('$texte', 'NON')");

        header('location:page.php');
    }
}
?>