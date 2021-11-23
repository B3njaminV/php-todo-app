<?php
require('connection.php');

if(ISSET($_POST['add'])){
    if($_POST['texte'] != ""){
        $texte = $_POST['texte'];

        $query3 = "INSERT INTO `tache`(`texte`, `status`) VALUES('$texte', 'NON')";
        $result = $con->executeQuery($query3);

        header('location:page.php');
    }
}
?>