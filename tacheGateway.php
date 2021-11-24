<?php

class tacheGateway
{
    require 'connection.php';

    private $con;

    public function __construct(){
        this->con =$con;
    }

    function supprTache(id){

        $con=new
        if($_GET['id']) {
            $id = $_GET['id'];
            $query = "DELETE * FROM `tache` WHERE `id` = $id";
            $con->executeQuery($query);
            header("location: page.php");
        }
    }

    function addTache(id, texte, status){
        if($_POST['texte'] != ""){
            $texte = $_POST['texte'];

            $query3 = "INSERT INTO `tache`(`texte`, `status`) VALUES('$texte', 'NON')";
            $result = $con->executeQuery($query3);

            header('location:page.php');
        }
    }

    function affichTache(id){

        tabTache=array();
        foreach(tabTache as $t) {
            select * from tache where;
        }
    }
}