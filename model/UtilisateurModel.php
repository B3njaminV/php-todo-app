<?php

namespace model;
use ListeGateway;
use TacheGateway;
require "gateway/ListeGateway.php";
require "gateway/TacheGateway.php";

public class UtilisateurModel{

    public $gatewayListe;
    public $gatewayTache;

    public function __construct($con){
        $this->gatewayListe=new ListeGateway($con);
        $this->gatewayTache=new TacheGateway($con);
    }

    public function ajout_liste_public(){
        if(ISSET($_POST['add'])){
            if($_POST['titre'] != ""){
                $titre = $_POST['titre'];
                $this->gatewayListe->addPublicList($titre);
            }
        }
    }

    public function ajout_tache_public(){
        if(ISSET($_POST['add'])){
            if($_POST['texte'] != ""){
                $texte = $_POST['texte'];
                $idListeParent = $_POST['idListe'];
                $this->gatewayTache->addTask($texte, $idListeParent);
                header('location:../vue/pagevisiteur.php');
            }
        }
    }

    public function check_public(){
        if($_GET['id'] != ""){
            $id = $_GET['id'];
            $this->gatewayTache->checkTask($id);
            header('location:../vue/pagevisiteur.php');
        }
    }

    public function supprimer_liste_public(){
        if($_GET['id']){
            $id = $_GET['id'];
            $this->gatewayListe->delList($id);
            header('location:../vue/pagevisiteur.php');
        }
    }

    public function supprimer_tache_public(){
        if($_GET['id']){
            $id = $_GET['id'];
            $this->gatewayTache->delTask($id);
            header('location:../vue/pagevisiteur.php');
        }
    }

}

?>