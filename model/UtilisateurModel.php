<?php
/*
namespace model;

require('../metier/Connection.php');
require("../gateway/ListeGateway.php");
require("../metier/Liste.php");
require("../gateway/TacheGateway.php");
require("../metier/Tache.php");

public class UtilisateurModel{

    public function ajout_liste_public(){
        if(ISSET($_POST['add'])){
            if($_POST['titre'] != ""){
                $titre = $_POST['titre'];
                $gateway=new ListeGateway($con);
                $gateway->addPublicList($titre);
            }
        }
    }

    public function ajout_tache_public(){
        if(ISSET($_POST['add'])){
            if($_POST['texte'] != ""){
                $texte = $_POST['texte'];
                $idListeParent = $_POST['idListe'];
                $gateway=new TacheGateway($con);
                $gateway->addTask($texte, $idListeParent);
            }
        }
    }

    public function check_public(){
        if($_GET['id'] != ""){
            $id = $_GET['id'];
            $gateway=new TacheGateway($con);
            $gateway->checkTask($id);
        }
    }

    public function supprimer_liste_public(){
        if($_GET['id']){
            $id = $_GET['id'];
            $gateway=new ListeGateway($con);
            $gateway->delList($id);
        }
    }

    public function supprimer_tache_public(){
        if($_GET['id']){
            $id = $_GET['id'];
            $gateway=new TacheGateway($con);
            $gateway->delTask($id);
        }
    }

}
*/
?>