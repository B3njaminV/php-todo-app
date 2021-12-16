<?php

namespace model;

require('../metier/Connection.php');
require("../gateway/ListeGateway.php");
require("../metier/Liste.php");
require("../gateway/TacheGateway.php");
require("../metier/Tache.php");

public class MembreModel{

    public function ajout_list_prive(){
        if(ISSET($_POST['add'])){
            if($_POST['titre'] != ""){
                $titre = $_POST['titre'];
                $idM=$_POST['idMembre'];
                $gateway=new ListeGateway($con);
                $gateway->addPrivateList($titre, $idM);
            }
        }
    }

    public function ajout_tache_prive(){
        if(ISSET($_POST['add'])){
            if($_POST['texte'] != ""){
                $texte = $_POST['texte'];
                $idListeParent = $_POST['idListe'];
                $gateway=new TacheGateway($con);
                $gateway->addTask($texte, $idListeParent);
            }
        }
    }

    public function check_prive(){
        if($_GET['id'] != ""){
            $id = $_GET['id'];
            $gateway=new TacheGateway($con);
            $gateway->checkTask($id);
        }
    }

    public function supprimer_liste_prive(){
        if($_GET['id']){
            $id = $_GET['id'];
            $gateway=new ListeGateway($con);
            $gateway->delList($id);
        }
    }

    public function supprimer_tache_prive(){
        if($_GET['id']){
            $id = $_GET['id'];
            $gateway=new TacheGateway($con);
            $gateway->delTask($id);
        }
    }

}

?>