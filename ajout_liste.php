<?php
require('connection.php');

if(ISSET($_POST['add'])){
    if($_POST['titre'] != ""){
        $titre = $_POST['titre'];

        $query3 = "INSERT INTO `liste`(`titre`, `status`) VALUES('$titre', 'prive')";
        $result = $con->executeQuery($query3);

        header('location:page.php');
    }
}
?>